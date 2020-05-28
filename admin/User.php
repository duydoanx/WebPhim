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
require_once __DIR__."/../Controller/ControllerUser.php";

$controllerUser = new ControllerUser();
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right">
                        <a class="collapse-link DS"
                        ><i class="fa fa-chevron-up"></i
                            ></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content DS">
                <div class="table-responsive">
                    <table
                            class="table table-striped jambo_table bulk_action"
                            id="table">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">ID</th>
                            <th class="column-title">Tên đăng nhập</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Họ tên</th>
                            <th class="column-title">Loại tài khoản</th>
                            <th class="column-title">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $users = $controllerUser->getAllUser();
                            $i = 0;
                            foreach ($users as $item){
                                $i++;
                                echo "
                                <tr class=\"\">
                                    <td>$i</td>
                                    <td width=\"10%\">".$item->getUSERNAME()."</td>
                                    <td>".$item->getEMAIL()."</td>
                                    <td>".$item->getHOTEN()."</td>";
                                if (strcmp($item->getISADMIN(), '1') == 0){
                                    echo "<td>Admin</td>";
                                }else{
                                    echo "<td>Member</td>";
                                }

                                echo "            
                                    </td>
                                    <td class=\"\">
                                        <div class=\"zvn-box-btn-filter\">
                                            <a
                                                    href=\"index.php?page=usermod&email=".$item->getEMAIL()."\"
                                                    type=\"button\"
                                                    class=\"btn btn-icon btn-success\"
                                                    data-toggle=\"tooltip\"
                                                    data-placement=\"top\"
                                                    data-original-title=\"Edit\">
                                                <i class=\"fa fa-pencil\"></i>
                                            </a>
                                            <button
                                                   
                                                    type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#ModalId".$item->getUSERNAME()."\"
                                                    data-placement=\"top\"
                                                    data-original-title=\"Delete\">
                                                <i class=\"fa fa-trash\"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>";

                                echo "<div class=\"modal fade\" id=\"ModalId".$item->getUSERNAME()."\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                                        <div class=\"modal-dialog\" role=\"document\">
                                            <div class=\"modal-content\">
                                                <div class=\"modal-header\">
                                                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Modal title</h5>
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                                        <span aria-hidden=\"true\">&times;</span>
                                                    </button>
                                                </div>
                                                <div class=\"modal-body\">
                                                    Bạn có muốn xóa ".$item->getUSERNAME()."
                                                </div>
                                                <div class=\"modal-footer\">
                                                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Đóng</button>      
                                                  
                                                    <button onclick='deleteUser(\"".$item->getEMAIL()."\")' type=\"button\" class=\"btn btn-primary\">Xác nhận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                            }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->

</div>