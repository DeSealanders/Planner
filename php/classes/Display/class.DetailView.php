<?php
/**
 * Class to show detailview of an event
 * Class DetailView
 */

class DetailView {

    private $event;

    public function __construct($event) {
        $this->event = $event;
    }


    public function getHtml()
    {
        ob_start();
        var_dump($this->event);
        return ob_get_clean();
    }
}