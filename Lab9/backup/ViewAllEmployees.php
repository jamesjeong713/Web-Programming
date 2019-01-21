<!DOCTYPE html>

<?php
require "Header.php";
require "Menu.php";
require "Footer.php";
require "MySQLConnectionInfo.php";
?>

<html>
<head>
<title>ViewAllEmployees.php</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
		<div id="content">
      <form action="viewallemployees.php" method="post">
        <?php session_start(); ?>
        <?php require "MySQLConnectionInfo.php";
        $dbConnection = mysqli_connect($host, $username, $password);

        mysqli_select_db($connect, $database);
        $query = "SELECT * FROM Employee WHERE EmailAddress='$email' && Pass='$pass'";
        $result = $connect->query($query);

        if(mysqli_query($connect, $query))
        {
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();

            echo '<div class="topdiv">';
            echo '<h1> Session State Data. </h1>';
            echo "Employee ID: " . $row["EmployeeId"]. "<br>".
            " - First Name: " . $row["FirstName"]. "<br>".
            " - Last Name: " . $row["LastName"]. "<br>".
            " - Email: " . $row["EmailAddress"]. "<br>".
            " - Phone #: " . $row["TelephoneNumber"]. "<br>".
            " - SIN: " . $row["SocialInsuranceNumber"]. "<br>".
            " - Password: " . $row["Pass"]. "<br><br><br><br>";
            echo '</div>';

            echo '<div class="bottomdiv" style="text-align:center">';
            echo '<h1> Database Data. </h1><br>';
            echo "<table> <thead style='font-weight:bold'> <tr>";
            echo "<td> ID </td>",
                 "<td> FirstName </td>",
                 "<td> LastName </td>",
                 "<td> Email </td>",
                 "<td> TelephoneNumber </td>",
                 "<td> SIN </td>",
                 "<td> Password </td>";
            $query = "SELECT * FROM Employee";
            $result = $connect->query($query);
            echo "</tr></thead><tbody>";
            while($row = $result->fetch_assoc())
            {
              echo "<tr>";
              echo "<td>", $row["EmployeeId"], "</td>",
                   "<td>", $row["FirstName"], "</td>",
                   "<td>", $row["LastName"], "</td>",
                   "<td>", $row["EmailAddress"], "</td>",
                   "<td>", $row["TelephoneNumber"], "</td>",
                   "<td>", $row["SocialInsuranceNumber"], "</td>",
                   "<td>", $row["Pass"], "</td>";
              echo "</tr>";
            }
            echo "</tbody></table>";
            echo '</div>';
          }
          else
          {
              echo "You are not logged in.", "<br>", mysqli_error($connect);
              header("Location: http://wenjingwang.com/CST8238/Lab9/ViewAllEmployees.php");
              exit();
          }
        }
        else
        {
          echo "could not log in, user not found.", "<br>", mysqli_error($connect);
        }
        mysqli_close($connect);
        ?>
		 </div>

	</body>
</html>


<?php
// session_start ();
// function test_input($value) {
// 	$value = trim ( $value );
// 	$value = stripslashes ( $value );
// 	$value = htmlspecialchars ( $value );
// 	return $value;
// }
// if ($_SESSION ["valid_login"] == False) {
// 	header ( 'Location: ./Login.php' );
// }
// $host = "localhost";
// $username = "oceanpla_james_cst8238";
// $password = "james@cst@8238";
// $database = "CST8238";
// $dbConnection = mysqli_connect ( $host, $username, $password, $database );
// if ($dbConnection == FALSE) {
// 	die ( "Connection failed" . mysqli_connect_error() );
// }
// $sql = "SELECT * FROM Employee;";
// $result = mysqli_query ( $dbConnection, $sql );
// if ($result == FALSE) {
// 	die ( "Error " . $sql . "<br/>" . mysqli_error ( $dbConnection ) );
// }
// mysqli_close ( $dbConnection );
?>

<html>

<head>
<title>ViewAllEmployees.php</title>
<link rel="stylesheet" type="text/css" href="styleSheet.css" />
</head>

<body>

<?php include "Header.php"; ?>
<?php include "Menu.php"; ?>

	<div class="content">

	<?php

	echo "<h1>Session State Data</h1>";

	echo 'First Name: ' . $_SESSION ['firstName'];
	echo "<br />";
	echo 'Last Name: ' . $_SESSION ['lastName'];
	echo "<br />";
	echo 'Email Address: ' . $_SESSION ['email'];
	echo "<br />";
	echo 'Phone Number: ' . $_SESSION ['telNumber'];
	echo "<br />";
	echo 'SIN: ' . $_SESSION ['sinNumber'];
	echo "<br />";
	echo 'Password: ' . $_SESSION ['password'];
	echo "<br />";

	/*
	 * if (isset ( $_SESSION ["fname"] )) {
	 * echo "<b>First Name: </b>" . $_SESSION ['fname'];
	 * echo "<br />";
	 * } else
	 * echo "First name *** : <br />";
	 *
	 * if (isset ( $_SESSION ["lname"] )) {
	 * echo "<b>Last Name: </b>" . $_SESSION ['lname'];
	 * echo "<br />";
	 * } else
	 * echo "Last name *** : <br />";
	 *
	 * if (isset ( $_SESSION ["email"] )) {
	 * echo "<b>Email Address: </b>" . $_SESSION ['email'];
	 * echo "<br />";
	 * } else
	 * echo "Email Address *** : <br />";
	 *
	 * if (isset ( $_SESSION ["pnum"] )) {
	 * echo "<b>Phone Number: </b>" . $_SESSION ['pnum'];
	 * echo "<br />";
	 * } else
	 * echo "Phone Number *** : <br />";
	 *
	 * if (isset ( $_SESSION ["sinNum"] )) {
	 * echo "<b>SIN: </b>" . $_SESSION ['sinNum'];
	 * echo "<br />";
	 * } else
	 * echo "SIN *** : <br />";
	 *
	 * if (isset ( $_SESSION ["pass"] )) {
	 * echo "<b>Password: </b>" . $_SESSION ['pass'];
	 * echo "<br />";
	 * } else
	 * echo "Password *** : <br />";
	 */

	echo "<br/>";
	echo "<br/>";

	echo "<h1>Database Data</h1>";
	echo "<table border='1' width=100%>";
	echo "<tr>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Email Address</th>";
	echo "<th>Phone Number</th>";
	echo "<th>SIN</th>";
	echo "<th>Password</th>";
	echo "</tr>";

	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			echo "<tr>";
			echo "<td>" . $row ["FirstName"] . "</td>";
			echo "<td>" . $row ["LastName"] . "</td>";
			echo "<td>" . $row ["EmailAddress"] . "</td>";
			echo "<td>" . $row ["TeleploneNumber"] . "</td>";
			echo "<td>" . $row ["SocialInsuranceNumber"] . "</td>";
			echo "<td>" . $row ["Password"] . "</td>";
			echo "</tr>";
		}
	}

	echo "</table>";

	?>

</div>

</body>

<?php include "Footer.php"; ?>
