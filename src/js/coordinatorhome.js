$(document).on("click", ".buttonComment", function () {
    var rowID = $(this).data('row-id');
    $(".modal-body #rowID").val(rowID);
});

$(document).ready(function() {
   $('.publishBtn').each(function() {
      $(this).click(function(){
          $.ajax({
        type: "POST",
        url: "coordinatorhome.php",
        data: {
            name: 'publish',
            id: $(this).attr('value')
        }
    }).done(function (msg) {
//        alert("Data Saved: " + msg);
    });
    location.reload(true);
    // location.href = location.href;
      });
   });
});

$(document).ready(function() {
   $('.unpublishBtn').each(function() {
      $(this).click(function(){
          $.ajax({
        type: "POST",
        url: "coordinatorhome.php",
        data: {
            name: 'unpublish',
            id: $(this).attr('value')
        }
    }).done(function (msg) {
//        alert("Data Saved: " + msg);
    });
    location.reload(true);
    // location.href = location.href;
      });
   });
});
   
// $(document).on("click", ".publishBtn", function () {
//     alert(this.val());
//     $.ajax({
//         type: "POST",
//         url: "coordinatorhome.php",
//         data: {
//             name: 'publish',
//             id: this.val()
//         }
//     }).done(function (msg) {
// //        alert("Data Saved: " + msg);
//     });
//     location.href = location.href;
// });

// $(document).on("click", ".unpublishBtn", function () {
//     alert(this.val());
//     $.ajax({
//         type: "POST",
//         url: "coordinatorhome.php",
//         data: {
//             name: 'unpublish',
//             id: this.val()
//         }
//     }).done(function (msg) {
// //        alert("Data Saved: " + msg);
//     });
// location.href = location.href;

// });

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
 location.href = location.href;

});

