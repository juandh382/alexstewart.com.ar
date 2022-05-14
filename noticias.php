<?php
//$idweb = "200089606762276";
//$idapp = "536199060657932";
//$pwapp = "b49c1458f062068f19843028fe456dd6";
//$token = "61295f7fdff30b97340e2f97c7cb66ab";
//$token2 = "EAAHnq5KKFwwBAMSfFZAHNDXwqMBt9KCmc4tNKA9ifn45dhBSbmyenB2DhbgUfFeZC3tekhvOZAZAK1zhZAVnz6rZAMwpdVR4uykqGfyoSSE2RmgTGnXLifaBtBxNxZCsZBXs6P7oiAxhee4MQd2wqx0rhz4Xsdgrf42MCMZAIQ6siosaYf2Hi2kYNIrgLnHxqZBM672m1ACbThQAZDZD";
?>
<?php

// to get 'time ago' text
function time_elapsed_string($datetime, $full = false) {

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'año',
        'm' => 'mes',
        'w' => 'semana',
        'd' => 'dia',
        'h' => 'hora',
        'i' => 'munutos',
        's' => 'segundos',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? 'hace ' . implode(', ', $string) . '' : 'Justo ahora';
}
?>

<?php
$page_title = "Alex Stewart Social";
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="robots" content="noindex">
        <title><?php echo $page_title; ?></title>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <style>
            .profile-info{
                overflow:hidden;
            }

            .profile-photo{
                float:left;
            }

            .profile-photo img{
                width:40px; height:40px;
            }

            .profile-name{
                float:left; margin:0 0 0 .5em;
            }

            .time-ago{
                color:#999;
            }

            .profile-message{
                margin:1em 0;
            }

            .post-link{
                text-decoration:none;
            }

            .post-content{
                background: #f6f7f9; border: 1px solid #d3dae8; overflow:hidden;
            }

            .post-content img{
                width:100%;
            }

            .post-status{
                margin:.5em; font-weight:bold;
            }

            .post-picture{
                width:25%; float:left;
            }

            .post-info{
                width:70%; float:left; margin:.5em;
            }

            .post-info-name{
                font-weight:bold;
            }

            .post-info-description{
                color:#999;
            }
            .imgFB{
                max-width:100%;
                filter: grayscale(0%);

                -webkit-filter: grayscale(0%);

                transition:filter 0.4s;

                -webkit-transition:-webkit-filter 1s;
                margin:1rem;
                border-radius: 5px;
                border: 2px solid black;
            }
            .imgFB:hover {

                filter: grayscale(50%);

                -webkit-filter: grayscale(50%);

            }
            .carousel-inner .item img {

                margin: 0px auto;

            }
            .carousel-caption{
                background: rgba(0,0,0,0.4);
                border-radius: 5px;

            }
        </style>
    </head>
    <body>

        <div class="container">
            <?php
            echo "<h1 class='page-header'>{$page_title}</h1>";

            $fb_page_id = "200089606762276";
            $profile_photo_src = "https://graph.facebook.com/{$fb_page_id}/picture?type=square";
