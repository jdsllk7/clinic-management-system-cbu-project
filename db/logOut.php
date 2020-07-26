<?php
setcookie('sId', '', time() - 3600, "/");
setcookie('sNo', '', time() - 3600, "/");
setcookie('sFName', '', time() - 3600, "/");
setcookie('sLName', '', time() - 3600, "/");
setcookie('sTitle', '', time() - 3600, "/");
setcookie('admin', '', time() - 3600, "/");

// setcookie('rId', '', time() - 3600, "/");
// setcookie('rFullName', '', time() - 3600, "/");
// setcookie('rAge', '', time() - 3600, "/");
// setcookie('rSex', '', time() - 3600, "/");
// setcookie('rTemp', '', time() - 3600, "/");
// setcookie('rBP', '', time() - 3600, "/");
// setcookie('rWeight', '', time() - 3600, "/");
// setcookie('rDiagnosis', '', time() - 3600, "/");
// setcookie('rPrescription', '', time() - 3600, "/");
// setcookie('rLabResults', '', time() - 3600, "/");
// setcookie('rDate', '', time() - 3600, "/");
// setcookie('rStatus', '', time() - 3600, "/");
// setcookie('rType', '', time() - 3600, "/");
// setcookie('rDestination', '', time() - 3600, "/");
// setcookie('pType', '', time() - 3600, "/");
// setcookie('pId', '', time() - 3600, "/");
// setcookie('audio', '', time() - 3600, "/");

header('Location:../index.php?msg=You have logged out&type=false');
