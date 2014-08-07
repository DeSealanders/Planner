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
        echo '<div class="togglebox">';
        echo '<span class="toggler active" data-toggle="grid"><span class="entypo-layout"></span></span>';
        echo '<span class="toggler" data-toggle="list"><span class="entypo-list"></span></span>';
        echo '</div><ul class="events grid">';
        foreach ($this->getEvents() as $event) {
            echo $this->getEventHtml($event);
        }
        return ob_get_clean();
        echo '</ul>';
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



            <span class="toolbar pull-right">
                <a href="add.php?event=<?php echo $event->getId(); ?>">
                    <span class="edit entypo-tools"></span>
                </a>
                <a href="delete.php?event=<?php echo $event->getId(); ?>">
                    <span class="delete entypo-trash deletenew"></span>
                </a>
            </span>

            <span class="event-name"><a href="event-details.php?event=<?php echo $event->getId(); ?>"><?php echo $event->getName(); ?></a></span>

            <span class="event-location"><span class="entypo-location event-icon"></span>
                <?php echo $event->getLocation(); ?>
            </span>

<!--            <a href="#delete" class="deletenew">Delete</a>-->

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