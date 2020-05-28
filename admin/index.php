<?php
require_once __DIR__."/../Controller/ControllerUser.php";
session_start();
if (!isset($_SESSION['email'])){
    header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
    exit();
}  else{
    $controllerUser = new ControllerUser();
    $user = $controllerUser->getUserFromEmail($_SESSION['email']);
    if (strcmp($user->getISADMIN(), "1") != 0) {
        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
        exit();
    }
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/favicon.ico" type="image/ico" />
    <title>Admin</title>
    <!-- Bootstrap -->
    <link href="asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="css/mycss.css" rel="stylesheet" />
      <script src="js/jquery/dist/jquery.min.js"></script>
      <!-- data tables -->
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <!-- Bootstrap -->


    <link
      rel="stylesheet"
      type="text/css"
      href="DataTables/datatables.min.css"/>
  </head>
  <body class="nav-md">
  <?php
  if(isset($_REQUEST['add_mod'])){
      echo var_dump($_REQUEST['states']);
  }
  ?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../admin/index.php" class="site_title">
                  <i>
                      <img
                        src="/img/logo.png"
                        alt="logo"
                        width="25px"
                        height="25px"/>
                  </i>
                <span>Phim Hay</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Xin chào,</span>
                  <?php
                    echo "<h2>".$user->getUSERNAME()."</h2>";
                  ?>

              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div
              id="sidebar-menu"
              class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <?php
                    if (!isset($_REQUEST['page'])){
                        echo "<li class=\"active\">";
                    }else echo "<li>";
                    ?>

                    <a href="../admin/"><i class="fa fa-home"></i> Home</a>
                  </li>
                    <?php
                    if (isset($_REQUEST['page']) && (strcmp($_REQUEST['page'], "user") == 0 || strcmp($_REQUEST['page'], "usermod") == 0)){
                        echo "<li class=\"active\">";
                    }else echo "<li>";
                    ?>

                    <a href="../admin/index.php?page=user"><i class="fa fa-user"></i> User</a>
                  </li>
                    <?php
                    if (isset($_REQUEST['page']) && strcmp($_REQUEST['page'], "movie") == 0 && strcmp($_REQUEST['page'], "moviemod")){
                        echo "<li class=\"active\">";
                    }else echo "<li>";
                    ?>
                    <a href="../admin/index.php?page=movie"><i class="fa fa-film"></i> Movie</a>
                  </li>
                  <li>
                    <a href="../Login.php?logout=true">
                        <i class="fa fa-sign-out"></i>
                            Logout
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a
                    href="javascript:;"
                    class="user-profile dropdown-toggle"
                    data-toggle="dropdown"
                    aria-expanded="false"
                  >
                      <?php
                      echo $user->getUSERNAME();
                      ?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="../admin/">
                        <i class="fa fa-home pull-right"></i> Home</a
                      >
                    </li>
                    <li>
                      <a href="../admin/index.php?page=user">
                        <i class="fa fa-user pull-right"></i> User</a
                      >
                    </li>
                    <li>
                      <a href="../admin/index.php?page=movie">
                        <i class="fa fa-film pull-right"></i> Movie</a
                      >
                    </li>
                    <li>
                      <a href="../Login.php?logout=true"
                        ><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-header zvn-page-header clearfix">
            <div class="zvn-page-header-title">
              <?php

              if (isset($_REQUEST['page'])){
                  switch ($_REQUEST['page']){
                      case 'user':
                      case 'usermod':
                          echo "
                                <h3>User</h3>
                            </div>
                            <div class=\"zvn-add-new pull-right\">
                                <a href=\"index.php?page=usermod\" class=\"btn btn-success\">
                                    <i class=\"fa fa-plus-circle\"></i> 
                                        Thêm mới User
                                </a>
                            </div>";
                          break;
                      case 'movie':
                          echo "
                                <h3>Movie</h3>
                            </div>
                            <div class=\"zvn-add-new pull-right\">
                                <a href=\"/formMovie.html\" class=\"btn btn-success\">
                                    <i class=\"fa fa-plus-circle\"></i> 
                                        Thêm mới Movie
                                </a>
                            </div>";
                          break;
                      default:
                          echo "<h3>Home</h3>
                                </div>";
                          break;
                  }
              }else echo "<h3>Home</h3>
                                </div>";

              ?>

          </div>
              <?php
              if (!(isset($_REQUEST['page']) &&  (strcmp($_REQUEST['page'], "usermod") == 0 || strcmp($_REQUEST['page'], "moviemod") == 0))){
                  echo "<div class=\"row\">
                            <div class=\"col-md-12 col-sm-12 col-xs-12\">
                              <div class=\"x_panel\">
                                <div class=\"x_title\">
                                  <h2>Tìm kiếm</h2>
                                  <ul class=\"nav navbar-right panel_toolbox\">
                                    <li class=\"pull-right\">
                                      <a class=\"collapse-link BL\"
                                        ><i class=\"fa fa-chevron-up\"></i
                                      ></a>
                                    </li>
                                  </ul>
                                  <div class=\"clearfix\"></div>
                                </div>
                                  
                                <div class=\"x_content BL\">
                                  <div class=\"row\">
                
                                      <div class=\"input-group\">
                                        <input
                                          type=\"text\"
                                          class=\"form-control\"
                                          name=\"search_value\"
                                          value=\"\"/>
                                        <span class=\"input-group-btn\">
                                          <button
                                            id=\"btn-search\"
                                            type=\"button\"
                                            class=\"btn btn-primary\"
                                          >
                                            Tìm kiếm
                                          </button>
                                        </span>
                                        <input type=\"hidden\" name=\"search_field\" value=\"all\" />
                                      </div>
                
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>";
              }
              ?>

          <!--box-lists-->
            <?php

                if (isset($_REQUEST['page'])){
                    switch ($_REQUEST['page']){
                        case 'user':
                            require_once __DIR__."/User.php";
                            break;
                        case 'movie':
                            require_once __DIR__."/Movie.php";
                            break;
                        case 'usermod':
                            require_once __DIR__."/formUser.php";
                            break;
                        case 'moviemod':
                            require_once __DIR__."/formMovie.php";
                            break;
                    }
                }

            ?>
          <!--end-box-lists-->
        </div>
        <!-- /page content -->
        <!-- footer -->
        <footer>
          <div class="pull-right">
            © Copyright 2020 Phim Hay
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer -->
      </div>
    </div>
    <!-- jQuery -->
        <script src="asset/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- data tables -->
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <!-- custom js -->
        <script src="js/index.js"></script>
  </body>

</html>