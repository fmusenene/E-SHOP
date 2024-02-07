<?php
require_once('files/functions.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);

 if (login_user($email,$password)){
    alert('success','Account logid in successfully.');
    header ('location: account-orders.php');
    die();
}else{
    alert('danger','you have enterd a wrong user name or password.');
    header ('location: login.php');
    die();
}
  
  
