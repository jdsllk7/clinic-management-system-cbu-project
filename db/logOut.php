<?php
setcookie('userId', '', time() - 3600, "/");
setcookie('eNumber', '', time() - 3600, "/");
setcookie('fName', '', time() - 3600, "/");
setcookie('lName', '', time() - 3600, "/");
header('Location:../index.php?msg=You have logged out&type=false');