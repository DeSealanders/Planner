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
	<?php
	$test = new Test();
	// $test->helloWorld();
	$db = DatabaseManager::getInstance();
	?>


	<div class="actions">
		<button type="button" data-type="grid"><span class="entypo-layout"></span> Grid View</button>
		<button type="button" data-type="list"><span class="entypo-list"></span> List View</button>
	</div>

	<div class="story-wrapper">
		<?php 
// Create a loop with dummy objects
		for ($i=0; $i < 10; $i++) { 
	# code...
			?>
			<div class="story">
				<div class="story-image"><img src="http://placehold.it/500x500"></div>
				<div class="story-title">That sure does look complicated.</div>
				<div class="story-desc">Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur.</div>
			</div>
			<?php
		} 
		?>

	</div>
</body>
</html>