<?php
require_once __DIR__."/Controller/ControllerTheLoai.php";
require_once __DIR__."/Controller/ControllerQuocGia.php";
$controllerTheLoai = new ControllerTheLoai();
$controllerQuocGia = new ControllerQuocGia();

?>

<!--<div class="container-fluid bg-success d-flex justify-content-center">-->
<!--    <div class="container row">-->
<!---->
<!--        <div class="input-group mb-3 col-12 col-md-7 mt-3">-->
<!--            <input type="text" class="form-control w-25" placeholder="Tìm kiếm...">-->
<!--            <div class="input-group-append">-->
<!--                <button class="btn bg-white fa fa-search" type="button"></button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="container-fluid bg-success">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-success">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                <strong>PHIM HAY</strong>
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto list-inline">
                    <li class="nav-item dropdown div-inline active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>THỂ LOẠI</strong>
                        </a>
                        <div class="dropdown-menu dropdown-multicol bg-dark border border-light" aria-labelledby="navbarDropdown">
                            <?php
                            $allTheLoai = $controllerTheLoai->getAllTheLoai();
                            $dem = 0;
                            echo " <div class=\"dropdown-col\">";
                            foreach ($allTheLoai as $item){
                                $dem = $dem + 1;
                                echo "<a class=\"dropdown-item bg-dark text-light\" href=\"#\">".$item->getTenTheLoai()."</a>";
                                if ($dem<count($allTheLoai)){
                                    echo "</div>";
                                    echo " <div class=\"dropdown-col\">";
                                }else if ($dem == count($allTheLoai)){
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>QUỐC GIA</strong>
                        </a>
                        <div class="dropdown-menu dropdown-multicol bg-dark border border-light" aria-labelledby="navbarDropdown">
                            <?php
                            $allCuocGia = $controllerQuocGia->getAllQuocGia();
                            $dem = 0;
                            echo " <div class=\"dropdown-col\">";
                            foreach ($allCuocGia as $item){
                                $dem = $dem + 1;
                                echo "<a class=\"dropdown-item bg-dark text-light\" href=\"#\">".$item->getTen()."</a>";
                                if ($dem<count($allCuocGia)){
                                    echo "</div>";
                                    echo " <div class=\"dropdown-col\">";
                                }else if ($dem == count($allCuocGia)){
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>PHIM LẺ</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <strong>PHIM BỘ</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>
            </div>
            <form class="form-inline p-0 m-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="button">Tìm Kiếm</button>
                    </div>
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
</div>