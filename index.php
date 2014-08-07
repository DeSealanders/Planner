<?php include_once("header.php"); ?>
    <?php
    if(UserManager::getInstance()->getCurrentUser()) { ?>


        <span><a href="export.php?pagelink=<?php echo $_GET['pagelink'];?>"><p>Export</p></a></span>
        <span><a href="import.php?pagelink=<?php echo $_GET['pagelink'];?>"><p>Import</p></a></span>
        <?php
        DisplayController::getInstance()->renderList();
        //DisplayController::getInstance()->renderMonth('27-07-2014');
    }
    else { ?>
        <div>
        <p>Je bent niet ingelogd<br>
            Log in door je persoonlijke link te gebruiken<br>
            Voorbeelden daarvan staan hieronder:<br>
            <p><a href="index.php?pagelink=x6fdonj">Myutd4life</a></p>
            <p><a href="index.php?pagelink=u839yk7">Baabah</a></p>
        </p>
        </div>
    <?php } ?>
<?php include_once("footer.php"); ?>
