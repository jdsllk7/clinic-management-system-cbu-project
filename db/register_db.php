<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["sFName"]) &&
        isset($_POST["sLName"]) &&
        isset($_POST["sNo"]) &&
        isset($_POST["sTitle"]) &&
        isset($_POST["password"]) &&
        !empty($_POST["sFName"]) &&
        !empty($_POST["sLName"]) &&
        !empty($_POST["sNo"]) &&
        !empty($_POST["sTitle"]) &&
        !empty($_POST["password"])
    ) {

        $sFName = $_POST["sFName"];
        $sLName = $_POST["sLName"];
        $sNo = $_POST["sNo"];
        $sTitle = $_POST["sTitle"];
        $password = $_POST["password"];

        //insert
        $sql = "INSERT INTO staff (
        sNo,
        sFName,
        sLName,
        sTitle,
        password
        ) VALUES (
          '$sNo',
          '$sFName',
          '$sLName',
          '$sTitle',
          '$password'
          )";

        $data = mysqli_query($conn, "SELECT * FROM staff WHERE sNo='$sNo'");

        if (mysqli_num_rows($data) == 0) {

            mysqli_query($conn, $sql); //run insert query
            $userId = mysqli_insert_id($conn);

            header('Location: admin_create_accounts.php?msg=SUCCESS: Account Created Successfully&type=true');
        } else {
            header('Location: admin_create_accounts.php?msg=ERROR: Account Already Exists. Enter different Staff No.&type=false');
        }
    } else {
        header('Location: admin_create_accounts.php?msg=ERROR: Unable to create account. Please try again.&type=false');
    }
}//end if(POST)