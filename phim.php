<?php
    include_once "Controller/ControllerPhim.php";
    if (!isset($_GET['phim'])){
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

                        <div class="card-body pt-0 pb-0">
                            <div class="row mt-0 pt-0">
                                <div class="col-5 m-0 p-1">
                                    <?php
                                    if ($phim->getTrailer())
                                        echo "<a href=\"https://www.youtube.com/watch?v=".$phim->getTRAILER()."\" class=\"btn btn-danger col-12\">Trialer</a>";
                                    else{
                                        echo "<a href=\"\" class=\"btn btn-danger col-12\">Trailer</a>";
                                    }
                                    ?>

                                </div>

                                <div class="col-7 m-0 p-1">
                                    <?php
                                        echo "<a href='xem.php?xem=true&id=".$phim->getID()."&tenphim=".$phim->getTENPHIMGOC()."' class=\"btn btn-success col-12\">Xem Phim</a>";
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 p-0 pl-lg-2">
                    <?php
                    echo "<h2 class='text-warning p-0 m-0'>".$phim->getTENPHIMVN()."</h2>
                                                    
                            <p class='text-light p-0 m-0'>".$phim->getTENPHIMGOC()."</p>
                            <br>
                            <p class='text-light'><span class='font-weight-bold'>Trạng thái:</span> <span class='text-danger'>".$phim->getTRANGTHAI()."</span></p>
                            <p class='text-light'><span class='font-weight-bold'>Năm phát hành:</span> ".$phim->getNAMPHATHANH()."</p>
                            <p class='text-light'><span class='font-weight-bold'>Chất lượng:</span> ".$phim->getCHATLUONG()."</p>
                            <p class='text-light'><span class='font-weight-bold'>Ngôn ngữ:</span> ".$phim->getNGONNGU()."</p>
                            <p class='text-light'><span class='font-weight-bold'>Độ phân giải:</span> <span class='text-danger font-weight-bold'>".$phim->getDOPHANGIAI()."</span></p>
                            ";

                    ?>
<!--                    <div class="card align-self-start bg-dark">-->
<!--                        <div class="card-body text-light p-0 border-0" style="height: 200px;">-->
<!--                            -->
<!---->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="row mt-3">
                    <h5 class="text-warning font-weight-bold p-0 ml-0">NỘI DUNG PHIM</h5>
                </div>
                <div class="row">

                    <?php
                        echo "<h5 class='text-light'>".$phim->getNOIDUNGPHIM()."</h5>"
                    ?>
                </div>
                <?php
                if ($phim->getTrailer()){
                    echo "<div class=\"row mt-3\">
                            <h5 class=\"text-warning font-weight-bold p-0 ml-0\">TRAILER PHIM</h5>
                        </div>";

                    echo "<div class=\"container-fluid\">
                            <div class=\"col-12 embed-responsive embed-responsive-16by9\">                        
                                <iframe class='embed-responsive-item' width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/".$phim->getTrailer()."\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>
                            </div>
                        </div>";
                }
                ?>

            </div>
        </div>
        <?php

            require_once 'Other/comment.php';
        ?>
    </div>

</body>

</html>

