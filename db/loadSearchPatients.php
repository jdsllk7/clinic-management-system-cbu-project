<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {
    // $staff = mysqli_query($conn, "SELECT staff.* FROM staff INNER JOIN pRecords ON staff.sNo=pRecords.pId;");
    // $patients = mysqli_query($conn, "SELECT patients.* FROM patients INNER JOIN pRecords ON patients.pReg=pRecords.pId;");

    $staff = mysqli_query($conn, "SELECT * FROM staff ORDER BY sId DESC");
    $patients = mysqli_query($conn, "SELECT * FROM patients ORDER BY pId DESC");

    $html = '';
    $status = '';

    if (mysqli_num_rows($staff) > 0 || mysqli_num_rows($patients) > 0) {

        $html .= '
        <input class="form-control" id="searchField" type="text" placeholder="Search by Name, SIN or I.D No.">
        <br>
        <div style="overflow-y:scroll;height:500px;">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>SIN / I.D No.</th>
                    <th>Type</th>
                    <th class="text-center" style="width: 100px;">Add/Remove From Queue</th>
                    <th class="text-center" style="width: 100px;">Delete</th>
                </tr>
            </thead>
            <tbody id="searchTable">';

        while ($result = mysqli_fetch_assoc($patients)) {

            $status = '<button value="' . $result["pReg"] . '" class="m-0 bg-transparent border-0 text-primary underline addTOListP" title="Add patient to queue">Add</button>';
            if ($result["pStatus"] == 1) {
                $status = '<button value="' . $result["pReg"] . '" class="m-0 bg-transparent border-0 text-dark underline removeFromListP" title="Remove patient from queue">Remove</button>';
            }
            $html .= '
            <tr class="deleteListRow' . $result["pReg"] . '">
                <td>' . $result["pFullName"] . '</td>
                <td>' . $result["pReg"] . '</td>
                <td>Patient</td>
                <td class="text-center addRemovePcell' . $result["pReg"] . '">
                    ' . $status . '
                </td>
                <td class="text-center">
                    <button value="' . $result["pReg"] . '" class="m-0 bg-transparent border-0 text-danger underline deletePatient">Delete</button>
                </td>
            </tr>';
        }
        while ($result = mysqli_fetch_assoc($staff)) {

            $status = '<button value="' . $result["sNo"] . '" class="m-0 bg-transparent border-0 text-primary underline addTOListS" title="Add staff member to queue">Add</button>';
            if ($result["sStatus"] == 1) {
                $status = '<button value="' . $result["sNo"] . '" class="m-0 bg-transparent border-0 text-dark underline removeFromListS" title="Remove staff member from queue">Remove</button>';
            }

            $html .= '
            <tr>
                <td>' . $result["sFName"] . ' ' . $result["sLName"] . '</td>
                <td>' . $result["sNo"] . '</td>
                <td>Staff Member</td>
                <td class="text-center addRemoveScell' . $result["sNo"] . '">
                    ' . $status . '
                </td>
                <td class="text-center">
                    <button value="' . $result["sNo"] . '" class="m-0 bg-transparent border-0 text-danger underline deleteStaff" title="Delete Patient"></button>
                </td>
            </tr>';
        }

        $html .= '
            </tbody>
        </table>
        </div>';
    } else {
        $html = '<p>No records to search</p>';
    }

    echo $html;
} else {
    $html = '<p>Failed to load data. Reload page & try again</p>';
    echo $html;
}
