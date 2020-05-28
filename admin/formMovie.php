
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
                    action="index.php"
                    method="post"
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
                            name="tenphimvn"
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
                            name="tenphimgoc"
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
                          >Đạo diễn
                              <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select style="width: 90%" id="DaoDien" class="js-example-basic-multiple" name="states[]" multiple="multiple">

                                  <option value="AL">Alabama</option>

                              </select>
                              <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button" title="Thêm mới nếu chưa tồn tại." style="margin-bottom: 1px">+</button>

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
                                name="trangthai"
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
                                name="namphathanh"
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
                                name="thoiluong"
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
                                name="chatluong"
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
                                name="dophangiai"
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
                                name="ngonngu"
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
                                name="anhphim"
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
                        for="DuongDan"
                        >Đường Dẫn
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input
                                name="duongdan"
                          type="text"
                          id="DuongDan"
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
                                name="danhgia"
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
                                name="trailer"
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
                        <button type="submit" class="btn btn-success" name="add_mod">
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

    <!-- jQuery -->

    <!-- custom js -->
<script src="js/formMovie.js"></script>
