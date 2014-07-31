<?php
/**
 * Subclass of a GeneralView
 * This class is responsible for displaying the DayView
 * Class MonthView
 */
class ListView extends GeneralView {

    public function __construct($date = false, $events) {
        parent::__construct($date, $events);
    }

    /**
     * Returns the Html for this view
     * @return string
     */
    public function getHtml() {
        ob_start();
        foreach($this->getEvents() as $event) {
            echo $this->getEventHtml($event);
        }
        return ob_get_clean();
    }

    /**
     * Returns HTML for a single event
     * @param $event
     * @return string
     */
    public function getEventHtml($event) {
        ob_start();
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
        return ob_get_clean();
    }

} 