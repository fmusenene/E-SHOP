<?php
require_once('files/functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);
$last_name = trim($_POST['last_name']);
$first_name = trim($_POST['first_name']);

if($password != $password_1){
    alert('danger','password did not match.');
    header ('location: login.php');
    die();
    }

$sql = "SELECT * FROM users WHERE email = '{$email}'";
$res = $conn->query($sql);

if($res->num_rows > 0){
    alert('danger','user with same email exist.');
    header ('location: login.php');
    die();
    
}
$password = password_hash($password,PASSWORD_DEFAULT);
$created = time();

$sql="INSERT INTO users(
    first_name,
    last_name,
    phone_number,
    password,
    email,
    user_type,
    created

    )VALUES(
    '{$first_name}',
    '{$last_name}',
    '{$phone_number}',
    '{$password}',
    '{$email}',
     'customer', 
     '{$created}' 
    )";

    ($conn->query($sql));
    {
    login_user($email,$password);
    alert('success','account was created successfully.');
    header('location:account-orders.php');
    die();
    }
