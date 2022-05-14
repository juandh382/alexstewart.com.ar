'use strict'
//const applicationServerPublicKey = 'BDUKrHD4qual2oJqtdqeCVAg8OE1iarDPqZaTGyidrutZWceUdHLnincqzIIFDf0qQ_985biCGLq6vuMUQYYo7k';

const pushButton = document.querySelector('.btnSubscriber');
pushButton.hidden = true;

let isSubscribed = false;
let swRegistration = null;

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('sw.js')
            .then(reg => {
                console.log('Registro de SW exitoso...');
                swRegistration = reg;
                initialiseUI();
            })
            .catch(err => console.warn('Error al tratar de registrar el sw', err))
}
if ('PushManager' in window) {
    console.log('Push Manager funcionando');
}

function initialiseUI() {
    pushButton.addEventListener('click', function () {
        pushButton.disabled = true;
        if (isSubscribed) {
            push_unsubscribe();
        } else {
            subscribeUser();
        }
    });

    // Set the initial subscription value
    swRegistration.pushManager.getSubscription()
            .then(function (subscription) {
                isSubscribed = !(subscription === null);
                if (isSubscribed) {
                    console.log('Ya Subscripto');
                } else {
                    console.log('No Subscripto');
                }
                updateBtn();
            });
}
function updateBtn() {
    if (Notification.permission === 'denied') {
        pushButton.textContent = 'Notificaciones bloqueadas.';
        pushButton.disabled = true;
        updateSubscriptionOnServer(null);
        sendSubscriptionToBackEnd(null);
        return;
    }

    if (isSubscribed) {
        pushButton.textContent = 'Eliminar Subscripcion a notificaciones.';
        pushButton.hidden = true;
        pushButton.disabled = false;
    } else {
        pushButton.textContent = 'Habilitar notificaciones.';
        pushButton.hidden = false;
        pushButton.disabled = false;

    }

}
//function subscribeUser() {
//    const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
//    swRegistration.pushManager.subscribe({
//        userVisibleOnly: true,
//        applicationServerKey: applicationServerKey
//    })
//            .then(function (subscription) {
//                console.log('Usuario subscripto:', subscription);
//
//                updateSubscriptionOnServer(subscription);
//                sendSubscriptionToBackEnd(subscription);
//                isSubscribed = true;
//
//                updateBtn();
//            })
//            .catch(function (err) {
//                console.log('Error al subscribir usuario: ', err);
//                updateBtn();
//            });
//}

function urlB64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
function updateSubscriptionOnServer(subscription) {
    // TODO: Send subscription to application server
    console.log("Actualizando datos!!");
    const subscriptionJson = document.querySelector('.js-subscription-json');
    const subscriptionDetails =
            document.querySelector('.js-subscription-details');

    if (subscription) {
        subscriptionJson.textContent = JSON.stringify(subscription);
        subscriptionDetails.classList.remove('is-invisible');
    } else {
        subscriptionDetails.classList.add('is-invisible');
    }
}
function sendSubscriptionToBackEnd(subscription) {
    //console.log(subscription)
    $.ajax({
        type: "POST",
        url: "{{ path('cr_whiz_sub') }}",
        data: {
            subscription: JSON.stringify(subscription)
        },
        success: function (response) {
            console.log(response);
        }
    })
}