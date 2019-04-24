$(document).on("click", ".buttonComment", function () {
    var rowID = $(this).data('row-id');
    $(".modal-body #rowID").val(rowID);
});

$(document).on("click", ".publishBtn", function () {
    $.ajax({
        type: "POST",
        url: "coordinatorhome.php",
        data: {
            name: 'publish',
            id: $('.publishBtn').val()
        }
    }).done(function (msg) {
//        alert("Data Saved: " + msg);
    });
    location.reload();
});

$(document).on("click", ".unpublishBtn", function () {
    $.ajax({
        type: "POST",
        url: "coordinatorhome.php",
        data: {
            name: 'unpublish',
            id: $('.unpublishBtn').val()
        }
    }).done(function (msg) {
//        alert("Data Saved: " + msg);
    });
    location.reload();

});

$(document).on("click", ".formSubmit", function () {
    $.ajax({
        type: "POST",
        url: "coordinatorhome.php",
        data: {
            comment: $('.comment').val(),
            id: $('#rowID').val()
        }
    }).done(function (msg) {
//        alert("Data Saved: " + msg);
    });
    location.reload();

});

