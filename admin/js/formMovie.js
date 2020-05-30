$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    $('#QuocGia').select2({
        placeholder: "Nhập quốc gia...",
        allowClear: true
    });
    $('#TheLoai').select2({
        placeholder: "Nhập thể loại...",
        allowClear: true
    });
    $('#DienVien').select2({
        placeholder: "Chọn hoặc thêm các diễn viên của phim...",
        allowClear: true
    });
    $('#DaoDien').select2({
        placeholder: "Chọn hoặc thêm các đạo diễn của phim...",
        allowClear: true
    });
    loadDienVien();
    loadDaoDien();
    loadTheLoai();
    loadQuocGia();


});

function loadDaoDien() {
    $('#DaoDien').empty();
    var id = $('#demo-form2').attr("data-id");
    $.post(
        '../Other/DaoDienAPI.php',
        {
            getDaoDien: true
        },
        function (data) {
            data = JSON.parse(data);
            if (id){
                $.post(
                    '../Other/DaoDienAPI.php',
                    {
                        getSelectedDaoDien: true,
                        idphim: id
                    },
                    function (data1) {
                        data1 = JSON.parse(data1);
                        for (item in data.daodien) {
                            for (item1 in data1.daodien){
                                if (data1.daodien[item1].id == data.daodien[item].id){
                                    data.daodien[item].selected = true;
                                    // $('#DaoDien').append('<option value=\"' + data.daodien[item].id + '\">' + data.daodien[item].hoten + '</option>');
                                }
                            }

                            // $('#DaoDien').append('<option value=\"' + data.daodien[item].id + '\">' + data.daodien[item].hoten + '</option>');
                        }
                        $("#DaoDien").select2({
                            data: data.daodien,
                            placeholder: 'Bấm để chọn'
                        })
                    }
                );
            }else {
                $("#DaoDien").select2({
                    data: data.daodien,
                    placeholder: 'Bấm để chọn'
                })
            }

        }
    );
}

function loadDienVien() {
    $('#DienVien').empty();
    var id = $('#demo-form2').attr("data-id");
    $.post(
        '../Other/DienVienAPI.php',
        {
            getDienVien: true
        },
        function (data) {
            data = JSON.parse(data);
            if (id){
                $.post(
                    '../Other/DienVienAPI.php',
                    {
                        getSelectedDienVien: true,
                        idphim: id
                    },
                    function (data1) {
                        data1 = JSON.parse(data1);
                        for (item in data.dienvien) {
                            for (item1 in data1.dienvien){
                                if (data1.dienvien[item1].id == data.dienvien[item].id){
                                    data.dienvien[item].selected = true;
                                }
                            }
                        }
                        $("#DienVien").select2({
                            data: data.dienvien,
                            placeholder: 'Bấm để chọn'
                        })
                    }
                );
            }else {
                $("#DienVien").select2({
                    data: data.dienvien,
                    placeholder: 'Bấm để chọn'
                })
            }

        }
    );
}

function loadTheLoai() {
    $('#TheLoai').empty();
    var id = $('#demo-form2').attr("data-id");
    $.post(
        '../Other/TheLoaiAPI.php',
        {
            getTheLoai: true
        },
        function (data) {
            data = JSON.parse(data);
            if (id){
                $.post(
                    '../Other/TheLoaiAPI.php',
                    {
                        getSelectedTheLoai: true,
                        idphim: id
                    },
                    function (data1) {
                        data1 = JSON.parse(data1);
                        for (item in data.theloai) {
                            for (item1 in data1.theloai){
                                if (data1.theloai[item1].id == data.theloai[item].id){
                                    data.theloai[item].selected = true;
                                }
                            }
                        }
                        $("#TheLoai").select2({
                            data: data.theloai,
                            placeholder: 'Bấm để chọn'
                        })
                    }
                );
            }else {
                $("#TheLoai").select2({
                    data: data.theloai,
                    placeholder: 'Bấm để chọn'
                })
            }
        }
    );
}

function loadQuocGia() {
    $('#QuocGia').empty();
    var id = $('#demo-form2').attr("data-id");
    $.post(
        '../Other/QuocGiaAPI.php',
        {
            getQuocGia: true
        },
        function (data) {
            data = JSON.parse(data);
            if (id){
                $.post(
                    '../Other/QuocGiaAPI.php',
                    {
                        getSelectedQuocGia: true,
                        idphim: id
                    },
                    function (data1) {
                        data1 = JSON.parse(data1);
                        for (item in data.quocgia) {
                            for (item1 in data1.quocgia){
                                if (data1.quocgia[item1].id == data.quocgia[item].id){
                                    data.quocgia[item].selected = true;
                                }
                            }
                        }
                        $("#QuocGia").select2({
                            data: data.quocgia,
                            placeholder: 'Bấm để chọn'
                        })
                    }
                );
            }else {
                $("#QuocGia").select2({
                    data: data.quocgia,
                    placeholder: 'Bấm để chọn'
                })
            }
        }
    );
}

$("#addDaoDien").submit(function (event) {
    event.preventDefault();
    var form = $('#addDaoDien').serialize();

    $.post(
        '../Other/DaoDienAPI.php',
        form,
        function (data) {
            loadDaoDien();
            $("#exampleModal").modal('hide');
        }
    );
    });

$("#addDienVien").submit(function (event) {
    event.preventDefault();
    var form = $('#addDienVien').serialize();

    $.post(
        '../Other/DienVienAPI.php',
        form,
        function (data) {
            loadDienVien();
            $("#dienVienModal").modal('hide');
            $('#addDienVien input').val("");
            $('#addDienVien textarea').val("");
        }
    );
});
