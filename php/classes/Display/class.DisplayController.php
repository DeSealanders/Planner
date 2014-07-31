<?php
/**
 * This class is responsible for calling the required view
 * It also provides each view with the data they require
 * Class DisplayController
 */
class DisplayController {

    private $eventManager;

    private function __construct() {
        $this->eventManager = EventManager::getInstance();
        date_default_timezone_set('utc');
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return EventFactory
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new DisplayController();
        }
        return $instance;
    }

    /**
     * Retrieve events for a day and render the view
     * @param $date specified date to render
     */
    public function renderDay($date) {
        $dayView = new DayView($date, $this->getEvents($date, 'day'));
        echo $dayView->getHtml();
    }


    /**
     * Retrieve events for a month and render the view
     * @param $date specified date within the month to render
     */
    public function renderMonth($date) {
        $monthView = new MonthView($date, $this->getEvents($date, 'month'));
        echo $monthView->getHtml();
    }


    /**
     * Retrieve events for a year and render the view
     * @param $date specified date within the year to render
     */
    public function renderYear($date) {
        $yearView = new YearView($date, $this->getEvents($date, 'year'));
        echo $yearView->getHtml();
    }


    /**
     * Retrieve events for a year and render the view
     * @param $date specified date within the year to render
     */
    public function renderList() {
        $yearView = new ListView(false, $this->getEvents(false, 'list'));
        echo $yearView->getHtml();
    }

    /**
     * Retrieve events based on a period
     * A period is created from the type and a datum within that period
     * E.g. MonthView + 05-07-2014 will result in: 01-07-2014 00:00 through 01-08-2014 00:00
     * @param $date date which falls in the period
     * @param $type type of view (day, month or year)
     * @return mixed returns the events within the specified period
     * @throws Exception
     */
    private function getEvents($date, $type) {
        if($type == 'day') {
            $period = array(
                date('Y-m-d H:i', strtotime($date)),
                date('Y-m-d H:i', (strtotime($date . '+1 day')))
            );
            return $this->eventManager->getEvents($period);
        }
        else if($type == 'month') {
            $period = array(
                date('Y-m-01 H:i', strtotime($date)),
                date('Y-m-01 H:i', (strtotime($date . '+1 month')))
            );
            return $this->eventManager->getEvents($period);
        }
        else if($type == 'year') {
            $period = array(
                date('Y-01-01 H:i', strtotime($date)),
                date('Y-01-01 H:i', (strtotime($date . '+1 year')))
            );
            return $this->eventManager->getEvents($period);
        }
        else if($type == 'list') {
            return $this->eventManager->getEvents();
        }
        else {
            Throw new Exception('Unknown calendar view called');
        }
    }

} 