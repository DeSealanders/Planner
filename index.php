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
	<div class="actions">
		<button type="button" data-type="grid"><span class="entypo-layout"></span> Grid View</button>
		<button type="button" data-type="list"><span class="entypo-list"></span> List View</button>
	</div>

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
</body>
</html>