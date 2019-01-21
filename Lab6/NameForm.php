<?php
include ("Header.php");
include ("Menu.php");
?>

<html>
<head>
	<title>NameForm</title>
	<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="content">
		<form method="post" action="NameForm.php">
			<fieldset>
				<legend>Name Form</legend>
				<p>
					<label>First Name: </label>
				 	<input type="text" name="firstName">
				</p>
				<p>
				 	<label>Middle Name: </label> 
				 	<input type="text" name="middleName">
				</p>
				<p>
					<label>Last Name: </label> 	
				 	<input type="text" name="lastName">
			 	</p>
			 	<input type="Submit" name="Submit" />
			 	<input type="reset" name="Reset Form" value="Reset Form" />
					<br />
					   <?php
						if (isset ($_POST['Submit'])) 
						{
							$now_time = date("<b>h:i:s</b>");
							$set_time = "12:00:00";
							$first = $_POST['firstName'];
							$middle = $_POST['middleName'];
							$last = $_POST['lastName'];
							
							if ($first != null && $last == null && $middle == null && $now_time < $set_time) {
								echo "<h2>Good morning $first! You did not provide middle and last name.</h2>";
							} else if ($first != null && $last == null && $middle == null && $now_time >= $set_time) {
								echo "<h2>Good day $first! You did not provide middle and last name.</h2>";
							}
							if ($first != null && $last != null && $middle == null && $now_time < $set_time) {
								echo "<h2>Good morning $first! You did not provide middle name</h2>";
							} else if ($first != null && $last != null && $middle == null && $now_time >= $set_time) {
								echo "<h2>Good day $first! You did not provide middle name</h2>";
							}
							if ($first != null && $last != null && $middle != null && $now_time < $set_time) {
								echo "<h2>Good morning $first! Your middle name is very unique.</h2>";
							} else if ($first != null && $last != null && $middle != null && $now_time >= $set_time) {
								echo "<h2>Good day $first! Your middle name is very unique.</h2>";
							}
							else {
								if ($now_time < $set_time){
									echo "<h2>Good morning, Welcome to the World of PHP</h2>";
								} else {
									echo "<h2>Good day, Welcome to the World of PHP</h2>";
								} 
							}
						}
						?>
			</fieldset>
		</form>
	</div>
</body>
<?php include ("Footer.php"); ?>
</html>

