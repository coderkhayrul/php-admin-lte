<?php 
session_start();

// DATABASE CONFIG
$host= 'localhost';
$userName= 'khayrul';
$password= 'Password';
$dbName= 'php_stock';

$db = new mysqli($host, $userName, $password, $dbName);

// Employee Register Function
function register($em_name, $em_email, $em_phone, $em_password){
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

// Employee Login Function
function get_login($em_email, $em_password) {
    global $db;
    $command = "SELECT * FROM tbl_employee WHERE em_email = '$em_email' || em_phone = '$em_email'";
    $login_info = $db->query($command);

    if ($login_info->num_rows > 0) {
        $data = $login_info->fetch_assoc();
        if ($data['em_email'] === $em_email OR $data['em_phone'] === $em_email && $data['em_password'] === $em_password) {
            $_SESSION['auth_id'] = $data['em_id'];
            $_SESSION['auth_name'] = $data['em_name'];
            $_SESSION['auth_branch'] = $data['em_branch'];
            $_SESSION['auth_designation'] = $data['em_designation'];
            header('Location: dashboard.php');
        }else {
            return "<div class='alert alert-danger' role='alert'>Login Failed!</div>";
        }

    }else {
        return "<div class='alert alert-danger' role='alert'>Login Failed!</div>";
    }
}
// -------------------------------------------
// ----------EMPLOYEE FUNCTION START----------
// -------------------------------------------

// Get All Employee
function employee(){
    global $db;
	$command ="SELECT * FROM tbl_employee";
	$employee = $db->query($command);
	return $employee;
}

// Get Branch For Employee
function all_branch(){
    global $db;
	$command ="SELECT * FROM tbl_branch";
	$branch = $db->query($command);
	return $branch;
}

// Employee Insert 
function emp_insert($em_name, $em_email, $em_phone, $em_branch, $em_designation, $em_nid , $em_salary, $em_join_date, $em_address, $em_password){
    global $db;
    $command = "INSERT INTO tbl_employee(em_name, em_email, em_phone, em_branch, em_designation, em_nid, em_salary, em_join_date, em_address, em_password)VALUES ('$em_name', '$em_email', '$em_phone', '$em_branch', '$em_designation', '$em_nid ', '$em_salary', '$em_join_date', '$em_address', '$em_password')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Employee Create Successfully";
    }else{
        $_SESSION['error_message'] = "Employee Create Failed!";
    }
}

// Single Employee Show
function emp_show($em_id){
    global $db;
	$command ="SELECT *FROM tbl_employee WHERE em_id='$em_id'";
	$employee = $db->query($command);
	return $employee;
}

// Employee Edit
function emp_edit($em_id){
    global $db;
	$command ="SELECT *FROM tbl_employee WHERE em_id='$em_id'";
	$employee = $db->query($command);
	return $employee;
}

// Employee Update
function emp_update($em_name, $em_email, $em_phone, $em_branch, $em_designation, $em_nid, $em_salary, $em_join_date,$em_address, $em_id){
    global $db;
    $command = "UPDATE tbl_employee SET em_name='$em_name', em_email='$em_email', em_phone='$em_phone', em_branch='$em_branch', em_designation='$em_designation', em_nid='$em_nid', em_salary='$em_salary', em_join_date='$em_join_date', em_address='$em_address' WHERE em_id='$em_id'";
    $update = $db->query($command);
    if ($update) {
        $_SESSION['success_message'] = "Employee Update Successfully";
    }else{
        $_SESSION['error_message'] = "Employee Update Failed!";
    }
}

// Employee Delete
function emp_destroy($em_id){
	global $db;
	$command="DELETE FROM tbl_employee WHERE em_id='$em_id'";
	$delete=$db->query($command);
	if ($delete) {
        $_SESSION['success_message'] = "Employee Delete Successfully";
        header("Location: employee.php");
    }
}

// -------------------------------------------
// ------------EMPLOYEE FUNCTION END----------
// -------------------------------------------

