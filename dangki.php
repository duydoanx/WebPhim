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
    <title>Đăng kí</title>
    <link rel="icon" href="img/logo.png">
</head>
<body class="bg-dark">
<?php

include_once "Controller/ControllerUser.php";

$username_error = false;
$email_error = false;
$ngaysinh_error = false;
$thanhcong = false;
$controllerUser = new ControllerUser();
if (isset($_REQUEST['type'])){
    if (strcmp($_REQUEST['type'], 'add_mod') == 0){
        $user = $controllerUser->getUserFromEmail($_REQUEST['email']);
        if ($user){
            try {
                $check = $controllerUser->getUserFromUsername($_REQUEST['username']);
                if (strcmp($check->getUSERNAME(), $user->getUSERNAME()) != 0) {
                    $username_error = true;
                }
            }catch (Exception $e){
                $thanhcong = false;
            }
        }else{
            try {
                $controllerUser->addUser($_REQUEST['username'], $_REQUEST['password'], 0, $_REQUEST['email'], $_REQUEST['hoten'], $_REQUEST['ngaysinh']);
                $thanhcong = true;
            }catch (Exception $e){
                $thanhcong = false;
            }
        }
    }
}

$username = "";
$email = "";
$hoTen = "";
$ngaySinh = "";
if ($username_error || $email_error || $ngaysinh_error || $thanhcong == false){
    if (isset($_REQUEST['username'])){
        $username = $_REQUEST['username'];
    }
    if (isset($_REQUEST['email'])){
        $email = $_REQUEST['email'];
    }
    if (isset($_REQUEST['hoten'])){
        $hoTen = $_REQUEST['hoten'];
    }
    if (isset($_REQUEST['ngaysinh'])){
        $ngaysinh = $_REQUEST['ngaysinh'];
    }
}
if ($thanhcong){
    header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/login.php");
    exit();
}
include_once "Other/header.php";
?>
<div class="container" style="margin-top:  80px;">
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

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
                    <?php
                    if ($username_error || $email_error || $ngaysinh_error){
                        echo "<div
                    class=\"alert alert-danger alert-dismissible fade in zvn-alert\"
                    role=\"alert\">
                    <button
                      type=\"button\"
                      class=\"close\"
                      data-dismiss=\"alert\"
                      aria-label=\"Close\">
                      <span aria-hidden=\"true\">×</span>
                    </button>
                      
                    <strong>
                        <i class=\"fa fa-exclamation-triangle\"></i>
                        Xảy ra lỗi!
                    </strong>";
                        if ($username_error){
                            echo "<p><strong>- Username :</strong> bị trùng hoặc lỗi.</p>";
                        }
                        if ($email_error){
                            echo "<p><strong>- Email :</strong> bị trùng hoặc lỗi.</p>";
                        }
                        if ($ngaysinh_error){
                            echo "<p><strong>- Ngày sinh :</strong> không được để trống.</p>";
                        }
                        echo "</div>";
                    }else{
                        if (isset($_REQUEST['type']) && $thanhcong){
                            echo "<div
                                    class=\"alert alert-success alert-dismissible fade in zvn-alert\"
                                    role=\"alert\">
                                    <button
                                      type=\"button\"
                                      class=\"close\"
                                      data-dismiss=\"alert\"
                                      aria-label=\"Close\">
                                      <span aria-hidden=\"true\">×</span>
                                    </button>
                                      
                                    <strong>                                     
                                        Thành công!
                                    </strong>";
                            echo "</div>";
                        }else if (!$thanhcong){
                            echo "<div
                            class=\"alert alert-danger alert-dismissible fade in zvn-alert\"
                            role=\"alert\">
                            <button
                              type=\"button\"
                              class=\"close\"
                              data-dismiss=\"alert\"
                              aria-label=\"Close\">
                              <span aria-hidden=\"true\">×</span>
                            </button>
                              
                            <strong>
                                <i class=\"fa fa-exclamation-triangle\"></i>
                                Xảy ra lỗi!
                            </strong>";
                            echo "<p>- Kiểm tra lại thông tin.</p>";
                            echo "</div>";
                        }
                    }
                    ?>

                    <form
                        action="dangki.php?type=add_mod"
                        method="post"
                        id="demo-form2"
                        data-parsley-validate
                        class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label
                                class="control-label col-md-3 col-sm-3 col-xs-12 text-light"
                                for="username"
                            >Username
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo "<input
                                      type=\"text\"
                                      id=\"username\"
                                      required=\"required\"
                                      name='username'
                                      value='$username'
                                      class=\"form-control col-md-7 col-xs-12\"
                                    />";
                                ?>

                            </div>
                        </div>
                        <?php
                        if (strcmp($email, "") == 0){
                            echo "<div class=\"form-group\">
                      <label class=\"control-label col-md-3 col-sm-3 col-xs-12 text-light\">Mật khẩu</label>
                      <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input
                            name=\"password\"
                          type=\"password\"
                          required='required'
                          class=\"form-control\"
                        />
                      </div>
                    </div>";
                        }
                        ?>
                        <div class="form-group">
                            <label
                                class="control-label col-md-3 col-sm-3 col-xs-12 text-light"
                                for="email">Email
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo "<input
                          type=\"email\"
                          id=\"email\"
                          name='email'
                          value='$email'
                          required=\"required\"
                          placeholder=\"Nhập Email\"
                          class=\"form-control col-md-7 col-xs-12\"
                        />";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="control-label col-md-3 col-sm-3 col-xs-12 text-light"
                                for="name"
                            >Họ Tên
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo "<input
                          type=\"text\"
                          name='hoten'
                          id=\"name\"
                          value='$hoTen'
                          required=\"required\"
                          class=\"form-control col-md-7 col-xs-12\"
                        />";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label
                                class="control-label col-md-3 col-sm-3 col-xs-12 text-light"
                                for="birthday"
                            >Ngày sinh
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo "<input
                          type=\"date\"
                          name='ngaysinh'
                          id=\"birthday\"
                          value='$ngaySinh'
                          required=\"required\"
                          class=\"form-control col-md-7 col-xs-12\"/>";
                                ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">
                                    Đăng kí
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
