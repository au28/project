<?php

function interfacing_module($conn,$queryarr) {
$query="";
for ($i =0; $i <sizeof($queryarr); $i++)
{
	if ($i % 2 == 0)
	{
		$command = "rand.bin " . $queryarr[$i];
		$pos=-2;
		while(strpos($command, "\"",$pos+2) != FALSE)
		{
			$pos = strpos($command, "\"",$pos+2);
			$command = substr($command,0,$pos) . "\\" . substr($command,$pos);
			if($pos+2 >= strlen($command))
			{
				break;
			}
		}
		$pos=-2;
		while(strpos($command, "*",$pos+2) != FALSE)
		{
			$pos = strpos($command, "*",$pos+2);
			$command = substr($command,0,$pos) . "\\" . substr($command,$pos);
			if($pos+2 >= strlen($command))
			{
				break;
			}
		}
		while(strpos($command, "(",$pos+2) != FALSE)
		{
			$pos = strpos($command, "(",$pos+2);
			$command = substr($command,0,$pos) . "\\" . substr($command,$pos);
			if($pos+2 >= strlen($command))
			{
				break;
			}
		}
		while(strpos($command, ")",$pos+2) != FALSE)
		{
			$pos = strpos($command, ")",$pos+2);
			$command = substr($command,0,$pos) . "\\" . substr($command,$pos);
			if($pos+2 >= strlen($command))
			{
				break;
			}
		}
		$tmp=shell_exec($command);
		$query= $query . $tmp;
	}
	else
	{
		$query= $query . $queryarr[$i];
	}
}
$resul = mysqli_query($conn, $query);
$ret = [];
while($ro = mysqli_fetch_assoc($resul)) {
$ret[]= $ro;
}
mysqli_close($conn);
return $ret;
}
?>
