$(document).ready(function () {
  /************ login form *************/
  $(document).on("click", "#loginSubmitBtn", function (e) {
    console.log(
      $("input[name=staffID]").val(),
      $("input[name=staffPassword]").val()
    );
    if (
      !$("input[name=staffID]").val() ||
      !$("input[name=staffPassword]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#loginForm").submit(); // Submit the form in js
    }
  });

  /************ register form *************/
  $(document).on("click", "#registerSubmitBtn", function (e) {
    e.preventDefault();
    console.log(
      $("input[name=sFName]").val(),
      $("input[name=sLName]").val(),
      $("input[name=sNo]").val(),
      $("select[name=sTitle]").val(),
      $("input[name=password]").val()
    );
    if (
      !$("input[name=sFName]").val() ||
      !$("input[name=sLName]").val() ||
      !$("input[name=sNo]").val() ||
      !$("select[name=sTitle]").val() ||
      !$("input[name=password]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#registerForm").submit(); // Submit the form in js
    }
  });

  /************ add new patient *************/
  $(document).on("click", ".addToWaitingListBtn", function (e) {
    e.preventDefault();
    console.log(
      $("input[name=pFullName]").val(),
      $("input[name=pAge]").val(),
      $("select[name=pSex]").val(),
      $("select[name=pType]").val(),
      $("input[name=pReg]").val()
    );
    if (
      !$("input[name=pFullName]").val() ||
      !$("input[name=pAge]").val() ||
      !$("select[name=pSex]").val() ||
      !$("select[name=pType]").val() ||
      !$("input[name=pReg]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      let pFullName = $("input[name=pFullName]").val();
      let pAge = $("input[name=pAge]").val();
      let pSex = $("select[name=pSex]").val();
      let pType = $("select[name=pType]").val();
      let pReg = $("input[name=pReg]").val();

      $.ajax({
        url: "db/addNewPatient.php",
        type: "POST",
        data: {
          pFullName: pFullName,
          pAge: pAge,
          pSex: pSex,
          pType: pType,
          pReg: pReg,
          data: "jdslk",
        },
        success: function (result) {
          if (result === "success") {
            displayAlertMsg("Patient Added to Waiting List", true);
            $("#addToListBtnForm"). trigger("reset");
          } else if (result === "fail") {
            displayAlertMsg(
              "Patient with ref no: " + pReg + " already exists",
              false
            );
          } else {
            displayAlertMsg("Error occurred while saving data", false);
          }
        },
        error: function (error) {
          displayAlertMsg("Error occurred while saving data", false);
        },
      });
      // return $("#addToListBtnForm").submit();
    }
  });

  /**************** displayAlertMsg ****************/
  function displayAlertMsg(msg, type) {
    $(".toast-body").text(msg);
    if (type === true) {
      $(".toast-body").css("color", "green");
    } else {
      $(".toast-body").css("color", "red");
    }
    $(".toast").toast("show");
  } //end alertMsg()
});
