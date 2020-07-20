<?php
   include('asession.php');
?>
<html>
   
   <head>
      <title>Admin Panel</title>
      <style type = "text/css">
         .actions {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
      </style>
   </head>
   
   <body>
      <div align="center">
      <h1>Admin Panel</h1> 
      <div class="actions">
<!-- comment
	<form>
	    <button type="submit" formaction="achange.html">Change Password</button>
	    <button type="submit" formaction="atable.html">Change Randomization Table</button>
	    <button type="submit" formaction="arand.php">View Randomization Table</button>
	    <button type="submit" formaction="alog.php">View Logs</button>
	</form>
-->
      <h2><a href = "achange.html">Change Password</a></h2>
      <h2><a href = "atable.html">Change Randomization Table</a></h2>
      <h2><a href = "arand.php">View Randomization Table</a></h2>
      <h2><a href = "alog.php">View Logs</a></h2>
      <h2><a href = "alogout.php">Sign Out</a></h2>
      </div>
      </div>
   </body>
   
</html>