///////////////////////////////////////////////

// -------------------------------------------
// ------------BRANCH FUNCTION START----------
// -------------------------------------------

// Get All Branch
function branch(){
    global $db;
	$command ="SELECT * FROM tbl_branch";
	$branch = $db->query($command);
	return $branch;
};
// Branch Insert
function branch_insert($branch_name, $branch_email, $branch_phone, $branch_manager, $branch_location){
    global $db;
    $command = "INSERT INTO tbl_branch(branch_name, branch_email, branch_phone, branch_manager, branch_location)VALUES ('$branch_name', '$branch_email', '$branch_phone', '$branch_manager', '$branch_location')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Branch Create Successfully";
    }else{
        $_SESSION['error_message'] = "Branch Create Failed!";
    }
};

// Branch Edit
function branch_edit($branch_id){
    global $db;
	$command ="SELECT *FROM tbl_branch WHERE branch_id='$branch_id'";
	$branch = $db->query($command);
	return $branch;
}

// Branch Update
function branch_update($branch_name, $branch_email, $branch_phone, $branch_manager, $branch_location, $branch_id){
    global $db;
    $command = "UPDATE tbl_branch SET branch_name='$branch_name', branch_email='$branch_email', branch_phone='$branch_phone', branch_manager='$branch_manager', branch_location='$branch_location', branch_id='$branch_id'WHERE branch_id='$branch_id'";
    $update = $db->query($command);
    if ($update) {
        $_SESSION['success_message'] = "Branch Update Successfully";
    }else{
        $_SESSION['error_message'] = "Branch Update Failed!";
    }
}

// Branch Delete
function branch_destroy($branch_id){
	global $db;
	$command="DELETE FROM tbl_branch WHERE branch_id='$branch_id'";
	$delete=$db->query($command);
	if ($delete) {
        $_SESSION['success_message'] = "Branch Delete Successfully";
        header("Location: branch.php");
    }
}

// -------------------------------------------
// ------------BRANCH FUNCTION END------------
// -------------------------------------------

//////////////////////////////////////////////

// -------------------------------------------
// ------------CUSTOMER FUNCTION START--------
// -------------------------------------------

// Get All Customer
function customer(){
    global $db;
	$command ="SELECT * FROM tbl_customer";
	$customer = $db->query($command);
	return $customer;
};
// Customer Insert
function customer_insert($customer_name, $customer_phone, $branch_id, $customer_address){
    global $db;
    $command = "INSERT INTO tbl_customer(customer_name, customer_phone, branch_id, customer_address)VALUES ('$customer_name', '$customer_phone', '$branch_id', '$customer_address')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Customer Create Successfully";
    }else{
        $_SESSION['error_message'] = "Customer Create Failed!";
    }
};

// Customer Edit
function customer_edit($customer_id){
    global $db;
	$command ="SELECT *FROM tbl_customer WHERE customer_id='$customer_id'";
	$customer = $db->query($command);
	return $customer;
}

// Customer Update
function customer_update($customer_name, $customer_phone, $branch_id, $customer_address, $customer_id){
    global $db;
    $command = "UPDATE tbl_customer SET customer_name='$customer_name', customer_phone='$customer_phone', branch_id='$branch_id', customer_address='$customer_address'WHERE customer_id='$customer_id'";
    $update = $db->query($command);
    if ($update) {
        $_SESSION['success_message'] = "Customer Update Successfully";
    }else{
        $_SESSION['error_message'] = "Customer Update Failed!";
    }
}

// Customer Delete
function customer_destroy($customer_id){
	global $db;
	$command="DELETE FROM tbl_customer WHERE customer_id='$customer_id'";
	$delete=$db->query($command);
	if ($delete) {
        $_SESSION['success_message'] = "Customer Delete Successfully";
        header("Location: customer.php");
    }
}

// -------------------------------------------
// ------------CUSTOMER FUNCTION END------------
// -------------------------------------------