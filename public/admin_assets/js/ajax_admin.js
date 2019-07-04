// deletion

function deletion(id, table) {
    $.ajax({
        type: "delete",
        url: BASE_URL+"/"+table+"/"+id,
        data: {
            id : id,
            _token : TOKEN
        },
        success: function () {
            location.reload();
        },
        error: function (xhr) {
            $(".table-responsive").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        }
    });
}