<?php
if (isset($_REQUEST['checkLogin'])){
    session_start();
    if (isset($_SESSION['email'])){
        echo "true";
    }else echo "false";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" href="style/LoginStyle.css">
    <title>Đăng nhập - Phim Hay</title>
    <link rel="icon" href="img/logo.png">

</head>
<body class="bg-dark">
<?php

    require_once __DIR__."/Controller/ControllerUser.php";

    $loginerror = false;
    if (isset($_REQUEST['logout'])){
        session_start();
        $_SESSION = array();
        session_destroy();
    }
    session_start();
    if (!isset($_SESSION['email'])) {
        if (isset($_POST["login"])) {
            session_start();
            $user = new ControllerUser();
            if ($user->checkLogin($_POST["email"], $_POST["password"])) {
                $_SESSION['email'] = $_POST["email"];

                header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/");
            }else
            {
                $loginerror = true;
            }
        }
    }else{
        header("Location: " . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://") . $_SERVER['HTTP_HOST'] . "/");
    }


?>
<div class="container-fluid p-0">
    <a class="btn btn-success font-weight-bold" href="/">PHIM HAY</a>
</div>

    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto d-flex justify-content-center">
                <div class="card card-signin my-5 align-self-center w-100">
                    <div class="card-header d-flex justify-content-center">
                        <h5 class="bg-transparent">Đăng nhập</h5>
                    </div>
                    <div class="card-body h-100">
                        <form class="form-signin" method="post" action="login.php">
                            <div class="form-label-group">
                                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputEmail">Địa chỉ email</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Mật khẩu</label>
                            </div>
                            <?php
                                if ($loginerror){
                                    echo "<p class='d-flex justify-content-center text-danger'>Tên đăng nhập hoặc mật khẩu không đúng.</p>";
                                }
                            ?>
                            <button name="login" class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
