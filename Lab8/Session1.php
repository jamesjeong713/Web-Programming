<?php
require ("Header.php");
require ("Menu.php");
require ("Footer.php");
?>

<html>
<head>
<title>Session-1</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
        
	<div id="content">
	
	<?php
	
	session_start ();
	
	if (isset ( $_POST ["submit"] )) {
		
		$_SESSION ["firstName"] = $_POST ["firstName"];
		$_SESSION ["lastName"] = $_POST ["lastName"];
		$_SESSION ["telephoneNumber"] = $_POST ["telephoneNumber"];
		$_SESSION ["email"] = $_POST ["email"];
		$_SESSION ["birthDay"] = $_POST ["birthDay"];
		
		header ( "Location: http://149.56.204.160/~oceanpla/CST8238/Lab8/Session2.php" );
		exit ();
	}	
	else if (isset ( $_POST ['Reset'] ))
	{
		$_SESSION ["firstName"] = " ";
		$_SESSION ["lastName"] = " ";
		$_SESSION ["telephoneNumber"] = " ";
		$_SESSION ["email"] = " ";
		$_SESSION ["birthDay"] = " ";
	}
	?>
		<form method="post" action="Session2.php">
			<fieldset>
				<legend><h3>Personal information</h3></legend>
					First Name <br />
					<input type="text" name="firstName"> <br />
				
					Last Name <br />
					<input type="text" name="lastName"> <br />

					Telephone Number <br />
					<input type="number" name="telephoneNumber"> <br />

					Email <br />
					<input type="email" name="email"> <br />

					Birth day <br />
					<input type="date" name="birthDay"> <br />
			</fieldset>
			<br />
			<fieldset>
				<legend><h3>Profession</h3></legend>
					<input type="radio" name="radioJob" value="student">Student<br /> 
					<input type="radio" name="radioJob" value="doctor">Doctor<br /> 
					<input type="radio" name="radioJob" value="farmer">Farmer<br />
					<input type="radio" name="radioJob" value="farmer">Engineer<br />
			</fieldset>
			<?php
			if (isset ( $_POST ['Submit'] ))
			{
				$profession = null;
				if(!empty($_POST['radioJob']))
				{
					$profession=$_POST['radioJob'];
					//echo $profession;
				}
			}
			else if (isset ( $_POST ['Reset'] ))
			{
			  $profession = " ";
			}
			echo '<div class="ar">
					<label for="profession"><span>Occupation: '.$profession.'</span></label><br>
				 </div>';
			?>
			<br />
			<fieldset>
				<legend><h3>Favorite Sports</h3></legend>
				<select name="selectSports" multiple="multiple">
					<option value="hockey">Hockey</option>
					<option value="football">Football</option>
					<option value="carling">Carling</option>
					<option value="tennis">Tennis</option>
				</select>
			</fieldset>
			<?php
			if (isset ( $_POST ['Submit'] ))
			{
				$sports = null;
				if(!empty($_POST['sports']))
				{
					$sports=$_POST['sports'];
					//echo $sports;
				}
			}
			else if (isset ( $_POST ['Reset'] ))
			{
			  $sports = null;
			}
			echo '<div class="ar">
					<label for="sports"><span>Sports: '.$sports.'</span></label><br>
				 </div>';
			?>
			<br />
			<br />
			<input type="submit" name="Submit" value = "Submit"/>
			<input type="reset" name="Reset" value="Reset" />
		</form>
	</div>				

		 
	</body>
</html>