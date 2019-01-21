<html>
	<head>
		<title>
			XML Example using the DOM
		</title>
	</head>
	
	<body>
		<h1>XML Example using the DOM</h1>
		<?php 
			// file_get_contents is a function build into the php runtime
			// it goes to the url and downloads the content of the web page
			// in this case it is downloading the contents of BankNews.xml
			$xml = file_get_contents("http://playdoh.algonquincollege.com/courses/CST8238/BankNews.xml");

			// create a new DOM document object
			// the dom document object has a number of methods to get information from your
			// xml document
			$xmlDoc = new DOMDocument();
			$xmlDoc->loadXML($xml); 
			
			// get the channel element of the xml sheet
			$channel = $xmlDoc->getElementsByTagName('channel');

			// get the information out of the channel
			// obviously, this loop will only run once			
			foreach($channel as $currentChannel)
			{
				// get all the nodes from the channel
				foreach($currentChannel->childNodes as $node)
				{
					// if the node found is the title... print it
					if ($node->nodeName == "title")        
						echo "<h2>Title</h2>".$node->nodeValue; 

					// etc...
					if ($node->nodeName == "description") 				
						echo "<h2>Description</h2>".$node->nodeValue;
						
					// etc...
					if ($node->nodeName == "link")        
						echo "<h2>Link</h2>".$node->nodeValue."<br /><br />";  
						 
					// if we have found an news item                 
					if ($node->nodeName == "item") 
	                {
	                	// get all the child nodes that belong to the item
                        foreach($node->childNodes as $itemNode)
                        {
                        	// if the node is the title.. print it
                            if ($itemNode->nodeName=='title')
                                echo "<h4>Article Title</h4>".$itemNode->nodeValue;

                            // etc...
                            if ($itemNode->nodeName=='description')
                                echo "<h4>Article Description</h4>".$itemNode->nodeValue;

                            // etc...
                            if ($itemNode->nodeName=='link')
                                echo "<h4>Article Link</h4><a href=\"".$itemNode->nodeValue."\">VISIT ARTICLE</a>";
                        }
                        
                        echo "<hr />";
					}	
				}			
			}					
		?>
	</body>
</html>