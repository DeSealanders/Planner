<?php include_once("header.php"); ?>

<?php

$userExample = new UserExample();
$eventExample = new EventExample();

echo '<h1>Users</h1>';
echo '<p>Here\'s a few user examples</p>';
$userExample->createUser('1337');
$userExample->editUser('1337');
$userExample->deleteUser('1337');

echo '<h1>Events</h1>';
echo '<p>Here\'s a few event examples</p>';
$eventExample->createEvent('123541243123');
$eventExample->editEvent('123541243123');
$eventExample->deleteEvent('123541243123');

?>


<?php include_once("footer.php"); ?>