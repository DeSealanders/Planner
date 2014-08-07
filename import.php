<?php include_once("header.php"); ?>

<?php

// Only export when a user is logged in
if (isset($_GET['pagelink'])) {
    // TODO File upload voor ics bestand
    $filepath = 'dynamic/calendar4.ics';
    $events = IcsImporter::getInstance()->importIcs($filepath);
    echo 'Imported the following events:';
    DisplayController::getInstance()->renderList($events);
}
else {
    echo 'You need to be logged in first';
}

?>
<?php include_once("footer.php"); ?>