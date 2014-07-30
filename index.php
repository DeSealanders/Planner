<?php include_once("header.php"); ?>
<span class="toggler active" data-toggle="grid"><span class="entypo-layout"></span></span>
<span class="toggler" data-toggle="list"><span class="entypo-list"></span></span>

<ul class="events grid">
    <?php
    // Load the eventmanager and request all events
    $eventManager = EventManager::getInstance();
    EventFactory::getInstance();
    foreach ($eventManager->getEvents() as $event) {
        ?>
        <li class="event-item">

    <span class="event-name">
      <?php echo $event->getName(); ?>
    </span>

    <span class="event-location">
      Locatie
    </span>

            <div class="pull-right">

      <span class="event-date">
        <?php echo $event->getStartDate(); ?> - <?php echo $event->getEndDate(); ?>
      </span>

       <span class="event-description grid-only">
        <?php echo $event->getDescription(); ?>
      </span>
            </div>
        </li>
    <?php
    }
    ?>
</ul>

<?php include_once("footer.php"); ?>
