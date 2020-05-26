$(document).ready(function () {
    loadCmt();
});
function loadCmt(id){
    id = $(".cmt").attr("data-id");
    $.post(
        "Other/commentAPI.php",
        {
            getcomment: true,
            id: id
        },
        function (data) {
            result = JSON.parse(data);
            $(".cmt").empty();
            for (item in result.data){
                $(".cmt").append("<div class=\"card w-100 rounded rounded-lg mb-3\">\n" +
                    "                <div class=\"card-header\">" + result.data[item].username + "</div>\n" +
                    "                <div class=\"card-body\">\n" +
                    "                    <p class=\"card-text\">" + result.data[item].noidung + "</p>\n" +
                    "                </div>\n" +
                    "            </div>");
            }
        }
    )
}

$("#my_form").submit(function(event){
    event.preventDefault(); //prevent default action
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    var login = $.post("login.php",
        {
            checkLogin: true
        },
        function (data) {
            if (data == "true") {
                $.post(post_url,
                    form_data,
                    function (data) {
                        var comment = $("#text-comment").val();
                        if (comment != "") {
                            id = $(".cmt").attr("data-id");
                            loadCmt()
                            $("#text-comment").val("");
                        }
                    }
                );
        }else alert("Vui lòng đăng nhập trước.");
    })

});