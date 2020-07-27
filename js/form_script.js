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
      $("input[name=sAge]").val(),
      $("select[name=sSex]").val(),
      $("input[name=sFName]").val(),
      $("input[name=sLName]").val(),
      $("input[name=sNo]").val(),
      $("select[name=sTitle]").val(),
      $("input[name=password]").val()
    );
    if (
      !$("input[name=sAge]").val() ||
      !$("select[name=sSex]").val() ||
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
      $("select[name=rDestination]").val(),
      $("input[name=pReg]").val()
    );
    if (
      !$("input[name=pFullName]").val() ||
      !$("input[name=pAge]").val() ||
      !$("select[name=pSex]").val() ||
      !$("select[name=pType]").val() ||
      !$("select[name=rDestination]").val() ||
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
      let rDestination = $("select[name=rDestination]").val();
      let pReg = $("input[name=pReg]").val();

      $.ajax({
        url: "db/addNewPatient.php",
        type: "POST",
        data: {
          pFullName: pFullName,
          pAge: pAge,
          pSex: pSex,
          pType: pType,
          rDestination: rDestination,
          pReg: pReg,
          data: "jdslk",
        },
        success: function (result) {
          if (result === "success") {
            displayAlertMsg("Patient Added to Waiting List", true);
            $("#addToListBtnForm").trigger("reset");
          } else if (result === "fail") {
            displayAlertMsg(
              "Patient with I.D No.: " + pReg + " already exists",
              false
            );
          } else {
            displayAlertMsg("Error occurred while saving data.", false);
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

/************ Send to Next Office *************/
$(document).on("click", "#sendToNextOffice", function (e) {
  e.preventDefault();

  if ($("input[name=nextOffice]").val() === "toDoctor") {
    console.log(
      $("input[name=rTemp]").val(),
      $("input[name=rBP]").val(),
      $("input[name=rId]").val(),
      $("input[name=rWeight]").val(),
      $("input[name=nextOffice]").val()
    );

    if (
      !$("input[name=rTemp]").val() ||
      !$("input[name=rBP]").val() ||
      !$("input[name=rId]").val() ||
      !$("input[name=rWeight]").val() ||
      !$("input[name=nextOffice]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#nextOfficeForm").submit();
    }
  } else if ($("input[name=nextOffice]").val() === "toPharmacist") {
    console.log(
      $("textarea[name=rDiagnosis]").val(),
      $("textarea[name=rPrescription]").val(),
      $("input[name=rId]").val(),
      $("input[name=nextOffice]").val()
    );

    if (
      !$("textarea[name=rDiagnosis]").val() ||
      !$("textarea[name=rPrescription]").val() ||
      !$("input[name=rId]").val() ||
      !$("input[name=nextOffice]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#nextOfficeForm").submit();
    }
  } else if ($("input[name=nextOffice]").val() === "toFinish") {
    console.log($("input[name=rId]").val(), $("input[name=nextOffice]").val());

    if (!$("input[name=rId]").val() || !$("input[name=nextOffice]").val()) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#nextOfficeForm").submit();
    }
  } else if ($("input[name=nextOffice]").val() === "backToDoctor") {
    console.log(
      $("textarea[name=rLabResults]").val(),
      $("input[name=rId]").val(),
      $("input[name=nextOffice]").val()
    );

    if (
      !$("textarea[name=rLabResults]").val() ||
      !$("input[name=rId]").val() ||
      !$("input[name=nextOffice]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      return $("#nextOfficeForm").submit();
    }
  }
});

$(document).on("click", "#sendToLab", function (e) {
  $("input[name=nextOffice]").val("toLab");

  console.log($("input[name=rId]").val(), $("input[name=nextOffice]").val());

  if (
    !$("input[name=rId]").val() &&
    $("input[name=nextOffice]").val() === "toLab"
  ) {
    return displayAlertMsg(
      "Fill in the form correctly before you submit",
      false
    );
  } else {
    return $("#nextOfficeForm").submit();
  }
});
