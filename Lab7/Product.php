<?php 
	include("Header.php");
	include("Menu.php");
	include("Footer.php");
?>
<html>
  <head>
    <title>Product.php</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="content">
	<?php
	    $Printer = array
	    (
	    		array("Brand" => "Epson","Quantity" => 100,"Price" => 2500),
	    		array("Brand" => "Canon", "Quantity" => 100, "Price" => 3000),
	    		array("Brand" => "Xerox", "Quantity" => 500, "Price" => 2000),
	    );
	    $Laptop = array
	    (
	    		array("Brand" => "Apple","Quantity" => 200,"Price" => 2000),
	    		array("Brand" => "HP", "Quantity" => 300, "Price" => 1500),
	    		array("Brand" => "Toshiba", "Quantity" => 100, "Price" => 1200),
		);
	    $TV = array
	    (
	    		array("Brand" => "Samsung","Quantity" => 500,"Price" => 1200),
	    		array("Brand" => "LG", "Quantity" => 500, "Price" => 1050),
	    		array("Brand" => "Sony", "Quantity" => 200, "Price" => 1000),
	    );
	    
	   echo "<h2>Second output</h2>";
	   
	   echo "<b><u>Printer</u></b><br/>";
	   foreach ( $Printer as $key1 => $value1) 
	   {
		   	foreach ( $value1 as $key2 => $value2 ) 
		    {
		    	echo $key2 . ": " . $value2 . "<br/>";
		    }
		    echo "<br/><br/>";
	   } 
	   echo "<b><u>Laptop</u></b><br/>";
	   foreach ( $Laptop as $key1 => $value1)
	   {
		   	foreach ( $value1 as $key2 => $value2 )
		   	{
		   		echo $key2 . ": " . $value2 . "<br/>";
		   	}
		   	echo "<br/><br/>";
	   }   
	   echo "<b><u>TV</u></b><br/>";
	   foreach ( $TV as $key1 => $value1)
	   {
		   	foreach ( $value1 as $key2 => $value2 )
		   	{
		   		echo $key2 . ": " . $value2 . "<br/>";
		   	}
		   	echo "<br/><br/>";
	   }
	   $Product = array
	   (
	   		array("Printer", 	"Epson", 	100, 2500),
	   		array(" ",	"Canon", 	100, 3000),
	   		array(" ", 	"Xerox", 	500, 2000),
	   		array("Laptop",		"Apple", 	200, 2000),
	   		array(" ", 	"HP", 		300, 1500),
	   		array(" ", 	"Toshiba", 	100, 1200),
	   		array("TV", 		"Samsung", 	500, 1200),
	   		array(" ", 		"LG", 		500, 1050),
	   		array(" ", 		"Sony", 	200, 1000),
	   );
	   
	   echo "<table border=1>";
	   echo "<tr>";
	   echo "<th> Category</th><th> Brand</th><th> Quantity</th><th> Price</th>";
	   echo "</tr>";
	   
	   foreach ( $Product as $key1 => $value1)
	   {
	   	echo "<tr>";
	   	foreach ( $value1 as $key2 => $value2)
	   	{
	   		echo "<td>" . $value2 . "</td>";
	   	}
	   	echo "</tr>";
	   }
	   echo "</table>";
	   //var_dump($Product);
	?>
    </div>
  </body>
</html>
