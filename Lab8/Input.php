<?php
require ("Header.php");
require ("Menu.php");
require ("Footer.php");
?>

<html>
<head>
<title>Input</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="content">
		<form method="post">
			<fieldset>
				<legend><h3>Personal information</h3></legend>
					<div class="al">
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
					</div>
						<?php
							if (isset ( $_POST ['Submit'] ))
							{
								$firstName = $_POST ['firstName'];
								$lastName = $_POST ['lastName'];
								$telephoneNumber = $_POST['telephoneNumber'];
								$email = $_POST['email'];
								$birthDay = $_POST['birthDay'];
							}
							else if (isset ( $_POST ['Reset'] ))
							{
								$first = " ";
								$last = " ";
								$number = " ";
								$email = " ";
								$birthDay = " ";
							}
							echo '<div class="ar">
								<label for="first"><span>First Name:'.$firstName.'</span></label><br>
								<label for="last"><span>Last Name: '.$lastName.'</span></label><br>
								<label for="number"><span>Telephone Number: '.$telephoneNumber.'</span></label><br>
								<label for="email"><span>Email: '.$email.'</span></label><br>
								<label for="bd"><span>Birthday: '.$birthDay.'</span></label><br>
							</div>';
						?>
			</fieldset>
			<br />
			<fieldset>
				<legend><h3>Profession</h3></legend>
				<div class="al">
					<input type="radio" name="radioJob" value="student">Student<br /> 
					<input type="radio" name="radioJob" value="doctor">Doctor<br /> 
					<input type="radio" name="radioJob" value="farmer">Farmer<br />
					<input type="radio" name="radioJob" value="engineer">Engineer<br />
				</div>
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
							<label for="profession"><span>Profession: '.$profession.'</span></label><br>
						 </div>';
					?>
			</fieldset>
			<br />
			<fieldset>
				<legend><h3>Favorite Sports</h3></legend>
				<div class="al">
					<select name="sports" multiple="multiple">
						<option value="hockey">Hockey</option>
						<option value="football">Football</option>
						<option value="carling">Carling</option>
						<option value="tennis">Tennis</option>
					</select>
				</div>
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
			</fieldset>
			<br />
			<br />
			<input type="Submit" name="Submit" value ="Submit" />
			<input type="Reset" name="Reset" value="Reset" />
		</form>
	</div>
	
</body>

</html>