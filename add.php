<?php include_once("header.php");
if(isset($_GET['event'])) {
    DisplayController::getInstance()->renderAddEventForm($_GET['event']);
}
else {
    DisplayController::getInstance()->renderAddEventForm();
}
include_once("footer.php"); ?>