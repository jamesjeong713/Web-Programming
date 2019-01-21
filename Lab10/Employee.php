<?php
require ("Header.php");
require ("Menu.php");
require ("Footer.php");
require ("MySQLConnectionInfo.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Lab10 - Droplist</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
<script>
		function showEmployee(str) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  }
		  
		  xmlhttp=new XMLHttpRequest();
		  
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("txtHint").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","GetEmployee.php?q="+str,true);
		  xmlhttp.send();
		}
		</script>
</head>

<body>
	<div id="content">
		<form>
			<select name="Employee" onchange="showEmployee(this.value)">

				<option value="">Select an Employee:</option>
				<option value="0">james jeong</option>
				<option value="1">seongyeop jeong</option>
				<option value="2">sandra maria</option>
				<option value="3">johh dobbie</option>
				<option value="4">kevin lai</option>
				<option value="5">xigyi wu</option>

			</select>
		</form>
		<div id="txtHint">
			<b>Detailed Employee information will be listed here...</b>
		</div>
	</div>
</body>
</html>


