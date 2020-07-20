<?php
include('asession.php');

$command = "sudo wtab.bin " . $_POST['rkey'];
shell_exec($command);
echo "Randomization Table Changed";
?>
<html>
<body>
<h2><a href = "awelcome.php">Back</a></h2>
</body>
</html>
