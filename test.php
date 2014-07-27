<?php
require('php/config/conf.Default.php');
$example = new EventExample();

$eventId = '53d5003fb67e69.42926498';
// Below are some examples of how to call different actions
$example->createEvent($eventId);
$example->editEvent($eventId);
$example->deleteEvent($eventId);
?>