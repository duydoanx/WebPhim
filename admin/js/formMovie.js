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
    loadDaoDien();
    loadDienVien();
    loadTheLoai();
    loadQuocGia();
});

function loadDaoDien() {
    $('#DaoDien').empty();
    $.post(
        '../Other/DaoDienAPI.php',
        {
            getDaoDien: true
        },
        function (data) {
            data = JSON.parse(data);
            for (item in data.daodien)
            $('#DaoDien').append('<option value=\"'+data.daodien[item].id+'\">'+data.daodien[item].hoten+'</option>');
        }
    );
}

function loadDienVien() {
    $('#DienVien').empty();
    $.post(
        '../Other/DienVienAPI.php',
        {
            getDienVien: true
        },
        function (data) {
            data = JSON.parse(data);
            for (item in data.dienvien)
                $('#DienVien').append('<option value=\"'+data.dienvien[item].id+'\">'+data.dienvien[item].hoten+'</option>');
        }
    );
}

function loadTheLoai() {
    $('#TheLoai').empty();
    $.post(
        '../Other/TheLoaiAPI.php',
        {
            getTheLoai: true
        },
        function (data) {
            data = JSON.parse(data);
            for (item in data.theloai)
                $('#TheLoai').append('<option value=\"'+data.theloai[item].id+'\">'+data.theloai[item].tentheloai+'</option>');
        }
    );
}

function loadQuocGia() {
    $('#QuocGia').empty();
    $.post(
        '../Other/QuocGiaAPI.php',
        {
            getQuocGia: true
        },
        function (data) {
            data = JSON.parse(data);
            for (item in data.quocgia)
                $('#QuocGia').append('<option value=\"'+data.quocgia[item].id+'\">'+data.quocgia[item].ten+'</option>');
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