//            $profile_photo_src = "/imagenes/asilogofb.png";

            $access_token = "EAAHnq5KKFwwBAESOPQ8IoCeLAYMDZBgZAWwgVfkxELAbSMWcBezLiel6sWgYigCSxnrVtcgi9HEFTbZCnNNRxWMe4EwNHE2L3b9Pum4zkZBOHsqaJTQpLVbyxaPBk302gS8kuWEvEwjmT1wpZBT6neZAByFCVrKU0O1xTtA6e4yQahzI4dXn1b";
            $fields = "id,message,picture,created_time,from,full_picture,attachments";
            $limit = 15;

            $json_link = "https://graph.facebook.com/{$fb_page_id}/feed?access_token={$access_token}&fields={$fields}&limit={$limit}";
            $json = file_get_contents($json_link);


            $obj = json_decode($json, true);
            $feed_item_count = count($obj['data']);

            for ($x = 0; $x < $feed_item_count; $x++) {
                $tipoPosteo = "";
                $adjuntoIMG = array();
                $adjuntoVIDEO = array();
                $adjuntoDESCRIPCION = array();

                // to get the post id
                $id = $obj['data'][$x]['id'];
                $post_id_arr = explode('_', $id);
                $post_id = $post_id_arr[1];

                // user's custom message
                $message = $obj['data'][$x]['message'];

// picture from the link
                $picture = $obj['data'][$x]['full_picture'];
                $picture_url_arr = explode('&url=', $picture);
                $picture_url = urldecode($picture_url_arr[1]);

                $totaladjuntos = count($obj['data'][$x]["attachments"]["data"][0]["subattachments"]["data"]);
//                echo "total adjuntos: " . $totaladjuntos;

                $tipoPosteo = $obj["data"][$x]["attachments"]["data"][0]["type"];

                switch ($tipoPosteo) {
                    case "album":
                    case "new_album":
                        //adjuntos
                        for ($cAdjuntos = 1; $cAdjuntos < $totaladjuntos; $cAdjuntos++) {
                            array_push($adjuntoIMG, $obj['data'][$x]["attachments"]["data"][0]["subattachments"]["data"][$cAdjuntos]["media"]["image"]["src"]);
                        }
                        break;
                    case "video_inline":
                    case "video":
                        array_push($adjuntoVIDEO, $obj['data'][$x]["attachments"]["data"][0]["media"]["source"]);
                        break;
                }
                for ($cAdjuntos = 0; $cAdjuntos < $totaladjuntos; $cAdjuntos++) {
                    array_push($adjuntoDESCRIPCION, $obj['data'][$x]["attachments"]["data"][0]["subattachments"]["data"][$cAdjuntos]["description"]);
                }




                $link = $obj['data'][$x]['link'];

                // name or title of the link posted
                $name = $obj['data'][$x]['name'];

                $description = $obj['data'][$x]['description'];
                $type = $obj['data'][$x]['type'];

                // when it was posted
                $created_time = $obj['data'][$x]['created_time'];
                $converted_date_time = date('Y-m-d H:i:s', strtotime($created_time));
                $ago_value = time_elapsed_string($converted_date_time);

                // from
                $page_name = $obj['data'][$x]['from']['name'];

                // useful for photo
                $object_id = $obj['data'][$x]['object_id'];

                echo "<div class='row'>";

                echo "<div class='col-md-12'>";

                echo "<div class='profile-info'>";
                echo "<div class='profile-photo'>";
                echo "<img src='{$profile_photo_src}' />";
                echo "</div>";

                echo "<div class='profile-name'>";
                echo "<div>";
                echo "{$page_name} <a href='https://fb.com/{$fb_page_id}' target='_blank'> <br>Ver en Facebook</a> ";
                echo "";
                if ($type == "status") {
                    $link = "https://www.facebook.com/{$fb_page_id}/posts/{$post_id}";
                }
                echo "<a href='{$link}' target='_blank'>{$type}</a>";
                echo "</div>";
                echo "<div class='time-ago'>{$ago_value}</div>";
                echo "</div>";
                echo "</div>";

                echo "<div class='profile-message'>" . str_replace("\n", "<br>", $message) . "</div>";
                if ($picture != "" || !is_null($adjuntoIMG)) {
                    $totalIMG = count($picture_url_arr) + count($adjuntoIMG);
                    ?>
                    <div id="myCarousel<?php echo $x ?>" class="carousel slide" data-ride="carousel">                          
                        <ol class="carousel-indicators">
                            <?php
                            for ($t = 0; $t < $totalIMG; $t++) {
                                $active = ($t == 0) ? "active" : "";
                                echo '<li data-target="#myCarousel' . $x . '" data-slide-to="' . $t . '" class="' . $active . '"></li>';
                            }
                            ?>
                        </ol>
                        <div class="carousel-inner text-center">
                            <?php
                            if ($picture != "") {
                                $vueltas = 0;
                                foreach ($picture_url_arr as $pp) {

                                    if (count($adjuntoVIDEO) <= 0) {
                                        $imgActive = ($vueltas == 0) ? " active" : "";
                                        ?>
                                        <div class="item <?php echo $imgActive; ?>">
                                            <img src="<?php echo $pp ?>" class='imgFB img-responsive center-block' alt="" style="">
                                            <div class="carousel-caption">
                                                <!--<h3>Los Angeles</h3>-->
                                                <p><?php echo $adjuntoDESCRIPCION[$vueltas] ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $vueltas++;
                                }
                            }
                            if (!is_null($adjuntoIMG)) {
                                $vueltas = 1;
                                foreach ($adjuntoIMG as $pp) {
                                    if (count($adjuntoVIDEO) <= 0) {
                                        $imgActive = ($vueltas == 0) ? " active" : "";
                                        ?>
                                        <div class="item <?php echo $imgActive; ?>">
                                            <img src="<?php echo $pp ?>" class='imgFB img-responsive center-block' alt="" style="">
                                            <div class="carousel-caption">
                                                <!--<h3>Los Angeles</h3>-->
                                                <p><?php echo $adjuntoDESCRIPCION[$vueltas] ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    $vueltas++;
                                }
                            }
                            ?>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel<?php echo $x ?>" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel<?php echo $x ?>" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>

                    </div>
                    <?php
                }
                if (!is_null($adjuntoVIDEO)) {
                    $vueltas = 0;
                    foreach ($adjuntoVIDEO as $pp) {
                        echo '<video controls style="width:100%"><source src="' . $pp . '" type="video/mp4">Su navegador no soporta la reproducción de video.</video></br>' . $adjuntoDESCRIPCION[$vueltas] . '</br>';
                        $vueltas++;
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "<hr />";
            }
            ?>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </body>
</html>