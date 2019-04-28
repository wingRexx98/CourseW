$(document).on("click", ".getRowID", function () {
    var rowID = $(this).data('row-id');
    $(".modal-body #rowID").val(rowID);
});

$(document).on("click", ".deleteBtn", function () {
    $.ajax({
        type: "POST",
        url: "studenthome.php",
        data: {
            id: $('#rowID').val()
        }
    }).done(function (msg) {
//                alert("Data Saved: " + msg);
    });
    location.href = location.href;
});

// $(document).on("click", ".zipDownload1", function () {
//     $.ajax({
//         type: "POST",
//         url: "testzip.php",
//         data: {
//             facultyid: '1'
//         }
//     }).done(function (msg) {
// //                alert("Data Saved: " + msg);
//     });
// window.open('testzip.php', '_blank');
// });

// $(document).on("click", ".zipDownload2", function () {
//     $.ajax({
//         type: "POST",
//         url: "testzip.php",
//         data: {
//             facultyid: '2'
//         }
//     }).done(function (msg) {
// //                alert("Data Saved: " + msg);
//     });
// window.open('testzip.php', '_blank');
// });

// $(document).on("click", ".zipDownload3", function () {
//     $.ajax({
//         type: "POST",
//         url: "testzip.php",
//         data: {
//             facultyid: '3'
//         }
//     }).done(function (msg) {
// //                alert("Data Saved: " + msg);
//     });
// window.open('testzip.php', '_blank');
// });


