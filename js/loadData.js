//-----------------------------------------------Toast Msg
function displayAlertMsg(msg, type) {
  $(".toast-body").text(msg);
  if (type === true) {
    $(".toast-body").css("color", "green");
  } else {
    $(".toast-body").css("color", "red");
  }
  $(".toast").toast("show");
} //end displayAlertMsg()

//-----------------------------------------------Load users
$("#loadUsers").click(function () {
  $.ajax({
    url: "db/loadUsers.php",
    type: "POST",
    data: { data: "jdslk" },
    success: function (result) {
      loadUsers(result, "Current Staff");
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

function loadUsers(body, header) {
  $(".modal-title").html("");
  $(".modal-title").text("");
  $(".modal-body").html("");
  $(".modal-body").text("");

  $(".modal-title").text(header);
  $(".modal-body").html(body);
} //end loadUsers()

//-----------------------------------------------Delete users
$(document).on("click", ".deleteStaffBtn", function () {
  let sId = $(this).val();
  console.log("delete id", sId);
  $.ajax({
    url: "db/deleteStaff.php",
    type: "POST",
    data: { data: sId },
    success: function (result) {
      if (result === "success") {
        $(".deleteRow" + sId).remove();
      } else {
        displayAlertMsg(
          "Record could not be deleted. Reload page & try again",
          false
        );
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Auto load sNo
$(".autoSNo").focusout(function () {
  let autoSNo = $(this).val();
  $.ajax({
    url: "db/autoSNo.php",
    type: "POST",
    data: { data: autoSNo },
    success: function (result) {
      if (result === "success") {
        console.log("success", autoSNo);
        displayAlertMsg("Staff No. is available for use", true);
      } else {
        if (autoSNo != "") {
          $(".autoSNo").val(null);
          displayAlertMsg(
            "Staff No:(" +
              autoSNo +
              ") already in use, Please provide a different Staff No.",
            false
          );
        }
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Search patient
$("body").on("keyup", "#searchField", function (e) {
  var value = $(this).val().toLowerCase();
  $("#searchTable tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

//-----------------------------------------------Load search content
$("#loadSearchPatients").click(function () {
  $.ajax({
    url: "db/loadSearchPatients.php",
    type: "POST",
    data: { data: "jdslk" },
    success: function (result) {
      loadUsers(result, "Search For Staff and Patients");
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Add Patient to list
$(document).on("click", ".addTOListP", function () {
  let html =
    '<div class="form-select col-md-12 mb-4">' +
    '<select class="bg-transparent border rounded form-control" name="admitType" style="line-height: 30px;" required>' +
    '<option value="" selected>- Select Admission Type -</option>' +
    '<option value="Normal">Normal</option>' +
    '<option value="Emergency">Emergency</option>' +
    "</select>" +
    "</div>";

   html +=
    '<div class="form-select col-md-12 mb-4">' +
    '<select class="bg-transparent border rounded form-control" name="admitType" style="line-height: 30px;" required>' +
    '<option value="" selected>- Select Admission Type -</option>' +
    '<option value="Normal">Normal</option>' +
    '<option value="Emergency">Emergency</option>' +
    "</select>" +
    "</div>";

  loadUsers(html, "Patient Options");
  $("#myModal").modal();

  if (false) {
    let refNo = $(this).val();
    $.ajax({
      url: "db/addRemoveDelete.php",
      type: "POST",
      data: {
        refNo: refNo,
        type: "addTOListP",
        rType: "Normal",
        destination: "Nurse",
      },
      success: function (result) {
        console.log(result);
        if (result === "success") {
          $(this).remove();
          $(".addRemovePcell" + refNo).html(
            '<button value="' +
              refNo +
              '" class="m-0 bg-transparent border-0 text-dark underline removeFromListP" title="Remove patient from queue">Remove</button>'
          );
          displayAlertMsg("Patient added to queue", true);
        } else {
          displayAlertMsg("Failed to add. Try again", false);
        }
      },
      error: function (error) {
        displayAlertMsg("Error occurred while loading data", false);
      },
    });
  }
});

//-----------------------------------------------Remove patient from list
$(document).on("click", ".removeFromListP", function () {
  let refNo = $(this).val();
  $.ajax({
    url: "db/addRemoveDelete.php",
    type: "POST",
    data: {
      refNo: refNo,
      type: "removeFromListP",
      rType: "0",
      destination: "0",
    },
    success: function (result) {
      console.log(result);
      if (result === "success") {
        $(this).remove();
        $(".addRemovePcell" + refNo).html(
          '<button value="' +
            refNo +
            '" class="m-0 bg-transparent border-0 text-primary underline addTOListP" title="Add patient to queue">Add</button>'
        );
        displayAlertMsg("Patient removed from queue", false);
      } else {
        displayAlertMsg("Failed to remove. Try again", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Add Staff to list
$(document).on("click", ".addTOListS", function () {
  let refNo = $(this).val();
  $.ajax({
    url: "db/addRemoveDelete.php",
    type: "POST",
    data: {
      refNo: refNo,
      type: "addTOListS",
      rType: "Normal",
      destination: "Nurse",
    },
    success: function (result) {
      console.log(result);
      if (result === "success") {
        $(this).remove();
        $(".addRemoveScell" + refNo).html(
          '<button value="' +
            refNo +
            '" class="m-0 bg-transparent border-0 text-dark underline removeFromListS" title="Remove staff member from queue">Remove</button>'
        );
        displayAlertMsg("Staff member added to queue", true);
      } else {
        displayAlertMsg("Failed to add. Try again", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Remove Staff from list
$(document).on("click", ".removeFromListS", function () {
  let refNo = $(this).val();
  $.ajax({
    url: "db/addRemoveDelete.php",
    type: "POST",
    data: {
      refNo: refNo,
      type: "removeFromListS",
      rType: "0",
      destination: "0",
    },
    success: function (result) {
      console.log(result);
      if (result === "success") {
        $(this).remove();
        $(".addRemoveScell" + refNo).html(
          '<button value="' +
            refNo +
            '" class="m-0 bg-transparent border-0 text-primary underline addTOListS" title="Add staff member to queue">Add</button>'
        );
        displayAlertMsg("Staff member removed from queue", false);
      } else {
        displayAlertMsg("Failed to remove. Try again", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------Delete patient record
$(document).on("click", ".deletePatient", function () {
  let refNo = $(this).val();
  $.ajax({
    url: "db/addRemoveDelete.php",
    type: "POST",
    data: { refNo: refNo, type: "deletePatient", rType: "0", destination: "0" },
    success: function (result) {
      console.log(result);
      if (result === "success") {
        $(this).remove();
        $(".deleteListRow" + refNo).remove();
        displayAlertMsg("Patient records deleted", true);
      } else {
        displayAlertMsg("Failed to remove. Try again", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});
