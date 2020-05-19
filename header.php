<?php
require_once __DIR__."/Controller/ControllerTheLoai.php";
require_once __DIR__."/Controller/ControllerQuocGia.php";
$controllerTheLoai = new ControllerTheLoai();
$controllerQuocGia = new ControllerQuocGia();

?>

<div class="container-fluid bg-success d-flex justify-content-center">
    <div class="container row">
        <div class="container col-12 col-md-5 d-flex justify-content-md-start justify-content-center">
            <img class="logo-header p-1 logo" src="img/logo.png" onclick="window.location.href='index.php'">
            <p class="h2 web-title text-light text logo" onclick="window.location.href='index.php'"><strong>PHIM HAY</strong></p>
            <div style="clear: both"></div>
        </div>
        <div class="input-group mb-3 col-12 col-md-7 mt-3">
            <input type="text" class="form-control w-25" placeholder="Tìm kiếm...">
            <div class="input-group-append">
                <button class="btn bg-white fa fa-search" type="button"></button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-success">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto list-inline">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><strong>PHIM HAY</strong></a>
                    </li>
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
        </nav>
    </div>
</div>