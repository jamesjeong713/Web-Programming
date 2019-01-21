<?php include "MySQLConnectionInfo.php"; ?>

<?php
$q=intval($_GET['q']);

$dbConnection = mysqli_connect ( $host, $username, $passWord, $database );
if (! $dbConnection)
	die ( "Could not connect to the database. Remember this will only run on the Playdoh server." );
mysqli_select_db ( $dbConnection, $database );

$sqlQuery = "SELECT * FROM Employee WHERE EmployeeId = '" . $q . "'";

$result = mysqli_query ( $dbConnection, $sqlQuery );
// $output = '';
$row = mysqli_fetch_array ( $result );
echo "<table border=1>
	<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email Address</th>
	<th>Phone Number</th>
	<th>SIN</th>
	<th>Password</th>		
	</tr>";
echo "<tr>";
echo "<td>" . $row ['firstName'] . "</td>";
echo "<td>" . $row ['lastName'] . "</td>";
echo "<td>" . $row ['email'] . "</td>";
echo "<td>" . $row ['telNumber'] . "</td>";
echo "<td>" . $row ['sinNumber'] . "</td>";
echo "<td>" . $row ['password'] . "</td>";
echo "</tr>";

echo "</table>";

mysqli_close ( $dbConnection );
?>  