<?php

class IcsExporter {

    private $format;

    private function __construct() {
        $this->format = 'Ymd\THis';
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new IcsExporter();
        }
        return $instance;
    }

    public function getIcs() {
        $content = "BEGIN:VCALENDAR\n";
        $content .= "METHOD:PUBLISH\n";
        $content .= "VERSION:2.0\n";
        $content .= "PRODID:-//De Sealanders//Planner//NL\n";
        foreach(EventManager::getInstance()->getEvents() as $event) {
            $content .= "BEGIN:VEVENT" . "\n";
            $content .= "SUMMARY:" . $event->getName() . "\n";
            $content .= "DESCRIPTION:" . $event->getDescription() . "\n";
            $content .= "UID:" . $event->getId() . "\n";
            $content .= "STATUS:CONFIRMED" . "\n";
            $content .= "DTSTART:" . $event->getStart($this->format) . "\n";
            $content .= "DTEND:" . $event->getEnd($this->format) . "\n";
            $content .= "LOCATION:"  . $event->getLocation() . "\n";
            $content .= "END:VEVENT" . "\n";
        }
        $content .= "END:VCALENDAR";
        return $this->getFile($content);
    }

    private function getFile($content) {
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: inline; filename=calendar.ics');
        echo $content;
    }

} 