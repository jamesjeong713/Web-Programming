
<!DOCTYPE html>
<?php
	require "Header.php";
	require "Menu.php";
	require "Footer.php";
	require "MySQLConnectionInfo.php";
?>
<html>
	<head>
		<title>Login</title>
		<!-- <meta http-equiv="refresh" content="2;url=ViewAllEmployees.php"> -->
		<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
	</head>
	<body>
    <div id="content">
      <form action="Login.php" method="post">
				<h3>Login</h3>
				<div>
        Email Address <input type="email" name="email" value="" />
        <br />
        <br />
        Password <input type="password" name="password" value="" />
        <br />
        <br />
				<input type= "Submit" name= "Submit" value = "Login"/>
				</div>
				<?php
				session_start();

				if (isset ( $_POST ['Submit'] ))
				{
					$email = $_POST['email'];
					$password = $_POST['password'];
					// echo "test pass: " . $email . $password . "<br />";
					$dbConnection =
					mysqli_connect($host, $username, $passWord);

					if($dbConnection == FALSE)
						die("Could not connect to the database. Remember this will only run on the Playdoh server.");

					mysqli_select_db($dbConnection, $database);

					$sqlQuery = "SELECT * FROM Employee
					WHERE email='$email' && password='$password'";
					$result = mysqli_query($dbConnection, $sqlQuery);
					$rowCount = mysqli_num_rows($result);
					if($result)
					{
						if($rowCount > 0)
						{
							$row = $result->fetch_assoc();

							$_SESSION["firstName"] = $row ['firstName'];
							$_SESSION["lastName"] = $row ['lastName'];
							$_SESSION["email"] = $row['email'];
							$_SESSION["telNumber"] = $row['telNumber'];
							$_SESSION["sinNumber"] = $row['sinNumber'];
							$_SESSION["password"] = $row['password'];

						}
						else
						{
							// echo "first else test";
								echo "there is no matched information: " . mysqli_error($dbConnection);
						}
					}
					else
					{
							echo "there is no matched information: " . mysqli_error($dbConnection);
					}

					mysqli_close($dbConnection);

					$_SESSION ["valid_login"];
					// header("location: http://149.56.204.160/~oceanpla/CST8238/Lab9/ViewAllEmployees.php");
					// echo "close test2";
					header("Location: ViewAllEmployees.php");
					exit();
				}
				?>
      </form>
      <br />
      <br />
      <br />
    </div>
  </body>
</html>
