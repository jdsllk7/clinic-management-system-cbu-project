<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {

    $delete = mysqli_query($conn, "DELETE FROM staff where sId = $data");

    if($delete){
        echo 'success';
    }else{
        echo 'fail';
    }

} else {
    echo 'error';
}
