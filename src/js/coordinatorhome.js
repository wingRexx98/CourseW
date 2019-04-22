$(document).on("click", ".buttonComment", function () {
    var rowID = $(this).data('row-id');
    $(".modal-body #rowID").val(rowID);
});