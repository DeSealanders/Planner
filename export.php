<?php

require('php/config/conf.Default.php');

// Only export when a pagelink is set
if (isset($_GET['pagelink'])) {
    IcsExporter::getInstance()->getIcs();
}
else {
    echo 'You need to be logged in first';
}

?>