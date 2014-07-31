<?php
/**
 * This class is a general view class which is extended by all other views
 * It specifies abstract methods for the subclasses to implement
 * It also offers some helper methods
 * Class GeneralView
 */
abstract class GeneralView {

    private $date;
    private $events;

    public function __construct($date, $events) {
        $this->date = date("d-m-Y", strtotime($date));
        $this->events = $events;
    }

    /**
     * Require subclasses to implement getHtml() method
     */
    abstract public function getHtml();

    /**
     * Getter for the date linked to a view
     * @param bool $format a specified format for the date
     * @return bool|string returns the date in a specified format (if given)
     */
    public function getDate($format = false) {
        if($format) {
            return date($format, strtotime($this->date));
        }
        return $this->date;
    }

    /**
     * Getter for all events linked to a view
     * @return mixed returns all events linked to a view
     */
    public function getEvents() {
        return $this->events;
    }

} 