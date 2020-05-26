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
    <link rel="stylesheet" type="text/css" href="style/StyleIndex.css">
    <title>Phim Hay</title>
    <link rel="icon" href="img/logo.png">
</head>
    <body class="bg-dark">
        <?php
            include_once "Other/header.php";
            include_once "Controller/ControllerPhim.php";
            $phim = new ControllerPhim();
            $allPhim = $phim->getPhims(0, 8);
            $phimDeCu = $phim->getPhimDeCu();

        ?>
        <div class="container-fluid topFix ">
            <div class="container d-none d-md-none d-lg-block d-xl-block" >
                <h5 class="mt-3 text-warning font-weight-bold">PHIM ĐỀ CỬ</h5>
                <hr class="my-2 bg-light">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center">
                                <?php
                                    for ($i = 0; $i <= 2; $i++){

                                        echo "<div class=\"card m-2\" style=\"width: 18rem;\">
                                                <a class='stretched-link' title='".$phimDeCu[$i]->getTENPHIMVN()."' href='phim.php?phim=true&id=".$phimDeCu[$i]->getID()."&tenphim=".$phimDeCu[$i]->getTENPHIMGOC()."' >
                                                    <img class=\"card-img-top\" src=\"img/PosterPhim/".$phimDeCu[$i]->getID().".jpg\" alt=\"Card image cap\">
                                                    <div class=\"card-body\">
                                                        <h6 class=\"d-inline-block text-truncate title-size\" title='".$phimDeCu[$i]->getTENPHIMVN()."'>".$phimDeCu[$i]->getTENPHIMVN()."</h6>
                                                    </div>
                                                </a>
                                            </div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <?php
                                for ($i = 3; $i <= 5; $i++){
                                   echo "<div class=\"card m-2\" style=\"width: 18rem;\">
                                                <a class='stretched-link' title='".$phimDeCu[$i]->getTENPHIMVN()."' href='phim.php?phim=true&id=".$phimDeCu[$i]->getID()."&tenphim=".$phimDeCu[$i]->getTENPHIMGOC()."' >
                                                    <img class=\"card-img-top\" src=\"img/PosterPhim/".$phimDeCu[$i]->getID().".jpg\" alt=\"Card image cap\">
                                                    <div class=\"card-body\">
                                                        <h6 class=\"d-inline-block text-truncate title-size\" title='".$phimDeCu[$i]->getTENPHIMVN()."'>".$phimDeCu[$i]->getTENPHIMVN()."</h6>
                                                    </div>
                                                </a>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center">
                                <?php
                                for ($i = 6; $i <= 8; $i++){
                                    echo "<div class=\"card m-2\" style=\"width: 18rem;\">
                                                <a class='stretched-link' title='".$phimDeCu[$i]->getTENPHIMVN()."' href='phim.php?phim=true&id=".$phimDeCu[$i]->getID()."&tenphim=".$phimDeCu[$i]->getTENPHIMGOC()."' >
                                                    <img class=\"card-img-top\" src=\"img/PosterPhim/".$phimDeCu[$i]->getID().".jpg\" alt=\"Card image cap\">
                                                    <div class=\"card-body\">
                                                        <h6 class=\"d-inline-block text-truncate title-size\" title='".$phimDeCu[$i]->getTENPHIMVN()."'>".$phimDeCu[$i]->getTENPHIMVN()."</h6>
                                                    </div>
                                                </a>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="container d-block d-md-block d-lg-none d-xl-none">
                <h5 class="mt-3 text-warning font-weight-bold mb-0">PHIM ĐỀ CỬ</h5>
                <hr class="my-2 bg-light">
                <div class="container">
                    <div class="row">
                        <?php
                        $anhPhim = "";
                        foreach ($phimDeCu as $item) {
                            $anhPhim = $item->getANHPHIM();
                            echo "<div class=\"col-md-4 col-lg-3 col-6 p-1\">";
                            echo "<div class=\"card w-100 h-100 mt-2 mb-2 ml-0 mr-0\" style=\"width: 18rem;\">";
                            echo "<a class='stretched-link' title='".$item->getTENPHIMVN()."' href='phim.php?phim=true&id=".$item->getID()."&tenphim=".$item->getTENPHIMGOC()."' >";
                            echo "<img class=\"card-img-top\" src=\"".$item->getANHPHIM()."\" alt=\"Card image cap\">";
                            echo "<div class=\"card-body\">
                                    <h6 class=\"d-inline-block text-truncate title-size\" title='".$item->getTENPHIMVN()."' >".$item->getTENPHIMVN()."</h6>                             
                                </div>
                                </a>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="container-fluid p-0 m-0 d-flex justify-content-between">
                    <h5 class="mt-3 text-warning font-weight-bold mb-0">PHIM MỚI</h5>
                    <a class="text text-warning p-0 mt-3 mr-1 mb-0" href="danhsach.php?duyet=phimmoi" title="Xem thêm các phim mới">Xem thêm</a>
                </div>
                <hr class="my-2 bg-light">
                <div class="container">
                    <div class="row">
                        <?php
                        $anhPhim = "";
                        foreach ($allPhim as $item) {
                            $anhPhim = $item->getANHPHIM();
                            echo "<div class=\"col-md-4 col-lg-3 col-6 p-1\">";
                            echo "<div class=\"card w-100 h-100 mt-2 mb-2 ml-0 mr-0\" style=\"width: 18rem;\">";
                            echo "<a class='stretched-link' title='".$item->getTENPHIMVN()."' href='phim.php?phim=true&id=".$item->getID()."&tenphim=".$item->getTENPHIMGOC()."' >";
                            echo "<img class=\"card-img-top\" src=\"".$item->getANHPHIM()."\" alt=\"Card image cap\">";
                            echo "<div class=\"card-body\">
                                    <h6 class=\"d-inline-block text-truncate title-size\" title='".$item->getTENPHIMVN()."' >".$item->getTENPHIMVN()."</h6>                             
                                </div>
                                </a>
                            </div>
                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
