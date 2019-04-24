$(document).on("click", ".getRowID", function () {
    var rowID = $(this).data('row-id');
    $(".modal-body #rowID").val(rowID);
});