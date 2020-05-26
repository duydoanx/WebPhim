<?php
include_once "Controller/ControllerPhim.php";
if (!isset($_GET['xem'])){
    header("Location: ".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://").$_SERVER['HTTP_HOST']."/");
    exit();
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="script/HeaderScript.js"></script>
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <link href="https://unpkg.com/@videojs/themes@1/dist/forest/index.css" rel="stylesheet"/>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" type="text/css" href="style/headerStyle.css">
    <link rel="stylesheet" type="text/css" href="style/CommentStyle.css">
    <?php
    if (isset($_GET['tenphim'])){
        echo "<title>".$_GET['tenphim']."</title>";
    }else{
        echo "<title>Phim Hay</title>";
    }
    ?>

    <link rel="icon" href="img/logo.png">
</head>
<body class="bg-dark">
<?php
include_once "Other/header.php";
$controllerPhim = new ControllerPhim();
$phim = $controllerPhim->getPhim($_GET['id']);
?>

    <div class="container" style="margin-top: 80px;">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-end pb-3">
                    <div class="card align-self-end" style="width: 18rem;">
                        <?php
                        echo "<img class=\"card-img-top\" src=\"img/PosterPhim/".$phim->getID().".jpg\" alt=\"Card image cap\">";
                        ?>
                        <div class="card-body bg-danger pt-0 pb-0">
                            <div class="row mt-0 pt-0">
                                    <?php
                                    if ($phim->getTrailer())
                                        echo "<a href=\"https://www.youtube.com/watch?v=".$phim->getTRAILER()."\" class=\"btn btn-danger col-12\">Xem Trailer</a>";
                                    else{
                                        echo "<a href=\"\" class=\"btn btn-danger col-12\">Xem Trailer</a>";
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 p-0 pl-lg-2">
                    <?php
                    echo "<h2 class='text-warning p-0 m-0'>".$phim->getTENPHIMVN()."</h2>
                            <p class='text-light p-0 m-0'>".$phim->getTENPHIMGOC()."</p>
                            <br>                           
                            <h5 class=\"text-warning font-weight-bold p-0 ml-0\">NỘI DUNG PHIM</h5>
                            <h5 class='text-light'>".$phim->getNOIDUNGPHIM()."</h5>";
                    ?>
                </div>
            </div>
        </div>
        <h5 class="mt-3 font-weight-bold text-warning">XEM PHIM</h5>

        <?php
        if ($phim->getDUONGDAN()){
            echo "<div class=\"container embed-responsive embed-responsive-16by9\">
                    <video
                            id=\"my-video\"
                            class=\"video-js embed-responsive-item\"
                            controls
                            preload=\"auto\"
                            width=\"640\"
                            height=\"264\"
                            poster=\"img/PosterPhim/".$phim->getID().".jpg\"
                            data-setup=\"{}\">
                        <source src=\"videos/".$phim->getDUONGDAN()."\" type=\"video/mp4\" />
                        <p class=\"vjs-no-js\">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href=\"https://videojs.com/html5-video-support/\" target=\"_blank\">supports HTML5 video</a>
                        </p>
                    </video>
            <script src=\"https://vjs.zencdn.net/7.7.6/video.js\"></script>
        </div>";
        } else{
            echo "<h5 class='text-danger font-weight-bold'>Đường dẫn phim bị lỗi :(</h5>";
        }
        ?>

        <?php

        require_once 'Other/comment.php';
        ?>
    </div>

</body>

</html>


