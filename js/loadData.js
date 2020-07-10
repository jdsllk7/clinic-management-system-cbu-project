//-----------------------------------------------Toast Msg
function displayAlertMsg(msg, type) {
  $(".toast-body").text(msg);
  if (type === true) {
    $(".toast-body").css("color", "green");
  } else {
    $(".toast-body").css("color", "red");
  }
  $(".toast").toast("show");
} //end alertMsg()

//-----------------------------------------------Load users
$("#loadUsers").click(function () {
  $.ajax({
    url: "db/loadUsers.php",
    type: "POST",
    data: { data: "jdslk" },
    success: function (result) {
      loadUsers(result);
    },
    error: function (error) {
      displayAlertMsg("Error occurred while loading data", false);
    },
  });
});

function loadUsers(result) {
  $(".modal-title").html("");
  $(".modal-body").html("");

  $(".modal-title").text("Current Staff");
  $(".modal-body").html(result);
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
        displayAlertMsg(
          "Staff No. is available for use",
          true
        );
      } else {
        if (autoSNo != "") {
          $(".autoSNo").val(null);
          displayAlertMsg(
            "Staff No:("+autoSNo+") already in use, Please provide a different Staff No.",
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
