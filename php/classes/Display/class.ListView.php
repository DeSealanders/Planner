<?php

/**
 * Subclass of a GeneralView
 * This class is responsible for displaying the DayView
 * Class MonthView
 */
class ListView extends GeneralView
{

    public function __construct($date = false, $events)
    {
        parent::__construct($date, $events);
    }

    /**
     * Returns the Html for this view
     * @return string
     */
    public function getHtml()
    {
        ob_start();
        foreach ($this->getEvents() as $event) {
            echo $this->getEventHtml($event);
        }
        return ob_get_clean();
    }

    /**
     * Returns HTML for a single event
     * @param $event
     * @return string
     */
    public function getEventHtml($event)
    {
        ob_start();
        ?>
        <li class="event-item">

            <span class="toolbar">
                <a href="add.php?event=<?php echo $event->getId(); ?>">
                    <span class="edit entypo-pencil"></span>
                </a>
                <a href="delete.php?event=<?php echo $event->getId(); ?>">
                    <span class="delete entypo-cancel"></span>
                </a>
            </span>

            <span class="event-name"><?php echo $event->getName(); ?></span>

            <span class="event-location"><span class="entypo-location event-icon"></span>
                <?php echo $event->getLocation(); ?>
            </span>

            <div class="pull-right">
                <span class="event-date">
                    <span class="entypo-calendar event-icon"></span><?php echo $event->getStartDate(); ?> - <?php echo $event->getEndDate(); ?>
                    <span class="grid-only whiteline"></span>
                    <span class="list-only list-seperator"></span>
                    <span class="entypo-clock event-icon"></span><?php echo $event->getStartTime(); ?> - <?php echo $event->getEndTime(); ?>
                </span>


                <span class="event-description grid-only">
                    <span class="entypo-info event-icon"></span><?php echo $event->getDescription(); ?>
                </span>


            </div>

        </li>
        <?php
        return ob_get_clean();
    }

} 