<?php
	include("Header.php");
	include("Menu.php");
?>
<html>
  <head>
    <title>EvenOdd</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="content">
		<?php 
		for($number=99;$number>1;$number--)
		{
			if($number%2==0)
			{
				echo $number, " bottles of beer can serve even numbers of guests</br>";
			} 
			else 
			{
				echo $number, " bottles of beer can serve odd numbers of guests</br>";
			}
			        	
			if($number==2)
			{
				echo $number-1, " bottle of beer can serve ONLY ONE guest";
			}
		}
		echo "</br>";
		echo "</br>";
		echo "</br>";
		?>
    </div>
  </body>
  <?php include("Footer.php"); ?>
</html>
 