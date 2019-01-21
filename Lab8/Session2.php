<?php
require ("Header.php");
require ("Menu.php");
require ("Footer.php");
?>

<html>
<head>
<title>Session-2</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<body>
        
	
		<div id="content">
		
		<?php
		
		session_start ();
		
		$_SESSION ["firstName"] = $_POST ["firstName"];
		$_SESSION ["lastName"] = $_POST ["lastName"];
		$_SESSION ["telephoneNumber"] = $_POST ["telephoneNumber"];
		$_SESSION ["email"] = $_POST ["email"];
		$_SESSION ["birthDay"] = $_POST ["birthDay"];		
		$_SESSION ["jobs"] = $_POST ["radioJob"];
		$_SESSION ["sports"] = $_POST ["selectSports"];
		
		//first part
		if (isset ( $_SESSION ["firstName"] )) {
			echo "<b>First Name: </b>" . $_SESSION ['firstName'];
			echo "<br />";
		} else
			echo "First name is: <br />";
		
		if (isset ( $_SESSION ["lastName"] )) {
			echo "<b>Last Name: </b>" . $_SESSION ['lastName'];
			echo "<br />";
		} else
			echo "Last name is: <br />";
		
		if (isset ( $_SESSION ["telephoneNumber"] )) {
			echo "<b>Telephone Number: </b>" . $_SESSION ['telephoneNumber'];
			echo "<br />";
		} else
			echo "Phone Number is: <br />";
		
		// second part
		if (isset ( $_SESSION ["email"] )) {
			echo "<b>Email address: </b>" . $_SESSION ['email'];
			echo "<br />";
		} else
			echo "Email address is: <br />";
		
		if (isset ( $_SESSION ["birthDay"] )) {
			echo "<b>Birth day: </b>" . $_SESSION ['birthDay'];
			echo "<br />";
		} else
			echo "Birth day is: <br />";		
		
		// third part
		if (isset ( $_POST ["radioJob"] )) {
			echo "<b>Profession: </b>" . $_SESSION ['jobs'];
			echo "<br />";
		} 
		// forth part	
		if (isset ( $_POST ["selectSports"] )) {
			$sports = $_POST ["selectSports"];
			$nSports = count ( $sports );
			for($i = 0; $i < $nSports; ++ $i) {
				$_SESSION ["sports"] .= $sports [$i];
				echo $projectChosen;
			}
			echo "<b>Favorite Sports: </b>" . $_SESSION ['sports'];
			echo "<br />";
		} 
		
		?>
		 </div>
		
	</body>
</html>