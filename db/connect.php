<?php

$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'clinic_db';

// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);

// CHECK CONNECTION
if (!$conn) {
    die($error_msg);
}

// CREATE THE DATABASE
// $sql = "DROP DATABASE IF EXISTS $db";
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
    $conn = mysqli_connect($servername, $username, $password, $db);
} else {
    die($error_msg);
}

$sql = "CREATE TABLE IF NOT EXISTS staff (
	sId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	sNo INT(10) NOT NULL,
	sFName VARCHAR(50) NOT NULL,
	sLName VARCHAR(50) NOT NULL,
	sTitle VARCHAR(50) NOT NULL,
	password VARCHAR(200) NOT NULL,
	sAge INT(10) NOT NULL,
	sSex VARCHAR(10) NOT NULL,
	sStatus VARCHAR(10) DEFAULT '0'
	)";
// $sql = "DROP TABLE IF EXISTS staff";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS patients (
	pId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	pFullName VARCHAR(200) NOT NULL,
	pAge INT(10) NOT NULL,
	pSex VARCHAR(10) NOT NULL,
	pReg INT(10) NOT NULL,
	pStatus VARCHAR(10) DEFAULT '1'
	)";
// $sql = "DROP TABLE IF EXISTS patients";
mysqli_query($conn, $sql);

$sql = "CREATE TABLE IF NOT EXISTS pRecords (
	rId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	rFullName VARCHAR(200),
	rAge INT(10),
	rSex VARCHAR(10),
	rTemp VARCHAR(50),
	rBP VARCHAR(50),
	rWeight VARCHAR(50),
	rDiagnosis VARCHAR(255),
	rPrescription VARCHAR(255),
	rLabResults VARCHAR(255),
	rDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	rStatus VARCHAR(10) DEFAULT '1',
	rType VARCHAR(50),
	rDestination VARCHAR(50),
	pType VARCHAR(50),
	pId INT(10) NOT NULL
	)";
// $sql = "DROP TABLE IF EXISTS pRecords";
mysqli_query($conn, $sql);
