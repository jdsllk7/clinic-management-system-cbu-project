<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {

    $rDestination = $_COOKIE["sTitle"];

    $html = '';

    if($rDestination == 'Receptionist'){
        $patients = mysqli_query($conn, "SELECT * FROM pRecords WHERE rStatus LIKE '1' ORDER BY rType ASC, rId ASC");
    }else{
        $patients = mysqli_query($conn, "SELECT * FROM pRecords WHERE rStatus LIKE '1' AND rDestination LIKE '$rDestination' ORDER BY rType ASC, rId ASC");
    }

    if (mysqli_num_rows($patients) > 0) {

        $count = 0;
        $firstCallClass = '';
        $rTypeClass = '';
        $hiddenFirstPatientIdInput = '';

        while ($result = mysqli_fetch_assoc($patients)) {
            $count++;

            if ($count == 1) {
                $firstCallClass = 'firstCallClass';
                $hiddenFirstPatientIdInput = '<input type="hidden" id="hiddenFirstPatientIdInput" value="' . $result["rId"] . '">';
            } else {
                $firstCallClass = '';
            }
            if ($result["rType"] == 'Emergency') {
                $rTypeClass = 'text-danger';
            } else {
                $rTypeClass = 'text-primary';
            }

            if ($_COOKIE["sTitle"] == 'Receptionist') {
                $rowOutput = $result["rDestination"];
            }else{
                $rowOutput = $result["rSex"];
            }

            $html .= '          
                <tr class="' . $firstCallClass . '">
                ' . $hiddenFirstPatientIdInput . '
                <td class="text-center">' . $count . '</td>
                <td class="text-center">' . $result["pId"] . '</td>
                <td class="text-center">' . $result["rFullName"] . '</td>
                <td class="text-center">' . $rowOutput . '</td>
                <td class="text-center ' . $rTypeClass . '">' . $result["rType"] . '</td>
                </tr>
            ';
        }
    } else {
        $html = '
                <tr>
                <td class="text-danger">No Patients</td>
                <td class="text-info"></td>
                <td class="text-info"></td>
                <td class="text-info"></td>
                <td class="text-info"></td>
                </tr>
                
                ';
    }

    echo $html;
} else {
    $html = '<p>Failed to load data. Reload page & try again</p>';
    echo $html;
}
