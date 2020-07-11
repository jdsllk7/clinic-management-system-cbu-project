<?php
setcookie('sId', '', time() - 3600, "/");
setcookie('sNo', '', time() - 3600, "/");
setcookie('sFName', '', time() - 3600, "/");
setcookie('sLName', '', time() - 3600, "/");
setcookie('sTitle', '', time() - 3600, "/");
setcookie('admin', '', time() - 3600, "/");
header('Location:../index.php?msg=You have logged out&type=false');