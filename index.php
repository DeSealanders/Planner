<?php include_once("header.php"); ?>

    <div class="story-wrapper">
        <?php
        // Load the eventmanager and request all events
        $eventManager = EventManager::getInstance();
        EventFactory::getInstance();
        foreach ($eventManager->getEvents() as $event) {
            ?>
            <div class="story">
                <div class="story-image"><img src="http://placehold.it/500x500"></div>
                <div class="story-title"><?php echo $event->getName(); ?></div>
                <div class="story-date"><?php echo $event->getStartDate(); ?></div>
                <div class="story-desc"><?php echo $event->getDescription(); ?></div>
            </div>
        <?php
        }
        ?>

    </div>
<?php include_once("footer.php"); ?>