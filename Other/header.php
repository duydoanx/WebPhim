<?php
require_once __DIR__ . "/../Controller/ControllerTheLoai.php";
require_once __DIR__ . "/../Controller/ControllerQuocGia.php";
require_once __DIR__ . "/../Controller/ControllerUser.php";
$controllerTheLoai = new ControllerTheLoai();
$controllerQuocGia = new ControllerQuocGia();

session_start();

?>
<div class="container-fluid bg-success">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-success">
                <a class="navbar-brand" href="/">
                    <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    <strong>PHIM HAY</strong>
                </a>
            <div class="d-flex justify-content-end">
                <div class="btn-group mt-0 mr-2 d-block d-md-block d-lg-none d-xl-none">
                    <?php
                    if (!isset($_SESSION['email'])){
                        echo "<button onclick='loginURL()' id='login-bt' type=\"button\" class=\"btn btn-dark\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                    Đăng nhập
                                  </button>";
                    }else{
                        $email = $_SESSION["email"];
                        $ControllerUser = new ControllerUser();
                        $user = $ControllerUser->getUserFromEmail($email);
                        $username = $user->getUSERNAME();
                        echo "<button type=\"button\" class=\"btn btn-dark dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        $username
                          </button>
                            <div class=\"dropdown-menu bg-dark border border-light dropdown-menu-right\">";

                        if (strcmp($user->getISADMIN(), "1") == 0){
                            echo "<button onclick='toURL(\"admin/index.php\")' class='dropdown-item bg-dark text-light' type='button'>Admin</button>";
                        }

                        echo "<button onclick='logout()' class='dropdown-item text-light bg-dark' type='button'>Logout</button>                            
                            </div>";
                    }
                    ?>

                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

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

                <form class="form-inline p-0 mb-sm-1">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Nhập tên phim..." aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button">Tìm Kiếm</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="btn-group ml-1 mt-0 mb-1 mr-0 d-none d-md-none d-lg-block d-xl-block">
                <?php
                if (!isset($_SESSION['email'])){
                    echo "<button onclick='loginURL()' id='login-bt' type=\"button\" class=\"btn btn-dark\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                    Đăng nhập
                                  </button>";

                }else{
                    $email = $_SESSION["email"];
                    $ControllerUser = new ControllerUser();
                    $user = $ControllerUser->getUserFromEmail($email);
                    $username = $user->getUSERNAME();
                    echo "<button type=\"button\" class=\"btn btn-dark dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        $username
                          </button>
                            <div class=\"dropdown-menu bg-dark border border-light dropdown-menu-right\">";

                    if (strcmp($user->getISADMIN(), "1") == 0){
                        echo "<button onclick='toURL(\"admin/index.php\")' class='dropdown-item bg-dark text-light' type='button'>Admin</button>";
                    }

                    echo "<button onclick='logout()' class='dropdown-item text-light bg-dark' type='button'>Logout</button>                            
                            </div>";
                }
                ?>
            </div>

        </nav>
</div>