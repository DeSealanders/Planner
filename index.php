<?php
require('php/config/conf.Default.php');
?>
<!DOCTYPE html>
<html>
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<script src="js/documentready.js"></script>
</head>
<body class="grid">
	<nav role="navigation">
		<span class="entypo-menu" id="toggle-menu"></span>  
		<div class="logo">Planner</div>
		
		<ul>
			<li><a href="#">About</a></li>
			<li><a href="#">Features</a></li>
			<li><a href="#">Explore</a></li>
			<li><a href="#">Support</a></li>
			<li><a href="#">Sign Up</a></li>
			<div class="actions">
				<button type="button" data-type="grid"><span class="entypo-layout"></span> Grid View</button>
				<button type="button" data-type="list"><span class="entypo-list"></span> List View</button>
			</div>
		</ul>

	</nav>  

	<div class="container">


		<div class="story-wrapper">
			<?php
        // Load the eventmanager and request all events
			$eventManager = EventManager::getInstance();
			EventFactory::getInstance();
			foreach($eventManager->getEvents() as $event) {
				?>
				<div class="story">
					<div class="story-image"><img src="http://placehold.it/500x500"></div>
					<div class="story-title"><?php echo $event->getName(); ?></div>
					<div class="story-date"><?php echo $event->getStartDate(); ?></div>
					<div class="story-desc"><?php echo $event->getDescription(); ?></div>
				</div>
				<?php
			} 
			?>

		</div>
	</div>
</body>
</html>