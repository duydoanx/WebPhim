<?php
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
$username_error = false;
$email_error = false;
$ngaysinh_error = false;
$thanhcong = true;

    if (isset($_REQUEST['type'])){
        if (strcmp($_REQUEST['type'], 'add_mod') == 0){
            $user = $controllerUser->getUserFromEmail($_REQUEST['email']);
            if ($user){
                try {
                    $check = $controllerUser->getUserFromUsername($_REQUEST['username']);
                    if (strcmp($check->getUSERNAME(), $user->getUSERNAME()) != 0){
                        $username_error = true;
                    }else{
                        $controllerUser->updateUser($_REQUEST['username'], $_REQUEST['isadmin'], $_REQUEST['email'], $_REQUEST['hoten'], $_REQUEST['ngaysinh']);
                    }

                }catch (Exception $e){
                    $thanhcong = false;
                }
            }else{
                try {
                    $controllerUser->addUser($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['isadmin'], $_REQUEST['email'], $_REQUEST['hoten'], $_REQUEST['ngaysinh']);
                }catch (Exception $e){
                    $thanhcong = false;
                }
            }
        }else if (strcmp($_REQUEST['type'], 'delete') == 0){
            $controllerUser->deleteUser($_REQUEST['email']);
        }
    }

    $username = "";
    $admin = "0";
    $email = "";
    $hoTen = "";
    $ngaySinh = "";
    if (isset($_REQUEST['email'])){
        try {
            $user = $controllerUser->getUserFromEmail($_REQUEST['email']);
        }catch (Exception $e){

        }

        if ($user){
            $username = $user->getUSERNAME();
            $admin = $user->getISADMIN();
            $email = $user->getEMAIL();
            $hoTen = $user->getHOTEN();
            $ngaySinh = $user->getNGAYSINH();
        }
    }



?>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Thêm mới/Sửa</h2>
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
                    action="index.php?page=usermod&type=add_mod"
                    method="post"
                    id="demo-form2"
                    data-parsley-validate
                    class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
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
                      <label class=\"control-label col-md-3 col-sm-3 col-xs-12\">Mật khẩu</label>
                      <div class=\"col-md-6 col-sm-6 col-xs-12\">
                        <input
                            name=\"password\"
                          type=\"password\"
                          class=\"form-control\"
                        />
                      </div>
                    </div>";
                      }
                      ?>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Admin</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php
                            if (strcmp($admin, '1') == 0){
                                echo "<div class=\"radio radio-inline\">
                          <label>
                            <input
                              type=\"radio\"
                              name=\"isadmin\"
                              value='1'
                              checked=\"checked\"
                            />
                            <i class=\"helper\"></i>Có
                          </label>
                        </div>
                        <div class=\"radio radio-inline\">
                          <label>
                            <input type=\"radio\" name=\"isadmin\" value='0'/>
                            <i class=\"helper\"></i>Không
                          </label>
                        </div>";
                            }else{
                                echo "<div class=\"radio radio-inline\">
                          <label>
                            <input
                              type=\"radio\"
                              name=\"isadmin\"
                              value='1'
                            
                            />
                            <i class=\"helper\"></i>Có
                          </label>
                        </div>
                        <div class=\"radio radio-inline\">
                          <label>
                            <input type=\"radio\" name=\"isadmin\" checked=\"checked\" value='0'/>
                            <i class=\"helper\"></i>Không
                          </label>
                        </div>";
                            }
                          ?>

                      </div>
                    </div>
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
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
                        class="control-label col-md-3 col-sm-3 col-xs-12"
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
                        class="control-label col-md-3 col-sm-3 col-xs-12"
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
                        <a class="btn btn-danger" type="button" href="index.php?page=user">
                          Quay về
                        </a>
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

