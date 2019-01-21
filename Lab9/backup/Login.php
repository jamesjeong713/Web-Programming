
<!DOCTYPE html>
<?php
	require ("Header.php");
	require ("Menu.php");
	require ("Footer.php");
	// include "MySQLMenu.php";
?>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
    <div id="content">
      <form method="post">
        Email Address <input type="text" name="email" value="" />
        <br />
        <br />
        Password <input type="password" name="password" value="" />
        <br />
        <br />
				<input type="Login" name="Login" value = "Login"/>
      </form>
      <br />
      <br />
      <br />
    </div>
  </body>
</html>
