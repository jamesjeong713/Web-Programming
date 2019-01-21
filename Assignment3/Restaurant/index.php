<?php 
include("header.php"); 
include("EventItem.php");		
?>

<div id="content" class="clearfix">
	<aside>
		<h2><?php echo date("l") . "'s"; ?> Specials</h2>
		<hr>
		<img src="images/buger.jpg" alt="Burger"
			title="Monday's Special - Burger" height="140" width="230">
		<h3>The WP Burger</h3>
		<p>Freshly made all-beef patty served up with homefries - $14</p>
		<hr>
		<img src="images/kebob.jpg" alt="Kebobs" title="WP Kebobs" height="170" width="230">
		<h3>WP Kebobs</h3>
		<p>Tender cuts of beef and chicken, served with your choice of side -
			$17</p>
		<hr>
		<h2>Private Dining</h2>
		<img src="images/private_dining.jpg" height="140" width="230" alt="Dining Room"
			title="The WP Eatery Dining Room">
		<p>Call us to find out more about our private dinning options.</p>
	</aside>
	<div class="main">
		<h1>Welcome to<font color="red"> WP</font> <font color="yellow">Eatery!</font></h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
			eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
			ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
			aliquip ex ea commodo consequat. Duis aute irure dolor in
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
			pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
			culpa qui officia deserunt mollit anim id est laborum</p>
		<h3>Upcoming Events ...</h3>
		<p>                 
      	<?php
		$event1 = new EventItem ( "St. Patty's Day Party", "Tuesday March 17, 2015", 
				"Join us for an authentic Irish four course meal, 
				complete with shepard's pie and one green beer!", "$35.00" );
		echo "<strong class=event>" . $event1->get_eventName () . "</strong><br/>";
		echo "<strong>" . "Date:" . "</strong>" . $event1->get_eventDate () . "<br/>"; 
		echo "<strong>" . "Price:" . "</strong>" . $event1->get_eventPrice () . "<br/>"; 
		echo $event1->get_eventDesc (); 			
		?>
        </p>

		<p>
      	<?php
		$event2 = new EventItem ( "Samy's Spring Fling!", "Saturday Oct 18, 2017", 
				"Join us for to kick off the beginning of spring! This
			event will include 4 of Samy's infamous appetizers and one cocktail!", "$40.00" );
		echo "<strong class=event>" . $event2->get_eventName () . "</strong><br/>";
		echo "<strong>" . "Date:" . "</strong>" . $event2->get_eventDate () . "<br/>"; 
		echo "<strong>" . "Price:" . "</strong>" . $event2->get_eventPrice () . "<br/>"; 
		echo $event2->get_eventDesc (); 			
		?>
		</p>
		<br />
		<h2><u>Book your Private Party!</u></h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
			eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
			ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
			aliquip ex ea commodo consequat. Duis aute irure dolor in
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
			pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
			culpa qui officia deserunt mollit anim id est laborum</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
			eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
			ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
			aliquip ex ea commodo consequat. Duis aute irure dolor in
			reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
			pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
			culpa qui officia deserunt mollit anim id est laborum</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
			eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
			ad minim veniam.</p>
	</div>
	<!-- End Main -->
</div>
<!-- End Content -->

<?php include("footer.php"); ?>
