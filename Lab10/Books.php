<?php
require ("Header.php");
require ("Menu.php");
require ("Footer.php");
?>

<html>
<head>
<title>Books with XML</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="content">
		<h1>Books' information with XML</h1>
		<?php
		// file_get_contents is a function build into the php runtime
		// it goes to the url and downloads the content of the web page
		// in this case it is downloading the contents of BankNews.xml
		$xml = file_get_contents ( "http://www.rejaul.com/CST8238/Lab10/Books.xml" );
		
		// create a new DOM document object
		// the dom document object has a number of methods to get information from your
		// xml document
		$xmlDoc = new DOMDocument ();
		$xmlDoc->loadXML ( $xml );
		
		// get the channel element of the xml sheet
		$catalog = $xmlDoc->getElementsByTagName ( 'catalog' );
		$bookNum = 1;
		echo "<table border=1>";
		echo "<tr>";
		echo "<th>BOOK #</th> <th>Author</th> <th>Title</th> <th>Genre</th> <th>Price($)</th>
					<th>Publish Date</th> <th>Description</th>";
		echo "</tr>";
		// get the information out of the channel
		// obviously, this loop will only run once
		foreach ( $catalog as $currentCatalog ) {
			// get all the nodes from the channel
			foreach ( $currentCatalog->childNodes as $node ) {
				// echo "<tr>";
				if ($node->nodeName == "book") {
					echo "<tr>";
					echo "<td>Book #" . $bookNum . "</td>";
					foreach ( $node->childNodes as $bookNode ) {
						if ($bookNode->nodeName == 'author')
							echo "<td>" . $bookNode->nodeValue . "</td>";
						if ($bookNode->nodeName == 'title')
							echo "<td>" . $bookNode->nodeValue . "</td>";
						if ($bookNode->nodeName == 'genre')
							echo "<td>" . $bookNode->nodeValue . "</td>";
						if ($bookNode->nodeName == 'price')
							echo "<td>" . $bookNode->nodeValue . "</td>";
						if ($bookNode->nodeName == 'publish_date')
							echo "<td>" . $bookNode->nodeValue . "</td>";
						if ($bookNode->nodeName == 'description')
							echo "<td>" . $bookNode->nodeValue . "</td>";
					}
					echo "</tr>";
					$bookNum ++;
				} // end of if statement
			} // end of second foreach
		} // end of first foreach
		echo "</table>";
		?>
		</div>
</body>
</html>