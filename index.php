<?php include_once("header.php"); ?>
    <?php

    if(UserManager::getInstance()->getCurrentUser()) { ?>

        <span class="toggler active" data-toggle="grid"><span class="entypo-layout"></span></span>
        <span class="toggler" data-toggle="list"><span class="entypo-list"></span></span>

        <ul class="events grid">
        <?php
        DisplayController::getInstance()->renderList();
        //DisplayController::getInstance()->renderMonth('27-07-2014');
    }
    else { ?>
        <div>
        <p>Je bent niet ingelogd<br>
            Log in door je persoonlijke link te gebruiken<br>
            Een voorbeeld daarvan staat hieronder:<br>
            <a href="index.php?pagelink=x6fdonj">index.php?pagelink=x6fdonj</a>
        </p>
        </div>
    <?php } ?>
<?php include_once("footer.php"); ?>
