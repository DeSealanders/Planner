<?php
require('php/config/conf.Default.php');
if(isset($_POST['action'])) {
    $action = $_POST['action'];

    // For deleting events
    if($action == 'delete') {
        if(isset($_POST['event'])) {
            $eventId = $_POST['event'];
            EventFactory::getInstance()->removeEvent($eventId);
            echo 'success';
        }
    }

    // Other actions go here
    else if($action == '') {

    }
}


function alertBoxFriendlyVarDump() {
    foreach($_POST as $key => $value) {
        echo "\n" . $key . ' => ' . $value;
    }
}