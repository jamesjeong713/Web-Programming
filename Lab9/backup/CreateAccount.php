<!DOCTYPE html>
<html>
	<head>
		<title>Create Account</title>
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
		<?php
			require ("Header.php");
			require ("Menu.php");
			require ("Footer.php");
			// include "MySQLMenu.php";
		?>
		<div id="content">
			<?php session_start (); ?>
			<h1>Create your new account</h1>
			<h3>Please fill in all information</h3>
			<form action="CrateAccount.php" method="post">
				First Name		<input type="text" name="firstName" />
				<br />
				Last Name		<input type="text" name="lastName" />
				<br />
				Email Address		<input type="email" name="email" />
				<br />
				Phone Number		<input type="number" name="telNumber" />
				<br />
				SIN		<input type="text" name="sinNumber" />
				<br />
				Password		<input type="text" name="password" />
				<br />
				<br />
				<input type="submit" value = "Submit to Database"/>
			</form>
		</div>
		<?php
		require "MySQLConnectionInfo.php";

		if (isset ( $_POST ["submit"] ))
		{
			$firstName = $_POST ['firstName'];
			$lastName = $_POST ['lastName'];
			$telNumber = $_POST['telNumber'];
			$email = $_POST['email'];
			$sinNumber = $_POST['sinNumber'];
			$password = $_POST['password'];

			$_SESSION ["firstName"] = $_POST ["firstName"];
			$_SESSION ["lastName"] = $_POST ["lastName"];
			$_SESSION ["email"] = $_POST ["email"];
			$_SESSION ["telNumber"] = $_POST ["telNumber"];
			$_SESSION ["sinNumber"] = $_POST ["sinNumber"];
			$_SESSION ["password"] = $_POST ["password"];
		}

		$error = "";

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
				$dbConnection = mysqli_connect($host, $username, $password, $database);

				if ($dbConnection == FALSE) {
					die("Connection failed: " . mysqli_connect_error() );
				}
				echo "Connected successfully" . "<br>";

				mysqli_select_db($dbConnection, $database);
				// $sql = "INSERT INTO Employee (firstName, lastName, email, telNumber,
				// 	sinNumber, password)
				// 	VALUES ('$fname', '$lname', '$email', '$pnum', '$sinNum', '$pass')";
				//

				$sqlQuery = "INSERT INTO Employee (firstName, lastName, email, telNumber,
					sinNumber, password)
				VALUES('".$_POST["firstName"]."', '".$_POST["lastName"]."',
				'".$_POST["email"]."', '".$_POST["telNumber"]."', '".$_POST["sinNumber"]."'
			'".$_POST["password"]."')";

				if (mysqli_query($dbConnection, $sqlQuery)) {
					echo "Person Successfully Added". "<br>";
				} else {
					echo "Person Could not be added: " . $sql . "<br>" .
					mysqli_error($dbConnection);
				}

				mysqli_close($dbConnection);

				$_SESSION ["valid_login"];
				header ( 'Location: http://wenjingwang.com/CST8238/Lab9/ViewAllEmployees.php' );
				exit ();
			}
			else
				$error = "Please enter a first and last name.";
		}

		?>
		<br />
		<br />
		<?php
			//echo $error;
		?>
	</body>
</html>
