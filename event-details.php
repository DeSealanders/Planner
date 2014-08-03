<?php include_once("header.php");
if(isset($_GET['event'])) {
    DisplayController::getInstance()->renderDetailView($_GET['event']);
}
include_once("footer.php"); ?>