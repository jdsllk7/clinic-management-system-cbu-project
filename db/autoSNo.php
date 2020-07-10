<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {

    $count = mysqli_query($conn, "SELECT sNo FROM staff where sNo = $data");

    if(mysqli_num_rows($count) == 0){
        echo 'success';
    }else{
        echo 'fail';
    }

} else {
    echo 'error';
}
