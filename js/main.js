// $(document).ready(function() {
//   displayData();
// })


// function displayData() {
//   var displayData = "true";
//   $.ajax({
//       url: "db/index.php",
//       type: 'post',
//       data: {
//           displaySend: displayData
//       },
//       success: function(data, status) {
      
//           $('#displayDataTable').html(data);
//       }
//   })
// }

$("#btn-delete").click(function () {
    const checked = $("input[type=radio]:checked");
    request = $.ajax({
      url: "crud/delete.php",
      type: "post",
      data: { id: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        checked.closest("tr").remove();
        console.log("The film is deleted");
        location.reload(true);
        alert("The film is deleted");
        //$('#izmeniForm').reset;
      } else {
        console.log("The film is not deleted " + response);
        alert("The film is not deleted");
      }
    });
  });

 