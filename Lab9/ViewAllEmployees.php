<html xmlns="http://www.w3.org/1999/xhtml">

<?php
require "Header.php";
require "Menu.php";
require "Footer.php";
require "MySQLConnectionInfo.php";
?>

<html>
<head>
<title>ViewAllEmployees</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
		<div id="content">
		<form action="ViewAllEmployees.php" method="post">
    <?php
			session_start();
			$email = $_SESSION['email'];
			$passw = $_SESSION['password'];
			// echo "test password: " . $email . $password;
      $dbConnection = mysqli_connect($host, $username, $passWord);
			mysqli_select_db($dbConnection, $database);

			if($dbConnection == FALSE)
				die("Could not connect to the database. Remember this will only run on the Playdoh server.");

			// $sqlQuery = "SELECT * FROM Employee 
			// WHERE email='$email' && password='$passw'";
			$sqlQuery = "SELECT * FROM Employee";

			// $result = $dbConnection->query($sqlQuery);
			$result = mysqli_query($dbConnection, $sqlQuery);
			$rowCount = mysqli_num_rows($result);
// echo "test";
			if($rowCount < 1)
				echo "*** There are no rows to display from the Employee table ***" . "<br />";
			// if (!$sqlQuery)
			// {
			// 	echo "You are not logged in.", "<br />", mysqli_error($dbConnection);
			// 	header("Location: http://149.56.204.160/~oceanpla/CST8238/Lab9/login.php");
			// 	exit();
			// }
			if ($result)
			{
				// echo "if test";
				if(0<$rowCount)
				{
					// echo $rowCount . "for test";
          $row = $result->fetch_assoc();
					// echo '<div class="topdiv">';
					echo '<div>';
					echo '<h1> Session State Data </h1>';
					echo "Employee ID: " . $row["EmployeeId"] .
							"<br />" .
							"First Name: " . $row["firstName"] .
							"<br />" .
							"Last Name: " . $row["lastName"] .
							"<br />" .
							"Email: " . $row["email"] .
							"<br />" .
							"Phone #: " . $row["telNumber"] .
							"<br />" .
							"SIN: " . $row["sinNumber"] .
							"<br />" .
							"Password: " . $row["password"] .
							"<br /><br />";
					echo '</div>';

					echo '<div>';
					echo '<h1> Database Data </h1> <br />';
					echo "<table ><tr>";
					echo "<td> ID </td>" . "<td> First Name </td>" .
							 "<td> Last Name </td>" . "<td> Email Address </td>" .
							 "<td> Phone Number </td>" . "<td> SIN </td>" . "<td> Password </td>";
					// $sqlQuery = "SELECT * FROM Employee";
					$result = mysqli_query($dbConnection, $sqlQuery);
					echo "</tr></thead><tbody>";

					while($row = $result->fetch_assoc())
					{
						echo "<tr>";
						echo
						"<td>", $row["EmployeeId"], "</td>",
						"<td>", $row["firstName"], "</td>",
						"<td>", $row["lastName"], "</td>",
						"<td>", $row["email"], "</td>",
						"<td>", $row["telNumber"], "</td>",
						"<td>", $row["sinNumber"], "</td>",
						"<td>", $row["password"], "</td>";
						echo "</tr>";
					}
					echo "</tbody></table>";
					echo '</div>';
					}
			}
			else
			{
					echo "not logged in", "<br />", mysqli_error($dbConnection);
					header("location: http://149.56.204.160/~oceanpla/CST8238/Lab9/login.php");
					exit();
			}

		mysqli_close($dbConnection);
		?>
		</div>
	</body>
</html>
