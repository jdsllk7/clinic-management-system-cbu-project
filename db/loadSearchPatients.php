<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {
    $staff = mysqli_query($conn, "SELECT * FROM staff ORDER BY sId DESC");
    $patients = mysqli_query($conn, "SELECT * FROM patients ORDER BY pId DESC");

    $html = '';

    if (mysqli_num_rows($staff) > 0 || mysqli_num_rows($patients) > 0) {

        $html .= '
        <input class="form-control" id="searchField" type="text" placeholder="Search by name or ref no.">
        <br>
        <div style="overflow-y:scroll;height:500px;">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Ref No.</th>
                    <th>Type</th>
                    <th class="text-center" style="width: 100px;">Add To Queue</th>
                    <th class="text-center" style="width: 100px;">Delete</th>
                </tr>
            </thead>
            <tbody id="searchTable">';

        while ($result = mysqli_fetch_assoc($patients)) {
            $html .= '
            <tr>
                <td>' . $result["pFullName"] . '</td>
                <td>' . $result["pReg"] . '</td>
                <td>' . $result["pType"] . '</td>
                <td class="text-center">
                    <button value="' . $result["pId"] . '" class="m-0 addToList bg-transparent border-0 text-primary underline">Add</button>
                </td>
                <td class="text-center">
                    <button value="' . $result["pId"] . '" class="m-0 addToList bg-transparent border-0 text-danger underline">Delete</button>
                </td>
            </tr>';
        }
        while ($result = mysqli_fetch_assoc($staff)) {
            $html .= '
            <tr>
                <td>' . $result["sFName"] . ' ' . $result["sLName"] . '</td>
                <td>' . $result["sNo"] . '</td>
                <td>Staff</td>
                <td class="text-center">
                    <button value="' . $result["sId"] . '" class="m-0 addToList bg-transparent border-0 text-primary underline" title="Add To Waiting List">Add</button>
                </td>
                <td class="text-center">
                    <button value="' . $result["sId"] . '" class="m-0 addToList bg-transparent border-0 text-danger underline" title="Delete Patient">Delete</button>
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
