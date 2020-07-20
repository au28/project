<?php
include('asession.php');

$servername = "localhost:3306";
$username = "nid";
$password = "hunter";
$database = "sqlsec";
$db = mysqli_connect($servername, $username, $password, $database);
$sql = "select passcode from admin where username=\"" . $login_session . "\"";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$pass = $row['passcode'];
$oldpass = $_POST['opass'];
$newpass = $_POST['npass'];
$repass = $_POST['rpass'];

if ($pass == $oldpass)
{
	if($newpass == $repass)
	{
		$sql = "update admin set passcode=\"" . $newpass . "\" where username=\"" . $login_session . "\"";
		mysqli_query($db, $sql);
		echo "Password changed";
	}
	else
	{
		echo "Passwords do not match";
	}
}
else
{
	echo "Wrong Password";
}

?>
<html>
<body>
<h2><a href = "awelcome.php">Back</a></h2>
</body>
</html>
