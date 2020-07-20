<html>
<body>

<?php
$servername = "localhost:3306";
$username = "nid";
$password = "hunter";
$database = "sqlsec";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM info where uid=\"" . $_GET["uid"] . "\" and pass=" . $_GET["pass"];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	echo "<h1 align=center>User Details</h1>";
	while($row = mysqli_fetch_assoc($result)) {
	echo "<p align=center>User Id:" . $row["uid"] . "</p>" . "<p align=center>First Name: " . $row["name"] . "</p>" . "<p align=center>Last Name: " . $row["lname"] . "</p>" . "<p align=center>Gender:" . $row["gender"] . "</p>" . "<p align=center>Phone:" . $row["phone"]. "</p>" . "<p align=center>City:" . $row["city"] . "</p>";
	}
}
else {
	echo "Login Failed";
}
mysqli_close($conn);
?>

</body>
</html>
