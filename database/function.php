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
        return $_SESSION['error_message'] = "<div class='alert alert-danger' role='alert'>Employee Register Failed!</div>";
    }
}

// Employee Login Function
function get_login($em_phone, $password) {
    global $db;
    $command = "SELECT * FROM tbl_employee WHERE em_phone = '$em_phone' AND em_status = 1";
    $login_info = $db->query($command);
    if ($login_info->num_rows > 0) {
        $data = $login_info->fetch_assoc();
        if ($data['em_phone'] === $em_phone && $data['em_password'] === $password) {
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
function customer_insert($customer_branch, $customer_name, $customer_phone, $customer_address){
    global $db;
    $command = "INSERT INTO tbl_customer(customer_branch, customer_name, customer_phone, customer_address)VALUES ('$customer_branch', '$customer_name', '$customer_phone', '$customer_address')";
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
function customer_update($customer_branch, $customer_name, $customer_phone, $customer_address, $customer_id){
    global $db;
    $command = "UPDATE tbl_customer SET customer_name='$customer_name', customer_phone='$customer_phone', customer_branch='$customer_branch', customer_address='$customer_address' WHERE customer_id='$customer_id'";
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
// ------------CUSTOMER FUNCTION END----------
// -------------------------------------------


//////////////////////////////////////////////

// -------------------------------------------
// ------------COMPANY FUNCTION START---------
// -------------------------------------------

// Get All Company
function company(){
    global $db;
    $auth_branch = $_SESSION['auth_branch'];
	$command ="SELECT * FROM tbl_company WHERE company_branch='$auth_branch'";
	$company = $db->query($command);
	return $company;
};
// Company Insert
function company_insert($company_branch, $company_name, $company_email, $company_phone, $company_address, $company_manager){
    global $db;
    $command = "INSERT INTO tbl_company(company_branch, company_name, company_phone, company_email, company_address, company_manager)
    VALUES ('$company_branch', '$company_name', '$company_phone', '$company_email', '$company_address', '$company_manager')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Company Create Successfully";
    }else{
        $_SESSION['error_message'] = "Company Create Failed!";
    }
};

// Company Edit
function company_edit($company_id){
    global $db;
	$command ="SELECT *FROM tbl_company WHERE company_id='$company_id'";
	$company = $db->query($command);
	return $company;
}

// Company Update
function company_update($company_branch, $company_name, $company_email, $company_phone, $company_address, $company_manager, $company_id){
    global $db;
    $command = "UPDATE tbl_company SET company_branch='$company_branch', company_name='$company_name', company_email='$company_email', company_phone='$company_phone',  company_address='$company_address', company_manager='$company_manager' WHERE company_id='$company_id'";
    $update = $db->query($command);
    if ($update) {
        $_SESSION['success_message'] = "Company Update Successfully";
    }else{
        $_SESSION['error_message'] = "Company Update Failed!";
    }
}

// Company Delete
function company_destroy($company_id){
	global $db;
	$command="DELETE FROM tbl_company WHERE company_id='$company_id'";
	$delete=$db->query($command);
	if ($delete) {
        $_SESSION['success_message'] = "Company Delete Successfully";
        header("Location: company.php");
    }
}

// -------------------------------------------
// ------------COMPANY FUNCTION END ----------
// -------------------------------------------
//////////////////////////////////////////////

// -------------------------------------------
// ------------PRODUCT FUNCTION START---------
// -------------------------------------------

// Get All Product
function product(){
    global $db;
    $auth_branch = $_SESSION['auth_branch'];
	$command ="SELECT * FROM tbl_product WHERE product_branch='$auth_branch'";
	$product = $db->query($command);
	return $product;
};

// Product Insert
function product_insert($product_name, $product_barcode, $product_size, $product_type, $product_branch, $product_cost, $product_sell, $product_quantity, $product_description){
    global $db;
    $command = "INSERT INTO tbl_product(product_name, product_barcode, product_size, product_type, product_branch, product_cost, product_sell, product_quantity, product_description)
    VALUES ('$product_name', '$product_barcode', '$product_size', '$product_type', '$product_branch', '$product_cost', '$product_sell', '$product_quantity', '$product_description')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Product Create Successfully";
    }else{
        $_SESSION['error_message'] = "Product Create Failed!";
    }
};

// Single Product Show
function product_show($product_id){
    global $db;
	$command ="SELECT *FROM tbl_product WHERE product_id='$product_id'";
	$product = $db->query($command);
	return $product;
}

// Product Edit
function product_edit($product_id){
    global $db;
	$command ="SELECT *FROM tbl_product WHERE product_id='$product_id'";
	$product = $db->query($command);
	return $product;
}

// Product Update
function product_update($product_name, $product_barcode, $product_size, $product_type, $product_branch, $product_cost, $product_sell, $product_quantity, $product_description, $product_id){
    global $db;
    $command = "UPDATE tbl_product SET product_name='$product_name', product_barcode='$product_barcode', product_size='$product_size', product_type='$product_type',  product_branch='$product_branch', product_cost='$product_cost', product_sell='$product_sell', product_quantity='$product_quantity', product_description='$product_description' WHERE product_id='$product_id'";
    $update = $db->query($command);
    if ($update) {
        $_SESSION['success_message'] = "Product Update Successfully";
    }else{
        $_SESSION['error_message'] = "Product Update Failed!";
    }
}

// Product Delete
function product_destroy($product_id){
	global $db;
	$command="DELETE FROM tbl_product WHERE product_id='$product_id'";
	$delete=$db->query($command);
	if ($delete) {
        $_SESSION['success_message'] = "Product Delete Successfully";
        header("Location: product.php");
    }
}

// -------------------------------------------
// ------------PRODUCT FUNCTION END ----------
// -------------------------------------------

//////////////////////////////////////////////

// -------------------------------------------
// ------------PURCHASE FUNCTION START -------
// -------------------------------------------


// Get All Company
function get_company_for_purchase(){
    global $db;
    $auth_branch = $_SESSION['auth_branch'];
    $command ="SELECT * FROM tbl_company WHERE company_branch='$auth_branch'";
    $pu_company = $db->query($command);
    return $pu_company;
};

function get_branch_for_purchase(){
    global $db;
    $auth_branch = $_SESSION['auth_branch'];
	$command ="SELECT * FROM tbl_branch WHERE branch_id = '$auth_branch'";
	$pu_branch = $db->query($command);
	return $pu_branch;
};
function search_product_for_purchase($pd_product_barcode){
    global $db;
    $command ="SELECT * FROM tbl_product WHERE product_barcode='$pd_product_barcode'";
    $search_product = $db->query($command);
    return $search_product;

};

function insertPurchase($pd_branch, $pd_company, $pd_date, $pd_invoice, $pd_product_barcode, $pd_product_price, $pd_quantity, $pd_total_price){
    global $db;
    $command ="INSERT INTO tbl_purchase_details(pd_branch, pd_company, pd_date, pd_invoice, pd_product_barcode, pd_product_price, pd_quantity, pd_total_price)
    VALUES('$pd_branch', '$pd_company', '$pd_date', '$pd_invoice', '$pd_product_barcode', '$pd_product_price', '$pd_quantity', '$pd_total_price')";
    $insert = $db->query($command);
    if ($insert) {
        $_SESSION['success_message'] = "Product Purchase Successfully";
    }else{
        $_SESSION['error_message'] = "Product Purchase Failed!";
    }
};

function get_purchase_product(){
    global $db;
    $branch_id = $_SESSION['auth_branch'];
    $command ="SELECT * FROM tbl_purchase_details WHERE pd_branch='$branch_id'";
    $get_purchase = $db->query($command);
    return $get_purchase;
};

// -------------------------------------------
// ------------PURCHASE FUNCTION END ---------
// -------------------------------------------