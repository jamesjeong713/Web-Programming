<?php
include "header.php";
require "db_config.php";
$error = "";
?>

<div id="content" class="clearfix">

	<div class="main">
	<?php
	
	$query = "SELECT * FROM mailingList;";
	$result = mysqli_query ( $conn, $query );
	
	echo "<h1>Mailing List</h1><br/>";
	echo "<table align='center' cellspacing ='0' border ='1' cellpadding=1 width='100%'>";
	echo "<tr>";
	echo "<th>Full Name</th>";
	echo "<th>Email Address</th>";
	echo "<th>Email Hash</th>";
	echo "<th>Phone</th>";
	echo "</tr>";
	
	if (mysqli_num_rows ( $result ) > 0) {
		
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			echo "<tr>";
			echo "<td>" . $row ["firstName"] . " " . $row ["lastName"] . "</td>";
			echo "<td>" . $row ["emailAddress"] . "</td>";
			echo "<td>" . $row ["emailHash"] . "</td>";
			echo "<td>" . $row ["phoneNumber"] . "</td>";
			echo "</tr>";
		}
	} 
	echo "</table>";
	mysqli_close ( $conn );
	
	?>
	
	</div>

</div>

<?php include ("footer.php")?>