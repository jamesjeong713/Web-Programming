<?php
include ("Header.php");
include ("Menu.php");
include ("Footer.php");
?>

<html>
<head>
<title>Currency</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="content">
		<form action="Currency.php" method="post">
			<fieldset>
				<legend>
					<h1>Currency Conversion</h1>
				</legend>
				Convert: <input type='text' name='amount_input'>
        		<select name='basecurr'>
  				<option value='CAD'>Canadian Dollar</option>
  				<option value='NZD'>New Zealand Dollar</option>
  				<option value='USD'>US Dollar</option>
				</select>
   				<em>to</em>
      			<select name='destcurr'> 
  				<option value='CAD'>Canadian Dollar</option>
  				<option value='NZD'>New Zealand Dollar</option>
  				<option value='USD'>US Dollar</option>
				</select>

				<input type="Submit" name="Submit" value="Convert" /> 
				<input type="Reset" name="Reset Form" value="Reset Values" /> <br />
				<br />
				<?php
				$currencies = array("CAD" => "Canadian Dollar",
						"NZD" => "New Zealand Dollar",
						"USD" => "US Dollar");
				
				$rates = array("CAD" => 0.97645,
						"NZD" => 1.20642,
						"USD" => 1.26837);
				
				if(isset($_POST['Submit']))
				{
					$converted_output = $_POST["amount_input"]/$rates[$_POST["basecurr"]] * $rates[$_POST["destcurr"]];
					echo $_POST["amount_input"]." ".$currencies[$_POST["basecurr"]]." converts to ". number_format((float)$converted_output, 2)." ".$currencies[$_POST["destcurr"]];
				}
				?>
			</fieldset>
		</form>
		<br><br><br><br><br><br>
	</div>
</body>		
</html>
	