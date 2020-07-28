//-----------------------------------------------Toast Msg
function displayAlertMsg(msg, type) {
  $(".toast-body").html(msg);
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
  $(".modal-footer").html(
    '<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>'
  );
} //end loadUsers()

function loadUsersSubModel(refNo, type) {
  $(".modal-title-sub").html("");
  $(".modal-title-sub").text("");
  $(".modal-body-sub").html("");
  $(".modal-body-sub").text("");

  let body =
    '<div class="form-group col-md-12">' +
    '<label class="text-dark text-bold">Select Type</label>' +
    '<select class="form-control selectTypeSub">' +
    '<option value="" selected>- Select -</option>' +
    '<option value="Normal">Normal</option>' +
    '<option value="Emergency">Emergency</option>' +
    "</select>" +
    "</div><br>" +
    '<div class="form-group col-md-12">' +
    '<label class="text-dark text-bold">Next Destination</label>' +
    '<select class="form-control selectDestinationSub">' +
    '<option value="" selected>- Select -</option>' +
    '<option value="Nurse">Nurse</option>' +
    '<option value="Doctor">Doctor</option>' +
    '<option value="Lab Technician">Lab Technician</option>' +
    '<option value="Pharmacist">Pharmacist</option>' +
    "</select>" +
    "</div>";

  $(".modal-title-sub").text("Select Options");
  $(".modal-body-sub").html(body);
  $(".modal-footer-sub").html(
    '<button type="button" onclick="finalAddUserSub(' +
      refNo +
      ", '" +
      type +
      '\')" class="btn btn-success AddToListSub float-right m-2" data-dismiss="modal">Add</button>'
  );
} //end loadUsersSubModel()

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
  let refNo = $(this).val();
  loadUsersSubModel(refNo, "addTOListP");
  $("#myModalSub").modal("show");
});

//Add users to waiting list after small model selection
function finalAddUserSub(refNo, type) {
  let selectDestinationSub = $(".selectDestinationSub").val();
  let selectTypeSub = $(".selectTypeSub").val();

  if (selectTypeSub && selectDestinationSub) {
    $.ajax({
      url: "db/addRemoveDelete.php",
      type: "POST",
      data: {
        refNo: refNo,
        type: type,
        rType: selectTypeSub,
        destination: selectDestinationSub,
      },
      success: function (result) {
        console.log(result);
        if (type === "addTOListP") {
          if (result === "success") {
            $(this).remove();
            $(".addRemovePcell" + refNo).html(
              '<button value="' +
                refNo +
                '" class="m-0 bg-transparent border-0 text-dark underline removeFromListP" title="Remove patient from queue">Remove</button>'
            );
            displayAlertMsg("Patient added to queue", true);
          } else {
            displayAlertMsg("Failed to add. Reload page & try again", false);
          }
        } else if (type === "addTOListS") {
          if (result === "success") {
            $(this).remove();
            $(".addRemoveScell" + refNo).html(
              '<button value="' +
                refNo +
                '" class="m-0 bg-transparent border-0 text-dark underline removeFromListS" title="Remove staff member from queue">Remove</button>'
            );
            displayAlertMsg("Staff member added to queue", true);
          } else {
            displayAlertMsg("Failed to add. Reload page & try again", false);
          }
        }
      },
      error: function (error) {
        displayAlertMsg("Error occurred while loading data", false);
      },
    });
  } else {
    alert("Please select options before adding");
  }
} //end finalAddUserSub()

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
        displayAlertMsg("Failed to remove. Reload page & try again", false);
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
  loadUsersSubModel(refNo, "addTOListS");
  $("#myModalSub").modal("show");
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
        displayAlertMsg("Failed to remove. Reload page & try again", false);
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
        displayAlertMsg("Failed to remove. Reload page & try again", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

//-----------------------------------------------loadPatientsList
$(document).ready(function () {
  loadPatientsList();
  window.setInterval(function () {
    loadPatientsList();
  }, 3000);
});

function loadPatientsList() {
  $.ajax({
    url: "db/loadPatientsList.php",
    type: "POST",
    data: { data: "jdslk" },
    success: function (result) {
      console.log("result", result);
      $("#loadPatientsList").html(result);
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
} //end loadUsers()

//-----------------------------------------------Call Patient Into Office
$(document).on("click", ".callNextPatientBtn", function () {
  let id = $("#hiddenFirstPatientIdInput").val();
  $.ajax({
    url: "db/callNextPatient.php",
    type: "POST",
    data: { data: id },
    success: function (result) {
      console.log(result);
      if (result !== "error" && result !== "occupied" && result.includes("go to")) {
        audio(result);
        $(".firstCallClass").remove();
        $(".audioBtn").hide();
        displayAlertMsg("Patient Called", true);
        setTimeout(function () {
          window.location.href = "../index.php";
        }, 3000);
      } else if (result === "occupied") {
        displayAlertMsg("Your office is occupied. Go back to your office & finish attending to your patient", false);
      } else {
        displayAlertMsg("Failed to call. Queue might be empty. Try again later", false);
      }
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

$(document).on("click", ".audioBtn", function () {
  let text = $(this).val();
  audio(text);
});

function audio(text) {
  var msg = new SpeechSynthesisUtterance(text);
  window.speechSynthesis.speak(msg);
}
