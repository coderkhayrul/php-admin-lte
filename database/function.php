<?php 
session_start();

// DATABASE CONFIG
$host= 'localhost';
$userName= 'khayrul';
$password= 'Password';
$dbName= 'php_stock';

$db = new mysqli($host, $userName, $password, $dbName);

function create($em_name, $em_email, $em_phone, $em_password){
    global $db;

    $command = "INSERT INTO tbl_employee(em_name, em_email, em_phone, em_password)VALUES ('$em_name', '$em_email', '$em_phone', '$em_password')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['message'] = "<div class='alert alert-success' role='alert'>Employee Register Successfully</div>";
        return header("Location: index.php");
    }else{
        return $_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Employee Register Failed!</div>";
    }
}

function get_login($em_email, $em_password) {
    global $db;
    $command = "SELECT * FROM tbl_employee WHERE em_email = '$em_email' OR  em_phone = '$em_email' AND em_password = '$em_password' AND em_status = '1'";
    $login_info = $db->query($command);
    if ($login_info->num_rows > 0) {
        header('location: dashboard.php');
    }else {
        return "<div class='alert alert-danger' role='alert'>Login Failed!</div>";
    }


}