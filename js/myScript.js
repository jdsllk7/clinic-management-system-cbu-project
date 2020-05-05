$(document).ready(function () {
  $(".searchPatientBtn").click(function () {
    if (
      $(".searchInput").val() &&
      ($(".searchInput").val().includes("James") ||
        $(".searchInput").val().includes("Luke"))
    ) {
      $(".searchResults").show();
    } else {
      alert("Please enter record to search for.");
      $(".searchResults").hide();
    }
  });

  $(".addToListBtn").click(function () {
    if ($(".selectType :selected").val() === "patient") {
      window.location.href = "../patient_list.html";
    } else if ($(".selectType :selected").val() === "stuff") {
      window.location.href = "../stuff_list.html";
    } else if ($(".selectType :selected").val() === "emergency") {
      window.location.href = "../emergency_list.html";
    } else {
      alert("Please enter details correctly");
    }
  });

  $(".patientNext").click(function () {
    var msg = new SpeechSynthesisUtterance(
      "Bob Brown, please go to the Nurse's office."
    );
    window.speechSynthesis.speak(msg);
  });

  $(".emergencyNext").click(function () {
    var msg = new SpeechSynthesisUtterance(
      "Henry White, please go to the Pharmacist's office."
    );
    window.speechSynthesis.speak(msg);
  });

  $(".stuffNext").click(function () {
    var msg = new SpeechSynthesisUtterance(
      "Ben Limpo, please go to the Lab."
    );
    window.speechSynthesis.speak(msg);
  });

});
