<?php
$servername = "localhost:3306";
$username = "nid";
$password = "hunter";
$database = "sqlsec";
$db = mysqli_connect($servername, $username, $password, $database);
session_start();
   
$user_check = $_SESSION['login_user'];
   
$ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
$row = mysqli_fetch_assoc($ses_sql);
   
$login_session = $row['username'];
   
if(!isset($_SESSION['login_user'])){
   header("location:alogin.html");
   die();
}
?>
