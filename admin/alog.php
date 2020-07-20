<?php
include('asession.php');

$myfile = fopen("log.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
<html>
<body>
<h2><a href = "awelcome.php">Back</a></h2>
</body>
</html>
