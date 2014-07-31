<?php
/**
 * Subclass of a GeneralView
 * This class is responsible for displaying the DayView
 * Class MonthView
 */
class DayView extends GeneralView {

    public function __construct($date, $events) {
        parent::__construct($date, $events);
    }

    public function getHtml() {
        //TODO create the html for the yearview
    }

} 