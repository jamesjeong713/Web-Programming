<?php
	include("Header.php");
	include("Menu.php");
?>
<html>
  <head>
    <title>All</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="content">
		<?php 
		for($number=99;$number>=1;$number--)
		{
			echo $number, " bottles of beer on wall...</br>";
			echo "You take one down you pass it around...</br>";
			echo ($number-1)," bottles of beer on the wall.</br>";
			echo "</br>";
			        	
			if($number==1)
			{
				echo"There are no more bottles of beer</br>";
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
 