$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    loadDaoDien();
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
