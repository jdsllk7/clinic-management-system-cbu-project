<?php
include '../db/connect.php';
$data = $_POST['data'];

if (isset($data)) {
    $receptionist = mysqli_query($conn, "SELECT * FROM staff where sTitle like 'Receptionist' ORDER BY sId DESC");
    $nurse = mysqli_query($conn, "SELECT * FROM staff where sTitle like 'Nurse' ORDER BY sId DESC");
    $lab = mysqli_query($conn, "SELECT * FROM staff where sTitle like 'Lab Technician' ORDER BY sId DESC");
    $pharmacist = mysqli_query($conn, "SELECT * FROM staff where sTitle like 'Pharmacist' ORDER BY sId DESC");
    $doctor = mysqli_query($conn, "SELECT * FROM staff where sTitle like 'Doctor' ORDER BY sId DESC");

    $html = '';

    $html .= '<div class="panel-group staffAccordion" id="accordion">';

    //concat receptionist----------------------------------
    if (mysqli_num_rows($receptionist) > 0) {

        $html .= '<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title pt-2 pb-2 pl-1">
                <a class="block" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Receptionists (' . mysqli_num_rows($receptionist) . ')</a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Staff No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    ';
        while ($result = mysqli_fetch_assoc($receptionist)) {
            $html .= '  
                        <tr class="deleteRow' . $result["sId"] . '">          
                        <td>' . $result["sNo"] . '</td>
                        <td>' . $result["sFName"] . '</td>
                        <td>' . $result["sLName"] . '</td>
                        <td>' . $result["password"] . '</td>
                        <td><button value="' . $result["sId"] . '" class="btn btn-sm btn-danger m-0 deleteStaffBtn">Delete</button></td>
                        </tr>
                        ';
        }
        $html .= '
                </tbody>
            </table>
        </div>
        </div>
    </div>';
    }

    //concat nurse----------------------------------
    if (mysqli_num_rows($nurse) > 0) {
        $html .= '<div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title pt-2 pb-2 pl-1">
                <a class="block" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Nurses (' . mysqli_num_rows($nurse) . ')</a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Staff No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    ';
        while ($result = mysqli_fetch_assoc($nurse)) {
            $html .= '  
                        <tr class="deleteRow' . $result["sId"] . '">              
                        <td>' . $result["sNo"] . '</td>
                        <td>' . $result["sFName"] . '</td>
                        <td>' . $result["sLName"] . '</td>
                        <td>' . $result["password"] . '</td>
                        <td><button value="' . $result["sId"] . '" class="btn btn-sm btn-danger m-0 deleteStaffBtn">Delete</button></td>
                        </tr>';
        }
        $html .= '
                </tbody>
            </table>
        </div>
        </div>
    </div>';
    }

    //concat lab----------------------------------
    if (mysqli_num_rows($lab) > 0) {
        $html .= '<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title pt-2 pb-2 pl-1">
                    <a class="block" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Lab Technicians (' . mysqli_num_rows($lab) . ')</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-condensed table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Staff No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
        while ($result = mysqli_fetch_assoc($lab)) {
            $html .= ' 
                            <tr class="deleteRow' . $result["sId"] . '">              
                            <td>' . $result["sNo"] . '</td>
                            <td>' . $result["sFName"] . '</td>
                            <td>' . $result["sLName"] . '</td>
                            <td>' . $result["password"] . '</td>
                            <td><button value="' . $result["sId"] . '" class="btn btn-sm btn-danger m-0 deleteStaffBtn">Delete</button></td>
                            </tr>
                            ';
        }
        $html .= '
                    
                    </tbody>
                </table>
            </div>
            </div>
    </div>';
    }

    //concat pharmacist----------------------------------
    if (mysqli_num_rows($pharmacist) > 0) {
        $html .= '<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title pt-2 pb-2 pl-1">
                    <a class="block" data-toggle="collapse" data-parent="#accordion" href="#collapse4">pharmacists (' . mysqli_num_rows($pharmacist) . ')</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-condensed table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Staff No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
        while ($result = mysqli_fetch_assoc($pharmacist)) {
            $html .= '  
                            <tr class="deleteRow' . $result["sId"] . '">              
                            <td>' . $result["sNo"] . '</td>
                            <td>' . $result["sFName"] . '</td>
                            <td>' . $result["sLName"] . '</td>
                            <td>' . $result["password"] . '</td>
                            <td><button value="' . $result["sId"] . '" class="btn btn-sm btn-danger m-0 deleteStaffBtn">Delete</button></td>
                            </tr>
                            ';
        }
        $html .= '
                    
                    </tbody>
                </table>
            </div>
            </div>
    </div>';
    }

    //concat doctor----------------------------------
    if (mysqli_num_rows($doctor) > 0) {
        $html .= '<div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title pt-2 pb-2 pl-1">
                    <a class="block" data-toggle="collapse" data-parent="#accordion" href="#collapse5">Doctors (' . mysqli_num_rows($doctor) . ')</a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-condensed table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Staff No.</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
        while ($result = mysqli_fetch_assoc($doctor)) {
            $html .= '   
                            <tr class="deleteRow' . $result["sId"] . '">            
                            <td>' . $result["sNo"] . '</td>
                            <td>' . $result["sFName"] . '</td>
                            <td>' . $result["sLName"] . '</td>
                            <td>' . $result["password"] . '</td>
                            <td><button value="' . $result["sId"] . '" class="btn btn-sm btn-danger m-0 deleteStaffBtn">Delete</button></td>
                            </tr>
                            ';
        }
        $html .= '
                    
                    </tbody>
                </table>
            </div>
            </div>
    </div>';
    }


    $html .= '</div>';

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM staff")) == 0) {
        $html = '<p>No registered staff</p>';
    }
    echo $html;

} else {
    $html = '<p>Failed to load data. Reload page & try again</p>';
    echo $html;
}
