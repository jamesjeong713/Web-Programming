<?php
	//ob_start();
	require ("Header.php");
	require ("Menu.php");
	require ("Footer.php");
	// include "MySQLMenu.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create Account</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
		<div id="content">
			<form action="CreateAccount.php" method="post">
				<?php
				$error = "";
				require "MySQLConnectionInfo.php";
				session_start();
				if(!isset($_POST["firstName"]) || !isset($_POST["lastName"])
				|| !isset($_POST["email"]) || !isset($_POST["telNumber"])
				|| !isset($_POST["sinNumber"])	|| !isset($_POST["password"]))
				{
					$error = "Please enter valid information.";
				}
				else
				{
					if($_POST["firstName"] != "" && $_POST["lastName"] != ""
					&& $_POST["email"] != ""
					&& $_POST["telNumber"] != "" && $_POST["sinNumber"] != ""
					&& $_POST["password"] != "")
					{
						$dbConnection = mysqli_connect($host, $username, $passWord);

						if ($dbConnection == FALSE) {
							die("Connection failed: " . mysqli_connect_error() );
						}
						echo "Connected successfully" . "<br>";

						mysqli_select_db($dbConnection, $database);

						$sqlQuery =
						"INSERT INTO Employee (firstName, lastName, email, telNumber, sinNumber, password)
						VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."', '".$_POST["email"]."', '".$_POST["telNumber"]."', '".$_POST["sinNumber"]."', '".$_POST["password"]."')";

						if (mysqli_query($dbConnection, $sqlQuery)) {
							echo "Person Successfully Added". "<br>";
						} else {
							echo "Person Could not be added: " . $sql . "<br>" .
							mysqli_error($dbConnection);
						}

						mysqli_close($dbConnection);

						$_SESSION ["valid_login"];
						header ('location: http://149.56.204.160/~oceanpla/CST8238/Lab9/ViewAllEmployees.php');
						exit ();
					}
					else
						$error = "Please enter a first and last name.";
				}
				?>
				<h1>Create your new account</h1>
				<h3>Please fill in all information</h3>
				<div>
				First Name		<input type="text" name="firstName" />
				<br />
				Last Name		<input type="text" name="lastName" />
				<br />
				Email Address		<input type="email" name="email" />
				<br />
				Phone Number		<input type="number" name="telNumber" />
				<br />
				SIN		<input type="number" name="sinNumber" />
				<br />
				Password		<input type="password" name="password" />
				<br />
				<br />
				<input type="submit" value = "Submit to Database"/>
				</div>
			</form>
		<br />
		<br />
	</div>
	</body>
</html>
