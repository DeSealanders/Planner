<?php
/**
 * Subclass of a GeneralView
 * This class is responsible for displaying the MonthView
 * Class MonthView
 */
class MonthView extends GeneralView {

    public function __construct($date, $events) {
        parent::__construct($date, $events);
    }

    /**
     * Outputs HTML for a whole month
     * @return string
     */
    public function getHtml() {
        ob_start();
        echo '<h1>' . $this->getDate('F') . ' ' . $this->getDate('Y') . '</h1>';

        // Loop through all days of the month
        for($day=1; $day<=getAmountOfDaysInMonth($this->getDate()); $day++) {
            $dayDate = date('d-m-Y', strtotime($day . '-' . $this->getDate('m-Y')));

            // Link events to the days they belong to
            $dayEvents = array();
            foreach($this->getEvents() as $event) {
                if(date('d-m-Y',strtotime($event->getStartDate())) == $dayDate) {
                    $dayEvents[] = $event;
                }
            }

            // Render a single day
            $this->getDayHtml($day, $dayEvents);
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

    /**
     * Renders HTML for one single day
     * @param $day the day to render
     * @param $events the events which take place on that day
     */
    private function getDayHtml($day, $events) {
        ?>
        <div class="day">
            <h3>Dag <?php echo $day; ?></h3>
            <?php
            if(!empty($events)) {
                echo '<ul>';
                foreach($events as $event) {
                    echo $this->getEventHtml($event);
                }
                echo '</ul>';
            }
            ?>
            <p>-</p>
        </div>
        <?php
    }

} 