<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | Form</title>
    <!-- Bootstrap -->
    <link href="asset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet" />
    <link href="css/mycss.css" rel="stylesheet" />
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"
                ><i
                  ><img
                    src="/img/logo.png"
                    alt="logo"
                    width="25px"
                    height="25px"
                /></i>
                <span>Phim Hay</span></a
              >
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Peter Parker</h2>
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
                  <li>
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li>
                    <a href="/User.html"><i class="fa fa-user"></i> User</a>
                  </li>
                  <li>
                    <a href="/Movie.html"><i class="fa fa-film"></i> Movie</a>
                  </li>
                  <li>
                    <a href="/Login.html"
                      ><i class="fa fa-sign-out"></i> Logout</a
                    >
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
                    Peter Parker
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="/">
                        <i class="fa fa-home pull-right"></i> Home</a
                      >
                    </li>
                    <li>
                      <a href="/User.html">
                        <i class="fa fa-user pull-right"></i> User</a
                      >
                    </li>
                    <li>
                      <a href="/Movie.html">
                        <i class="fa fa-film pull-right"></i> Movie</a
                      >
                    </li>
                    <li>
                      <a href="/login.html"
                        ><i class="fa fa-sign-out pull-right"></i> Log Out</a
                      >
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
          <div class="page-header zvn-page-header">
            <div class="zvn-page-header-title">
              <h3>Thêm mới</h3>
            </div>
            <div class="zvn-page-header-breadcrumb">
              <ul class="zvn-breadcrumb-title clearfix">
                <li class="zvn-breadcrumb-item">
                  <a href="index.php">
                    Trang chủ
                  </a>
                </li>
                <li class="zvn-breadcrumb-item">Thêm mới</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Thêm mới</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right">
                      <a class="collapse-link"
                        ><i class="fa fa-chevron-up"></i
                      ></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                
                <div class="x_content">
                  <br />
                  <div
                    class="alert alert-danger alert-dismissible fade in zvn-alert"
                    role="alert"
                  >
                    <button
                      type="button"
                      class="close"
                      data-dismiss="alert"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">×</span>
                    </button>
                    <strong
                      ><i class="fa fa-exclamation-triangle"></i> Xảy ra
                      lỗi!</strong
                    >
                    <p><strong>- Tên :</strong> không được rỗng</p>
                    <p><strong>- Username:</strong> không có dấu</p>
                    <p><strong>- Password:</strong> phải có ký tự đặc biệt</p>
                  </div>
                  <form
                    id="demo-form2"
                    data-parsley-validate
                    class="form-horizontal form-label-left"
                  >
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="TenPhimVN"
                        >Tên Phim VN
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="TenPhimVN"
                          required="required"
                          class="form-control col-md-7 col-xs-12"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="TenPhimGoc"
                        >Tên Phim Góc
                        <span class="required">*</span>
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="TenPhimGoc  "
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="TrangThai"
                        >Trạng Thái
                        <span class="required">*</span>
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="TrangThai"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="NamPhatHanh"
                        >Năm Phát Hành
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="date"
                          id="NamPhatHanh"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>


                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="ThoiLuong"
                        >Thời Lượng
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="number"
                          id="ThoiLuong"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="ChatLuong"
                        >Chất Lượng
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="ChatLuong"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="DoPhanGiai"
                        >Độ Phân Giải
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="DoPhanGiai"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="NgonNgu"
                        >Ngôn Ngữ
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="NgonNgu"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="AnhPhim"
                        >Ảnh Phim
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="file"
                          id="AnhPhim"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="HuongDan"
                        >Hướng Dẫn
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="HuongDan"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="DanhGia"
                        >Đánh Giá
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="text"
                          id="DanhGia"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>


                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="Trailer"
                        >Trailer
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                          type="file"
                          id="Trailer"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-danger" type="button">
                          Quay về
                        </button>
                        <button type="submit" class="btn btn-success">
                          Lưu
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © Copyright 2020 Phim Hay
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
    <!-- jQuery -->
    <script src="js/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="asset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="js/formUser.js"></script>
  </body>
</html>
