<html>
<body>

<?php

include 'sqlsec_interface.php';

$servername = "localhost:4040";
//started as mysql-proxy --proxy-address=127.0.0.1:4040 --proxy-backend-addresses=127.0.0.1:3306
$username = "nid";
$password = "hunter";
$database = "sqlsec";
$conc = mysqli_connect($servername, $username, $password, $database);
if (!$conc) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = array("SELECT * FROM info where uid=\"", $_GET["uid"], "\" and pass=", $_GET["pass"]);
$result = interfacing_module($conc,$sql);
if (count($result) > 0) {
	echo "<h1 align=center>User Details</h1>";
	for ($i =0; $i <sizeof($result); $i++) {
		$row = $result[$i];
		echo "<p align=center>User Id:" . $row["uid"] . "</p>" . "<p align=center>First Name: " . $row["name"] . "</p>" . "<p align=center>Last Name: " . $row["lname"] . "</p>" . "<p align=center>Gender:" . $row["gender"] . "</p>" . "<p align=center>Phone:" . $row["phone"]. "</p>" . "<p align=center>City:" . $row["city"] . "</p>";
	}
}
else {
	echo "Login Failed";
}
mysqli_close($conc);
?>

</body>
</html>
