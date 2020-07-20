<?php
include('asession.php');

$command = "sudo vtab.bin";
shell_exec($command);
$myfile = fopen("tmpp", "r") or die("Unable to open file!");
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
