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
        echo $this->name;
        echo '<br />';
        echo $this->id;
        echo '<br />';
        echo $this->name;
        echo '<br />';
        echo $this->description;
        echo '<br />';
        echo $this->location;
        echo '<br />';
        echo $this->start;
        echo '<br />';
        echo $this->end;
        echo '<br />';
        echo $this->userid;
        return ob_get_clean();
    }


    /**
     * Override get function
     * @param $var
     * @return mixed|string
     */
    public function __get($var) {
        if($this->event) {
            return call_user_func(array($this->event, 'get' . $var));
        }
        else {
            return '';
        }
    }
}