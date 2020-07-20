<?php
$servername = "localhost:3306";
$username = "nid";
$password = "hunter";
$database = "sqlsec";
$db = mysqli_connect($servername, $username, $password, $database);
session_start();
   
//   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
//      $myusername = mysqli_real_escape_string($db,$_GET['username']);
//      $mypassword = mysqli_real_escape_string($db,$_GET['password']); 

      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
//      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
//         session_register($myusername);
         $_SESSION['login_user'] = $myusername;
         
         header("location: awelcome.php");
      }
      else {
         echo "Your Login Name or Password is invalid";
      }
//   }
?>
