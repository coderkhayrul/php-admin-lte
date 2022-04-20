<?php 
session_start();

// DATABASE CONFIG
$host= 'localhost';
$userName= 'khayrulss';
$password= 'Password';
$dbName= 'php_stock';

$db = new mysqli($host, $userName, $password, $dbName);

function create($em_name, $em_email, $em_password){
    global $db;

    $command = "INSERT INTO tbl_employee(em_name, em_email, em_password)VALUES ('$em_name', '$em_email', '$em_password')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Employee Register Successfully</div>";
        return header("Location: index.php");
    }else{
        return $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Employee Register Failed!</div>";
    }
}