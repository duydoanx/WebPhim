<?php
    require_once __DIR__."/../Controller/ControllerPhim.php";
    require_once __DIR__."/../Controller/ControllerNguoi.php";
    require_once __DIR__."/../Controller/ControllerTheLoai.php";
    require_once __DIR__."/../Controller/ControllerQuocGia.php";

    $tenphimvn = "";
    $tenphimgoc = "";
    $trangthai = "";
    $namphathanh = "";
    $thoiluong = "";
    $chatluong = "";
    $dophangiai = "";
    $ngonngu = "";
    $duongdan = "";
    $noidungphim = "";
    $trailer = "";

    $tenphimvn_error = false;
    $tenphimgoc_error = false;
    $trangthai_error = false;
    $namphathanh_error = false;
    $thoiluong_error = false;
    $chatluong_error = false;
    $dophangiai_error = false;
    $ngonngu_error = false;
    $duongdan_error = false;
    $noidungphim_error = false;
    $trailer_error = false;

    if (isset($_REQUEST['editPhim']) && isset($_REQUEST['idphim'])){
        $controllerPhim = new ControllerPhim();
        $phim = $controllerPhim->getPhim($_REQUEST['idphim']);
        $tenphimvn = $phim->getTENPHIMVN();
        $tenphimgoc = $phim->getTENPHIMGOC();
        $trangthai = $phim->getTRANGTHAI();
        $namphathanh = $phim->getNAMPHATHANH();
        $thoiluong = $phim->getTHOILUONG();
        $chatluong = $phim->getCHATLUONG();
        $dophangiai = $phim->getDOPHANGIAI();
        $ngonngu = $phim->getNGONNGU();
        $duongdan = $phim->getDUONGDAN();
        $noidungphim = $phim->getNOIDUNGPHIM();
        $trailer = $phim->getTRAILER();
    }

    if (isset($_REQUEST['addPhim'])){
        if (!isset($_REQUEST['idphim'])) {
            $tenphimvn = $_REQUEST['tenphimvn'];
            $tenphimgoc = $_REQUEST['tenphimgoc'];
            $daodien = $_REQUEST['daodien'];
            $dienvien = $_REQUEST['dienvien'];
            $theloai = $_REQUEST['theloai'];
            $quocgia = $_REQUEST['quocgia'];
            $trangthai = $_REQUEST['trangthai'];
            $namphathanh = $_REQUEST['namphathanh'];
            $thoiluong = $_REQUEST['thoiluong'];
            $chatluong = $_REQUEST['chatluong'];
            $dophangiai = $_REQUEST['dophangiai'];
            $ngonngu = $_REQUEST['ngonngu'];
            $duongdan = $_REQUEST['duongdan'];
            $noidungphim = $_REQUEST['noidungphim'];
            $trailer = null;
            if (isset($_REQUEST['trailer'])) {
                $trailer = $_REQUEST['trailer'];
            }
            $controllerPhim = new ControllerPhim();
            $controllerNguoi = new ControllerNguoi();
            $controllerTheLoai = new ControllerTheLoai();
            $controllerQuocGia = new ControllerQuocGia();
            $id = $controllerPhim->addPhim($tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer);
            foreach ($daodien as $item) {
                $controllerNguoi->addDaoDien2Phim($item, $id);
            }
            foreach ($dienvien as $item) {
                $controllerNguoi->addDienVien2Phim($item, $id);
            }
            foreach ($theloai as $item) {
                $controllerTheLoai->addTheLoai2Phim($id, $item);
            }
            foreach ($quocgia as $item) {
                $controllerQuocGia->addQuocGia2Phim($id, $item);
            }

            if (isset($_FILES['anhphim']) && $_FILES["anhphim"]["error"] == 0) {
                $target_dir = "../img/PosterPhim/";
                $name = $_FILES["anhphim"]["name"];
                $array = explode(".", $name);
                $ext = end($array);
                $target_file = $target_dir . $id . "." . $ext;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["anhphim"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "<h5 class='text-danger'>File is not an image.</h5>";
                    $uploadOk = 0;
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "<h5 class='text-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h5>";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["anhphim"]["tmp_name"], $target_file)) {
                        $controllerPhim->addAnhPhim($id, "img/PosterPhim/" . $id . '.' . $ext);
                    } else {
                        echo "<h5 class='text-danger'>Sorry, there was an error uploading your file.</h5>";
                    }
                }
            }
        }else{
            if (isset($_REQUEST['tenphimvn'])) {
                $tenphimvn = $_REQUEST['tenphimvn'];
            }else {
                $tenphimvn_error = true;
                $tenphimvn = "";
            }

            if (isset($_REQUEST['tenphimgoc'])) {
                $tenphimgoc = $_REQUEST['tenphimgoc'];
            }else {
                $tenphimgoc_error = true;
                $tenphimgoc = "";
            }

            if (isset($_REQUEST['daodien'])) {
                $daodien = $_REQUEST['daodien'];
            }else {
                $daodien_error = true;
                $daodien = array();
            }

            if (isset($_REQUEST['dienvien'])) {
                $dienvien = $_REQUEST['dienvien'];
            }else {
                $dienvien_error = true;
                $dienvien = array();
            }

            if (isset($_REQUEST['theloai'])) {
                $theloai = $_REQUEST['theloai'];
            }else {
                $theloai_error = true;
                $theloai = array();
            }

            if (isset($_REQUEST['quocgia'])) {
                $quocgia = $_REQUEST['quocgia'];
            }else {
                $quocgia_error = true;
                $quocgia = array();
            }

            if (isset($_REQUEST['trangthai'])) {
                $trangthai = $_REQUEST['trangthai'];
            }else {
                $trangthai_error = true;
                $trangthai = "";
            }

            if (isset($_REQUEST['namphathanh'])) {
                $namphathanh = $_REQUEST['namphathanh'];
            }else {
                $namphathanh_error = true;
                $namphathanh = "";
            }

            if (isset($_REQUEST['thoiluong'])) {
                $thoiluong = $_REQUEST['thoiluong'];
            }else {
                $thoiluong_error = true;
                $thoiluong = "";
            }

            if (isset($_REQUEST['chatluong'])) {
                $chatluong = $_REQUEST['chatluong'];
            }else {
                $chatluong_error = true;
                $chatluong = "";
            }

            if (isset($_REQUEST['dophangiai'])) {
                $dophangiai = $_REQUEST['dophangiai'];
            }else {
                $dophangiai_error = true;
                $dophangiai = "";
            }

            if (isset($_REQUEST['ngonngu'])) {
                $ngonngu = $_REQUEST['ngonngu'];
            }else {
                $ngonngu_error = true;
                $ngonngu = "";
            }

            if (isset($_REQUEST['ngonngu'])) {
                $duongdan = $_REQUEST['duongdan'];
            }else {
                $duongdan_error = true;
                $duongdan = "";
            }

            if (isset($_REQUEST['noidungphim'])) {
                $noidungphim = $_REQUEST['noidungphim'];
            }else {
                $noidungphim_error = true;
                $noidungphim = "";
            }

            if (isset($_REQUEST['trailer'])) {
                $trailer = $_REQUEST['trailer'];
            }else {
                $trailer_error = true;
                $trailer = "";
            }

            $controllerPhim = new ControllerPhim();
            $controllerNguoi = new ControllerNguoi();
            $controllerTheLoai = new ControllerTheLoai();
            $controllerQuocGia = new ControllerQuocGia();

            $id = $_REQUEST['idphim'];

            $controllerPhim->updatePhim($id, $tenphimvn, $tenphimgoc, $trangthai, $namphathanh, $thoiluong, $chatluong,
                $dophangiai, $ngonngu, $noidungphim, $duongdan, $trailer);

            $controllerNguoi->deleteDaoDienFromPhim($id);
            $controllerNguoi->deleteDienVienFromPhim($id);
            $controllerTheLoai->deleteTheLoaiFromPhim($id);
            $controllerQuocGia->deleteQuocGiaFromPhim($id);

            foreach ($daodien as $item) {

                $controllerNguoi->addDaoDien2Phim($item, $id);
            }
            foreach ($dienvien as $item) {

                $controllerNguoi->addDienVien2Phim($item, $id);
            }
            foreach ($theloai as $item) {

                $controllerTheLoai->addTheLoai2Phim($id, $item);
            }
            foreach ($quocgia as $item) {

                $controllerQuocGia->addQuocGia2Phim($id, $item);
            }

            if (isset($_FILES['anhphim']) && $_FILES["anhphim"]["error"] == 0){
                $target_dir = "../img/PosterPhim/";
                $name = $_FILES["anhphim"]["name"];
                $array = explode(".", $name);
                $ext = end($array);
                $target_file = $target_dir . $id . "." . $ext;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $check = getimagesize($_FILES["anhphim"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "<h5 class='text-danger'>File is not an image.</h5>";
                    $uploadOk = 0;
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "<h5 class='text-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h5>";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["anhphim"]["tmp_name"], $target_file)) {
                        $controllerPhim->addAnhPhim($id, "img/PosterPhim/" . $id . '.' . $ext);
                    } else {
                        echo "<h5 class='text-danger'>Sorry, there was an error uploading your file.</h5>";
                    }
                }
            }
        }
    }
