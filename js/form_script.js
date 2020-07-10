$(document).ready(function () {
  /************ lesson form *************/
  /* $(document).on("click", "a[href$='#finish']", function (e) {
    e.preventDefault();

    console.log(
      $("select[name=grade]").val(),
      $("select[name=subject]").val(),
      $("input[name=topic]").val(),
      $("input[name=lessonsName]").val()
    );
    if (
      !$("select[name=grade]").val() ||
      !$("select[name=subject]").val() ||
      !$("input[name=topic]").val() ||
      !$("input[name=lessonsName]").val()
    ) {
      return displayAlertMsg(
        "Fill in the form correctly before you submit",
        false
      );
    } else {
      //reassign class names
      $(".fileUpload").each(function (i) {
        i = i + 1;
        x = i;
        console.log(i);
        $(this).attr("name", "file" + i);
        $(".fileCount").val(i);
      });
      $(".add_text_field").each(function (i) {
        i = i + 1;
        $(this).attr("name", "fileText" + i);
      });
      //loop through the files
      let fileCount = $(".fileCount").val();
      for (let x = 1; x <= fileCount; x++) {
        let file = $("input[name=file" + x + "]");
        let fileText = $("textarea[name=fileText" + x + "]");

        console.log("data", file.val(), fileText.val(), x, fileCount);
        if (!fileText.val() || !file.val()) {
          return displayAlertMsg(
            "Attach files and type some notes before you submit",
            false
          );
        }
      } //end for()

      $("#lessonForm").submit(); // Submit the form in js
      // alert("submitted");
    }
  }); */

  /************ login form *************/
  $(document).on("click", "#loginSubmitBtn", function (e) {
    console.log(
      $("input[name=staffID]").val(),
      $("input[name=staffPassword]").val()
    );
    if (!$("input[name=staffID]").val() || !$("input[name=staffPassword]").val()) {
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
