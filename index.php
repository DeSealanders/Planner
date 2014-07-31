<?php include_once("header.php"); ?>
<span class="toggler active" data-toggle="grid"><span class="entypo-layout"></span></span>
<span class="toggler" data-toggle="list"><span class="entypo-list"></span></span>

<ul class="events grid">
    <?php
        //DisplayController::getInstance()->renderMonth('27-07-2014');
        DisplayController::getInstance()->renderList();
    ?>
<?php include_once("footer.php"); ?>