?>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                    <?php
                    if (isset($_REQUEST['idphim'])){
                        echo '<h2>Chỉnh sửa</h2>';
                    }else echo "<h2>Thêm mới</h2>";
                    ?>

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

                  <form
                    action="index.php"
                    method="post"
                    id="demo-form2"
                    <?php
                    if (isset($_REQUEST['idphim']))
                        echo "data-id=\"".$_REQUEST['idphim']."\"";
                    ?>
                    enctype="multipart/form-data"

                    class="form-horizontal form-label-left"
                  >
                      <input hidden name="page" value="moviemod">
                      <?php
                      if (isset($_REQUEST['idphim'])){
                          echo "<input hidden name=\"idphim\" value=\"".$_REQUEST['idphim']."\">";
                      }
                      ?>
                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="TenPhimVN"
                        >Tên Phim VN
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                                <?php
                                echo "value='$tenphimvn'"
                                ?>
                            name="tenphimvn"
                            placeholder="Nhập tên tiếng Việt của phim..."
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
                            <?php
                            echo "value='$tenphimgoc'"
                            ?>
                            name="tenphimgoc"
                            placeholder="Nhập tên gốc của phim..."
                          type="text"
                          id="TenPhimGoc"
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>
                      <div class="form-group">
                          <label
                                  class="control-label col-md-3 col-sm-3 col-xs-12"
                                  for="DaoDien"
                          >Đạo Diễn
                              <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select style="width: 90%" id="DaoDien" class="js-example-basic-multiple" name="daodien[]" multiple="multiple">

                                  <option value="AL">Alabama</option>

                              </select>
                              <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button" title="Thêm mới nếu chưa tồn tại." style="margin-bottom: 1px">+</button>

                          </div>


                      </div>
                      <div class="form-group">
                          <label
                                  class="control-label col-md-3 col-sm-3 col-xs-12"
                                  for="DienVien"
                          >Diễn Viên
                              <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select style="width: 90%" id="DienVien" class="js-example-basic-multiple" name="dienvien[]" multiple="multiple">

                                  <option value="AL">Alabama</option>

                              </select>
                              <button class="btn btn-success" data-toggle="modal" data-target="#dienVienModal" type="button" title="Thêm mới nếu chưa tồn tại." style="margin-bottom: 1px">+</button>

                          </div>


                      </div>

                      <div class="form-group">
                          <label
                                  class="control-label col-md-3 col-sm-3 col-xs-12"
                                  for="TheLoai"
                          >Thể Loại
                              <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select style="width: 100%" id="TheLoai" class="js-example-basic-multiple" name="theloai[]" multiple="multiple">

                                  <option value="AL">Alabama</option>

                              </select>
                          </div>

                      </div>

                      <div class="form-group">
                          <label
                                  class="control-label col-md-3 col-sm-3 col-xs-12"
                                  for="QuocGia"
                          >Quốc Gia
                              <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select style="width: 100%" id="QuocGia" class="js-example-basic-multiple" name="quocgia[]" multiple="multiple">

                                  <option value="AL">Alabama</option>

                              </select>
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
                            <?php
                            echo "value='$trangthai'"
                            ?>
                                name="trangthai"
                                placeholder="Nhập trạng thái. VD: Hoàn tất, Chưa hoàn tất, 12/24 tập..."
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
                            <?php
                            echo "value='$namphathanh'"
                            ?>
                                name="namphathanh"
                          type="date"
                                placeholder="Nhập ngày phát hành..."
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
                            <?php
                            echo "value='$thoiluong'"
                            ?>
                            name="thoiluong"
                          type="number"
                          id="ThoiLuong"
                            placeholder="Thời lượng phim..."
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
                            <?php
                            echo "value='$chatluong'"
                            ?>
                                name="chatluong"
                          type="text"
                          id="ChatLuong"
                                placeholder="Nhập chất lượng phim. VD: bản đẹp, bản CAM..."
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
                            <?php
                            echo "value='$dophangiai'"
                            ?>
                                name="dophangiai"
                                placeholder="Nhập độ phân giải. VD: HD, FullHD..."
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
                            <?php
                            echo "value='$ngonngu'"
                            ?>
                                name="ngonngu"
                          type="text"
                          id="NgonNgu"
                                placeholder="Nhập ngôn ngữ phim hỗ trợ. VD: Thuyết minh + VietSub..."
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
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                            name="anhphim"
                          type="file"
                          id="AnhPhim"
                            title="Bấm để up ảnh phim."
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                    <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="DuongDan"
                        >Đường Dẫn
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                            <?php
                            echo "value='$duongdan'"
                            ?>
                                name="duongdan"
                          type="text"
                          id="DuongDan"
                          placeholder="Nhập tên file lưu trên máy chủ..."
                          required="required"
                          class="form-control col-md-7 col-xs-12"
                        />
                      </div>
                    </div>

                      <div class="form-group">
                      <label
                        class="control-label col-md-3 col-sm-3 col-xs-12"
                        for="DuongDan"
                        >Nội dung phim
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea
                                name="noidungphim"
                          type="text"
                          id="DuongDan"
                          placeholder="Nhập tên nội dung tóm tắt phim..."
                          required="required"
                                class="form-control col-md-7 col-xs-12"><?php
                            echo $noidungphim;
                            ?></textarea>
                      </div>
                    </div>

                      <div class="form-group">
                          <label
                                  class="control-label col-md-3 col-sm-3 col-xs-12"
                                  for="Trailer"
                          >Trailer
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input
                                  <?php
                                  echo "value='$trailer'"
                                  ?>
                                      name="trailer"
                                      type="text"
                                      id="Trailer"
                                      placeholder="Nhập ID video trailer trên YouTube..."
                                      class="form-control col-md-7 col-xs-12"
                              />
                          </div>
                      </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a class="btn btn-danger" type="button" href="index.php?page=movie">
                          Quay về
                        </a>
                        <button type="submit" class="btn btn-success" name="addPhim">
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
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm đạo diễn</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="addDaoDien">
                              <input hidden name="adddaodien" value="true">
                              <div class="form-group">
                                  <label for="hoten" class="col-form-label">Họ tên:</label>
                                  <input required type="text" name="hoten" class="form-control" id="hoten">
                              </div>
                              <div class="form-group">
                                  <label for="ngaysinh" class="col-form-label">Ngày sinh:</label>
                                  <input required class="form-control" name="ngaysinh" id="ngaysinh" type="date">
                              </div>
                              <div class="form-group">
                                  <label for="quoctich" class="col-form-label">Quốc tịch:</label>
                                  <input required type="text" name="quoctich" class="form-control" id="quoctich">
                              </div>
                              <div class="form-group">
                                  <label for="tieusu" class="col-form-label">Tiểu sử:</label>
                                  <textarea required class="form-control" name="tieusu" id="tieusu"></textarea>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          <button type="submit" form="addDaoDien" class="btn btn-success">Lưu</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="dienVienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Thêm diễn viên</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="addDienVien">
                              <input hidden name="adddienvien" value="true">
                              <div class="form-group">
                                  <label for="hoten" class="col-form-label">Họ tên:</label>
                                  <input required type="text" name="hoten" class="form-control" id="hoten">
                              </div>
                              <div class="form-group">
                                  <label for="ngaysinh" class="col-form-label">Ngày sinh:</label>
                                  <input required class="form-control" name="ngaysinh" id="ngaysinh" type="date">
                              </div>
                              <div class="form-group">
                                  <label for="quoctich" class="col-form-label">Quốc tịch:</label>
                                  <input required type="text" name="quoctich" class="form-control" id="quoctich">
                              </div>
                              <div class="form-group">
                                  <label for="tieusu" class="col-form-label">Tiểu sử:</label>
                                  <textarea required class="form-control" name="tieusu" id="tieusu"></textarea>
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          <button type="submit" form="addDienVien" name="addPhim" class="btn btn-success">Lưu</button>
                      </div>
                  </div>
              </div>
          </div>

    <!-- jQuery -->

    <!-- custom js -->
<script src="js/formMovie.js"></script>
