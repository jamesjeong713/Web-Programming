<?php 
include("header.php"); 
require "db_config.php";
?>

<?php 


function create_password_hash($emailAddress) {
	if (function_exists('password_hash')) {	
		$emailHash = password_hash ( $emailAddress, $numAlgo, $arrOptions );
	}
	else 
	{	
		$salt = mcrypt_create_iv ( 22, MCRYPT_DEV_URANDOM );
		$salt = base64_encode ( $salt );
		$salt = str_replace ( '+', '.', $salt );
		$emailHash = crypt ( $emailAddress, '$2y$10$' . $salt . '$' );
	}
	return $emailHash;
}

function verify_password_hash($emailAddress, $emailHash)
{
	if (function_exists('password_verify')) 
	{
		$boolReturn = password_verify($emailAddress, $emailHash);
	}
	else
	{	
		$emailHash2 = crypt($emailAddress, $emailHash);
		$boolReturn = $emailHash == $emailHash2;
	}
	return $boolReturn;
}
$emailHash = create_password_hash($emailAddress);
$error = "";

if (! isset ( $_POST ["firstName"] ) || 
		! isset ( $_POST ["lastName"] ) || 
		! isset ( $_POST ["phoneNumber"] ) || 
		! isset ( $_POST ["emailAddress"] ) ||
		! isset ( $_POST ["username"] ) || 
		! isset ( $_POST ["referrer"] )) {
	$error = "Please fill all the information";
	
} else {
	if ($_POST ["firstName"] != "" && 
			$_POST ["lastName"] != "" && 
			$_POST ["phoneNumber"] != "" && 
			$_POST ["emailAddress"] != "" &&
// 			$_POST ["emailHash"] != "" &&
			$_POST ["username"] != "" && 
			$_POST ["referrer"] != "") {

		$queryForName = 'SELECT firstName FROM mailingList;';
		$result = mysqli_query ( $conn, $queryForName );
		
		$firstName = $_POST ["firstName"];
		$lastName = $_POST ["lastName"];
		$phoneNumber = $_POST ["phoneNumber"];
		$emailAddress = $_POST ["emailAddress"];
		$emailHash = $_POST ["emailHash"];
		$username = $_POST ["username"];
		$referrer = $_POST ["referrer"];
		
		$query = "SELECT count(emailAddress) FROM mailingList WHERE eamilAddress = '$emailAddress'";
		$emailCount = mysqli_query ( $conn, $query );
// 		echo "test";
		if ($emailCount<1) {
// 			echo "test";
			$insert = "INSERT INTO mailingList 
				(firstName, lastName,  phoneNumber, emailAddress, username, referrer) VALUES('"
				 . $_POST ["firstName"] . "', '" . $_POST ["lastName"] . "', '"
				 		 . $_POST ["phoneNumber"] . "', '" . $_POST ["emailAddress"] . "', '"
// 				 		. $_POST ["emailHash"] . "', '"
				 		 		 . $_POST ["username"] . "', '" . $_POST ["referrer"] . "');";
				
			if (mysqli_query ( $conn, $insert ))
				$error = "Successfully added.";
			else
				echo '<h3 style="color:red;">Email address already exist, please use another eamil address!</h3>';
		}
		
		if (verify_password_hash($emailAddress, $emailHash))
		{
			echo 'Email address is valid!';
		}
		else
		{
// 			echo 'Invalid password.';
		}
		
	} else {
		echo '<h3 style="color:red;">Please complete all the information!</h3>';
	}
	
	mysqli_close ( $conn);
}
echo $error;

// echo "secret";
// echo "<br/>";


// echo $emailHash;

// echo "<br/>";

?>

<div id="content" class="clearfix">
	<aside>
		<h2>Mailing Address</h2>
		<h3>
			1385 Woodroffe Ave<br> Ottawa, ON K4C1A4
		</h3>
		<h2>Phone Number</h2>
		<h3>(613)727-4723</h3>
		<h2>Fax Number</h2>
		<h3>(613)555-1212</h3>
		<h2>Email Address</h2>
		<h3>info@wpeatery.com</h3>
	</aside>
	<div class="main">
		<h1>Sign up for our newsletter</h1>
		<p>Please fill out the following form to be kept up to date with news,
			specials, and promotions from the WP eatery!</p>
		<form name="frmNewsletter" id="frmNewsletter" method="post">
			<table>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="firstName" id="firstName" size='40'></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lastName" id="lastName" size='40'></td>
				</tr>
				<tr>
					<td>Phone Number:</td>
					<td><input type="number" name="phoneNumber" id="phoneNumber"
						size='40'></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="email" name="emailAddress" id="emailAddress"
						size='40'>
				
				</tr>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" id="username" size='20'>
				
				</tr>
				<tr>
					<td>How did you hear<br> about us?
					</td>
					<td><select name="referrer" size="1">
							<option>Select referer</option>
							<option value="newspaper">Newspaper</option>
							<option value="radio">Radio</option>
							<option value="tv">Television</option>
							<option value="other">Other</option>
					</select></td>
				</tr>
				<tr>
					<td colspan='2'><input type='submit' name='btnSubmit'
						id='btnSubmit' value='Sign up!'>&nbsp;&nbsp;<input type='reset'
						name="btnReset" id="btnReset" value="Reset Form"></td>
				</tr>
			</table>
		</form>
	</div>
	<!-- End Main -->
</div>
<!-- End Content -->

<?php include("footer.php"); ?>
