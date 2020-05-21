<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" href="style/headerStyle.css">
    <link rel="stylesheet" href="style/StyleIndex.css">
    <title>Phim Hay</title>
    <link rel="icon" href="img/logo.png">
</head>
    <body class="bg-dark">
        <?php
            include_once "header.php";
            include_once "Controller/ControllerPhim.php"
        ?>

        <div class="container topFix" >
            <h5 class="mt-3 text-warning font-weight-bold">PHIM ĐỀ CỬ</h5>
            <hr class="my-2 bg-light">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center">
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>

                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center">
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
                            <div class="card m-2" style="width: 18rem;">
                                <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                </div>
                            </div>
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

        <?php
            $phim = new ControllerPhim();
            $allPhim = $phim->getAllPhim();
        ?>

        <div class="container">
            <div class="container-fluid p-0 m-0 d-flex justify-content-between">
                <h5 class="mt-3 text-warning font-weight-bold mb-0">PHIM MỚI</h5>
                <a class="text text-warning p-0 mt-3 mr-1 mb-0" href="#" title="Xem thêm các phim mới">Xem thêm</a>
            </div>
            <hr class="my-2 bg-light">
            <div class="container">
                <div class="row">

                    <?php
                    $anhPhim = "";
                    foreach ($allPhim as $item) {
                        $anhPhim = $item->getANHPHIM();
                        echo "<div class=\"col-md-3 col-6 p-1\">";
                        echo "<div class=\"card w-100 h-100 mt-2 mb-2 ml-0 mr-0\" style=\"width: 18rem;\">";
                        echo "<img class=\"card-img-top\" src=\"".$item->getANHPHIM()."\" alt=\"Card image cap\">";
                        echo "<div class=\"card-body\">
                                <h5 class=\"card-title\">".$item->getTENPHIMGOC()."</h5>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-title">Card title</p>
                                <p class="card-text">text</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6 p-1">
                        <div class="card w-100 h-100 mt-2 mb-2 ml-0 mr-0" style="width: 18rem;">
                            <img class="card-img-top" src="img/download.svg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
