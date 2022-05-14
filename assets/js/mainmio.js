/* jquery.scrollex v0.2.1 | (c) @ajlkn | github.com/ajlkn/jquery.scrollex | MIT licensed */
!(function (t) {
  function e(t, e, n) {
    return (
      "string" == typeof t &&
        ("%" == t.slice(-1)
          ? (t = (parseInt(t.substring(0, t.length - 1)) / 100) * e)
          : "vh" == t.slice(-2)
          ? (t = (parseInt(t.substring(0, t.length - 2)) / 100) * n)
          : "px" == t.slice(-2) &&
            (t = parseInt(t.substring(0, t.length - 2)))),
      t
    );
  }
  var n = t(window),
    i = 1,
    o = {};
  n
    .on("scroll", function () {
      var e = n.scrollTop();
      t.map(o, function (t) {
        window.clearTimeout(t.timeoutId),
          (t.timeoutId = window.setTimeout(function () {
            t.handler(e);
          }, t.options.delay));
      });
    })
    .on("load", function () {
      n.trigger("scroll");
    }),
    (jQuery.fn.scrollex = function (l) {
      var s = t(this);
      if (0 == this.length) return s;
      if (this.length > 1) {
        for (var r = 0; r < this.length; r++) t(this[r]).scrollex(l);
        return s;
      }
      if (s.data("_scrollexId")) return s;
      var a, u, h, c, p;
      switch (
        ((a = i++),
        (u = jQuery.extend(
          {
            top: 0,
            bottom: 0,
            delay: 0,
            mode: "default",
            enter: null,
            leave: null,
            initialize: null,
            terminate: null,
            scroll: null,
          },
          l
        )),
        u.mode)
      ) {
        case "top":
          h = function (t, e, n, i, o) {
            return t >= i && o >= t;
          };
          break;
        case "bottom":
          h = function (t, e, n, i, o) {
            return n >= i && o >= n;
          };
          break;
        case "middle":
          h = function (t, e, n, i, o) {
            return e >= i && o >= e;
          };
          break;
        case "top-only":
          h = function (t, e, n, i, o) {
            return i >= t && n >= i;
          };
          break;
        case "bottom-only":
          h = function (t, e, n, i, o) {
            return n >= o && o >= t;
          };
          break;
        default:
        case "default":
          h = function (t, e, n, i, o) {
            return n >= i && o >= t;
          };
      }
      return (
        (c = function (t) {
          var i,
            o,
            l,
            s,
            r,
            a,
            u = this.state,
            h = !1,
            c = this.$element.offset();
          (i = n.height()),
            (o = t + i / 2),
            (l = t + i),
            (s = this.$element.outerHeight()),
            (r = c.top + e(this.options.top, s, i)),
            (a = c.top + s - e(this.options.bottom, s, i)),
            (h = this.test(t, o, l, r, a)),
            h != u &&
              ((this.state = h),
              h
                ? this.options.enter && this.options.enter.apply(this.element)
                : this.options.leave && this.options.leave.apply(this.element)),
            this.options.scroll &&
              this.options.scroll.apply(this.element, [(o - r) / (a - r)]);
        }),
        (p = {
          id: a,
          options: u,
          test: h,
          handler: c,
          state: null,
          element: this,
          $element: s,
          timeoutId: null,
        }),
        (o[a] = p),
        s.data("_scrollexId", p.id),
        p.options.initialize && p.options.initialize.apply(this),
        s
      );
    }),
    (jQuery.fn.unscrollex = function () {
      var e = t(this);
      if (0 == this.length) return e;
      if (this.length > 1) {
        for (var n = 0; n < this.length; n++) t(this[n]).unscrollex();
        return e;
      }
      var i, l;
      return (i = e.data("_scrollexId"))
        ? ((l = o[i]),
          window.clearTimeout(l.timeoutId),
          delete o[i],
          e.removeData("_scrollexId"),
          l.options.terminate && l.options.terminate.apply(this),
          e)
        : e;
    });
})(jQuery);
/* jquery.scrolly v1.0.0-dev | (c) @ajlkn | MIT licensed */
(function (e) {
  function u(s, o) {
    var u, a, f;
    if ((u = e(s))[t] == 0) return n;
    a = u[i]()[r];
    switch (o.anchor) {
      case "middle":
        f = a - (e(window).height() - u.outerHeight()) / 2;
        break;
      default:
      case r:
        f = Math.max(a, 0);
    }
    return typeof o[i] == "function" ? (f -= o[i]()) : (f -= o[i]), f;
  }
  var t = "length",
    n = null,
    r = "top",
    i = "offset",
    s = "click.scrolly",
    o = e(window);
  e.fn.scrolly = function (i) {
    var o,
      a,
      f,
      l,
      c = e(this);
    if (this[t] == 0) return c;
    if (this[t] > 1) {
      for (o = 0; o < this[t]; o++) e(this[o]).scrolly(i);
      return c;
    }
    (l = n), (f = c.attr("href"));
    if (f.charAt(0) != "#" || f[t] < 2) return c;
    (a = jQuery.extend(
      {
        anchor: r,
        easing: "swing",
        offset: 0,
        parent: e("body,html"),
        pollOnce: !1,
        speed: 1e3,
      },
      i
    )),
      a.pollOnce && (l = u(f, a)),
      c.off(s).on(s, function (e) {
        var t = l !== n ? l : u(f, a);
        t !== n &&
          (e.preventDefault(),
          a.parent.stop().animate({ scrollTop: t }, a.speed, a.easing));
      });
  };
})(jQuery);
!(function (t) {
  (t.fn.navList = function () {
    var e = t(this);
    return (
      ($a = e.find("a")),
      (b = []),
      $a.each(function () {
        var e = t(this),
          a = Math.max(0, e.parents("li").length - 1),
          l = e.attr("href"),
          i = e.attr("target");
        b.push(
          '<a class="link depth-' +
            a +
            '"' +
            (void 0 !== i && "" != i ? ' target="' + i + '"' : "") +
            (void 0 !== l && "" != l ? ' href="' + l + '"' : "") +
            '><span class="indent-' +
            a +
            '"></span>' +
            e.text() +
            "</a>"
        );
      }),
      b.join("")
    );
  }),
    (t.fn.panel = function (e) {
      if (0 == this.length) return i;
      if (this.length > 1) {
        for (var a = 0; a < this.length; a++) t(this[a]).panel(e);
        return i;
      }
      var l,
        i = t(this),
        r = t("body"),
        o = t(window),
        n = i.attr("id");
      return (
        "jQuery" !=
          typeof (l = t.extend(
            {
              delay: 0,
              hideOnClick: !1,
              hideOnEscape: !1,
              hideOnSwipe: !1,
              resetScroll: !1,
              resetForms: !1,
              side: null,
              target: i,
              visibleClass: "visible",
            },
            e
          )).target && (l.target = t(l.target)),
        (i._hide = function (t) {
          l.target.hasClass(l.visibleClass) &&
            (t && (t.preventDefault(), t.stopPropagation()),
            l.target.removeClass(l.visibleClass),
            window.setTimeout(function () {
              l.resetScroll && i.scrollTop(0),
                l.resetForms &&
                  i.find("form").each(function () {
                    this.reset();
                  });
            }, l.delay));
        }),
        i
          .css("-ms-overflow-style", "-ms-autohiding-scrollbar")
          .css("-webkit-overflow-scrolling", "touch"),
        l.hideOnClick &&
          (i.find("a").css("-webkit-tap-highlight-color", "rgba(0,0,0,0)"),
          i.on("click", "a", function (e) {
            var a = t(this),
              r = a.attr("href"),
              o = a.attr("target");
            r &&
              "#" != r &&
              "" != r &&
              r != "#" + n &&
              (e.preventDefault(),
              e.stopPropagation(),
              i._hide(),
              window.setTimeout(function () {
                "_blank" == o ? window.open(r) : (window.location.href = r);
              }, l.delay + 10));
          })),
        i.on("touchstart", function (t) {
          (i.touchPosX = t.originalEvent.touches[0].pageX),
            (i.touchPosY = t.originalEvent.touches[0].pageY);
        }),
        i.on("touchmove", function (t) {
          if (null !== i.touchPosX && null !== i.touchPosY) {
            var e = i.touchPosX - t.originalEvent.touches[0].pageX,
              a = i.touchPosY - t.originalEvent.touches[0].pageY,
              r = i.outerHeight(),
              o = i.get(0).scrollHeight - i.scrollTop();
            if (l.hideOnSwipe) {
              var n = !1;
              switch (l.side) {
                case "left":
                  n = a < 20 && a > -20 && e > 50;
                  break;
                case "right":
                  n = a < 20 && a > -20 && e < -50;
                  break;
                case "top":
                  n = e < 20 && e > -20 && a > 50;
                  break;
                case "bottom":
                  n = e < 20 && e > -20 && a < -50;
              }
              if (n)
                return (
                  (i.touchPosX = null), (i.touchPosY = null), i._hide(), !1
                );
            }
            ((i.scrollTop() < 0 && a < 0) ||
              (o > r - 2 && o < r + 2 && a > 0)) &&
              (t.preventDefault(), t.stopPropagation());
          }
        }),
        i.on("click touchend touchstart touchmove", function (t) {
          t.stopPropagation();
        }),
        i.on("click", 'a[href="#' + n + '"]', function (t) {
          t.preventDefault(),
            t.stopPropagation(),
            l.target.removeClass(l.visibleClass);
        }),
        r.on("click touchend", function (t) {
          i._hide(t);
        }),
        r.on("click", 'a[href="#' + n + '"]', function (t) {
          t.preventDefault(),
            t.stopPropagation(),
            l.target.toggleClass(l.visibleClass);
        }),
        l.hideOnEscape &&
          o.on("keydown", function (t) {
            27 == t.keyCode && i._hide(t);
          }),
        i
      );
    }),
    (t.fn.placeholder = function () {
      if (void 0 !== document.createElement("input").placeholder)
        return t(this);
      if (0 == this.length) return a;
      if (this.length > 1) {
        for (var e = 0; e < this.length; e++) t(this[e]).placeholder();
        return a;
      }
      var a = t(this);
      return (
        a
          .find("input[type=text],textarea")
          .each(function () {
            var e = t(this);
            ("" != e.val() && e.val() != e.attr("placeholder")) ||
              e.addClass("polyfill-placeholder").val(e.attr("placeholder"));
          })
          .on("blur", function () {
            var e = t(this);
            e.attr("name").match(/-polyfill-field$/) ||
              ("" == e.val() &&
                e.addClass("polyfill-placeholder").val(e.attr("placeholder")));
          })
          .on("focus", function () {
            var e = t(this);
            e.attr("name").match(/-polyfill-field$/) ||
              (e.val() == e.attr("placeholder") &&
                e.removeClass("polyfill-placeholder").val(""));
          }),
        a.find("input[type=password]").each(function () {
          var e = t(this),
            a = t(
              t("<div>")
                .append(e.clone())
                .remove()
                .html()
                .replace(/type="password"/i, 'type="text"')
                .replace(/type=password/i, "type=text")
            );
          "" != e.attr("id") && a.attr("id", e.attr("id") + "-polyfill-field"),
            "" != e.attr("name") &&
              a.attr("name", e.attr("name") + "-polyfill-field"),
            a
              .addClass("polyfill-placeholder")
              .val(a.attr("placeholder"))
              .insertAfter(e),
            "" == e.val() ? e.hide() : a.hide(),
            e.on("blur", function (t) {
              t.preventDefault();
              var a = e
                .parent()
                .find("input[name=" + e.attr("name") + "-polyfill-field]");
              "" == e.val() && (e.hide(), a.show());
            }),
            a
              .on("focus", function (t) {
                t.preventDefault();
                var e = a
                  .parent()
                  .find(
                    "input[name=" +
                      a.attr("name").replace("-polyfill-field", "") +
                      "]"
                  );
                a.hide(), e.show().focus();
              })
              .on("keypress", function (t) {
                t.preventDefault(), a.val("");
              });
        }),
        a
          .on("submit", function () {
            a.find("input[type=text],input[type=password],textarea").each(
              function (e) {
                var a = t(this);
                a.attr("name").match(/-polyfill-field$/) && a.attr("name", ""),
                  a.val() == a.attr("placeholder") &&
                    (a.removeClass("polyfill-placeholder"), a.val(""));
              }
            );
          })
          .on("reset", function (e) {
            e.preventDefault(),
              a.find("select").val(t("option:first").val()),
              a.find("input,textarea").each(function () {
                var e,
                  a = t(this);
                switch ((a.removeClass("polyfill-placeholder"), this.type)) {
                  case "submit":
                  case "reset":
                    break;
                  case "password":
                    a.val(a.attr("defaultValue")),
                      (e = a
                        .parent()
                        .find(
                          "input[name=" + a.attr("name") + "-polyfill-field]"
                        )),
                      "" == a.val()
                        ? (a.hide(), e.show())
                        : (a.show(), e.hide());
                    break;
                  case "checkbox":
                  case "radio":
                    a.attr("checked", a.attr("defaultValue"));
                    break;
                  case "text":
                  case "textarea":
                    a.val(a.attr("defaultValue")),
                      "" == a.val() &&
                        (a.addClass("polyfill-placeholder"),
                        a.val(a.attr("placeholder")));
                    break;
                  default:
                    a.val(a.attr("defaultValue"));
                }
              });
          }),
        a
      );
    }),
    (t.prioritize = function (e, a) {
      var l = "__prioritize";
      "jQuery" != typeof e && (e = t(e)),
        e.each(function () {
          var e,
            i = t(this),
            r = i.parent();
          if (0 != r.length)
            if (i.data(l)) {
              if (a) return;
              (e = i.data(l)), i.insertAfter(e), i.removeData(l);
            } else {
              if (!a) return;
              if (0 == (e = i.prev()).length) return;
              i.prependTo(r), i.data(l, e);
            }
        });
    });
})(jQuery);
$(document).ready(function () {
  $(".customer-logos").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: !0,
    autoplaySpeed: 2e3,
    arrows: !1,
    dots: !1,
    pauseOnHover: !1,
    responsive: [
      { breakpoint: 768, settings: { slidesToShow: 3 } },
      { breakpoint: 520, settings: { slidesToShow: 2 } },
    ],
  });
});
function GetCookie(o) {
  for (
    var e = o + "=", t = e.length, i = document.cookie.length, n = 0;
    n < i;

  ) {
    var c = n + t;
    if (document.cookie.substring(n, c) == e) return "1";
    if (0 == (n = document.cookie.indexOf(" ", n) + 1)) break;
  }
  return null;
}
function aceptar_cookies() {
  var o = new Date();
  (o = new Date(o.getTime() + 7776e6)),
    (document.cookie = "cookies_surestao=aceptada; expires=" + o),
    1 == GetCookie("cookies_surestao") && popbox3();
}
function popbox3() {
  $("#overbox3").toggle();
}
$(function () {
  1 == GetCookie("cookies_surestao") && popbox3();
});
function mostrarmodal(a) {
  $("#openModal").modal("toggle");
}
function loadimg(a) {
  $("#modal-bodyimg").animate({ scrollTop: 0 }, "slow");
  var o = { optionimg: a };
  $.ajax({
    url: "textos.php",
    type: "POST",
    data: o,
    beforeSend: function () {
      $("#modal-bodyimg").html(
        "<strong><i class='fa fa-spinner fa-pulse' aria-hidden='true'></i> ...Cargando...</strong>"
      );
    },
    success: function (a) {
      $("#modal-bodyimg").html($(a).find("texto")),
        $("#myModalLabelimg").html($(a).find("titulo"));
    },
    error: function () {
      $("#mensajeeimg").html(
        " <strong style='color:red;'><i class='fa fa-times' aria-hidden='true'></i> Ocurrió un error, intente nuevamente más tarde...</strong>"
      );
    },
  });
}
function load(a, ord) {
  $("#modal-body").animate({ scrollTop: 0 }, "slow");
  var o = { option: a, orden: ord };
  $.ajax({
    url: "textos.php",
    type: "POST",
    data: o,
    beforeSend: function () {
      $("#modal-body").html(
        "<strong><i class='fa fa-spinner fa-pulse' aria-hidden='true'></i> ...Cargando...</strong>"
      );
    },
    success: function (a) {
      $("#modal-body").html($(a).find("texto")),
        $("#myModalLabel").html($(a).find("titulo"));
    },
    error: function () {
      $("#mensajee").html(
        " <strong style='color:red;'><i class='fa fa-times' aria-hidden='true'></i> Ocurrió un error, intente nuevamente más tarde...</strong>"
      );
    },
  });
}
function loadorden(a) {
  $("#modal-body").animate({ scrollTop: 0 }, "slow");
  var o = { option: a, orden: $("#buscarOrdencita").val() };
  $.ajax({
    url: "textos.php",
    type: "POST",
    data: o,
    beforeSend: function () {
      $("#modal-body").html(
        "<strong><i class='fa fa-spinner fa-pulse' aria-hidden='true'></i> ...Cargando...</strong>"
      );
    },
    success: function (a) {
      $("#modal-body").html($(a).find("texto")),
        $("#myModalLabel").html($(a).find("titulo"));
    },
    error: function () {
      $("#mensajee").html(
        " <strong style='color:red;'><i class='fa fa-times' aria-hidden='true'></i> Ocurrió un error, intente nuevamente más tarde...</strong>"
      );
    },
  });
}
function comprobar_campos_contacto() {
  if ("" == $("#nombre_contacto").val())
    return $("#nombre_contacto").focus(), !1;
  var a = $("#email_contacto").val().search("@");
  return "" == $("#email_contacto").val() || "-1" == a
    ? ($("#email_contacto").focus(), !1)
    : "" == $("#telefono_contacto").val()
    ? ($("#telefono_contacto").focus(), !1)
    : "" == $("#asunto_contacto").val()
    ? ($("#asunto_contacto").focus(), !1)
    : "" != $("#consulta_contacto").val() ||
      ($("#consulta_contacto").focus(), !1);
}
function enviar_contacto() {
  (a = $("#main-contact-form")).submit(function (a) {
    a.preventDefault();
  });
  var a,
    o = 0;
  !0 === comprobar_campos_contacto() &&
    (a = $("#main-contact-form")).submit(function (e) {
      e.preventDefault();
      var t = $('<div class="form_status"></div>');
      $("#formulario_contacto")
        .find("#btn_enviar_contacto")
        .attr("class", "oculto"),
        $("#formulario_contacto")
          .find("#alerta_enviar_contacto")
          .html("...Enviando datos...");
      var n = "";
      (n += "nombre_contacto=" + $("#nombre_contacto").val() + "&"),
        (n += "telefono_contacto=" + $("#telefono_contacto").val() + "&"),
        (n += "email_contacto=" + $("#email_contacto").val() + "&"),
        (n += "asunto_contacto=" + $("#asunto_contacto").val() + "&"),
        (n += "consulta_contacto=" + $("#consulta_contacto").val() + "&"),
        0 == o &&
          $.ajax({
            url: "enviar_contacto.php",
            cache: !1,
            type: "POST",
            data: n,
            beforeSend: function () {
              (o += 1),
                a.prepend(t.html("")),
                a.prepend(
                  t
                    .html(
                      '<div class="alert alert-info"><strong style=color:black;><p><i class="fa fa-spinner fa-spin"></i> El correo se esta enviando, aguarde por favor...</p></strong></div>'
                    )
                    .fadeIn()
                ),
                $("#btn_enviar_contacto").prop("disabled", !0);
            },
          }).done(function (a) {
            "OK" == a
              ? ((o += 1),
                t
                  .html(
                    '<div class="alert alert-success"><p class="">Gracias por contactarnos. Nos pondremos en contacto lo antes posible</p></div>'
                  )
                  .delay(5e3)
                  .fadeOut(),
                alert("Sus comentarios fueron enviados correctamente"),
                $("#btn_enviar_contacto").prop("disabled", !1),
                $("#nombre_contacto").val(""),
                $("#email_contacto").val(""),
                $("#asunto_contacto").val(""),
                $("#consulta_contacto").val(""),
                setTimeout(function () {
                  window.location.reload();
                }, 2e3))
              : ((o += 1),
                t
                  .html(
                    '<div class="alert alert-danger"><p class="">Se produjo un error al enviar el correo. Reintente nuevamente en unos instantes.</p></div>'
                  )
                  .delay(5e3)
                  .fadeOut(),
                alert("Se produjo un error, inténtelo nuevamente."),
                $("#btn_enviar_contacto").prop("disabled", !1));
          });
    });
}
function comprobar_campos_enviar_cv() {
  if (
    ($("#btcv").attr("disabled", !0),
    mensaje_cv(""),
    "" == $("#nombre_trabaja_nosotros").val())
  )
    return (
      (a = "<div class='alert alert-danger'>Debes completar el nombre</div>"),
      $("#nombre_trabaja_nosotros").focus(),
      mensaje_cv(a),
      !1
    );
  if ("" == $("#email_trabaja_nosotros").val())
    return (
      (a =
        "<div class='alert alert-danger'>Debes completar el correo electrónico para poder comunicarnos.</div>"),
      $("#email_trabaja_nosotros").focus(),
      mensaje_cv(a),
      !1
    );
  var a = $("#email_trabaja_nosotros").val(),
    o = a.search("@");
  return "" == $("#email_trabaja_nosotros").val() || "-1" == o
    ? ((a =
        "<div class='alert alert-danger'>Debes completar el correo electrónico adecuado.</div>"),
      $("#email_trabaja_nosotros").focus(),
      mensaje_cv(a),
      !1)
    : "" != $("#cv").val() ||
        ((a =
          "<div class='alert alert-danger'>Debes seleccionar tu archivo</div>"),
        $("#cv").focus(),
        mensaje_cv(a),
        !1);
}
function enviar_cv() {
  if (!comprobar_campos_enviar_cv()) return !1;
  var a = new FormData($("#formulario_enviar_cv")[0]),
    o = "";
  $.ajax({
    url: "subir_archivo.php",
    type: "POST",
    data: a,
    cache: !1,
    async: !0,
    contentType: !1,
    processData: !1,
    beforeSend: function () {
      mensaje_cv(
        (o =
          "<div class='alert alert-info'>Subiendo archivo, por favor espere...</div>")
      );
    },
    success: function (a) {
      if ("OK" == $(a).find("respuesta").text())
        (o =
          "<div class='alert alert-success'>Tu curriculum se subió correctamente</div>"),
          $("#nombre_trabaja_nosotros").val(""),
          $("#email_trabaja_nosotros").val(""),
          $("#cv").val("");
      else
        switch ($(a).find("error").text()) {
          case "ns":
            o =
              "<div  class='alert alert-danger'> " +
              $(a).find("archivo").text() +
              "Se produjo un error, vuelva a intentarlo</div>";
            break;
          case "ext":
            o =
              "<div  class='alert alert-danger'>Archivo no válido, recuerde seleccionar un PDF o DOC.</div>";
            break;
          case "nopet":
            o = "<div  class='alert alert-danger'>Error.</div>";
        }
      mensaje_cv(o), $("#btcv").attr("disabled", !1);
    },
    error: function () {
      mensaje_cv(
        (o = "<div class='alert alert-danger'>Ha ocurrido un error.</alert>")
      ),
        $("#btcv").attr("disabled", !1);
    },
  });
}
function mensaje_cv(a) {
  $("#alerta_cv").html("").show(), $("#alerta_cv").html(a);
}
function terminosCondiciones() {
  $("#modal-body").animate({ scrollTop: 0 }, "slow");
  $.ajax({
    url: "textos.php",
    type: "POST",
    data: { option: "terminos" },
    beforeSend: function () {
      $("#modal-body").html(
        "<strong><i class='fa fa-spinner fa-pulse' aria-hidden='true'></i> ...Cargando...</strong>"
      );
    },
    success: function (a) {
      $("#modal-body").html($(a).find("texto")),
        $("#myModalLabel").html($(a).find("titulo"));
    },
    error: function () {
      $("#mensajee").html(
        " <strong style='color:red;'><i class='fa fa-times' aria-hidden='true'></i> Ocurrió un error, intente nuevamente más tarde...</strong>"
      );
    },
  });
}
