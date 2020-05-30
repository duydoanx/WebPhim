$(document).ready(function () {
    ketquadanhgia = $("#ketquadanhgia").attr('data-star');
    calcRate(ketquadanhgia);
})
function calcRate(r) {
    const f = ~~r,//Tương tự Math.floor(r)
        id = 'star' + f + (r % f ? 'half' : '')
    id && (document.getElementById(id).checked = !0)
}

function sendRate(tag) {
    a = $(tag).val();
    id = $("#rating").attr('data-id');
    $.post("login.php",
        {
            checkLogin: true
        },
        function (data) {
            if (data == "true") {
                $.post(
                    '../Other/DanhGiaAPI.php',
                    {
                        danhgia: true,
                        idphim: id,
                        diem: a
                    }
                );
            }else alert("Vui lòng đăng nhập trước.");
        })
}

function getKetQuaDanhGia() {

}
