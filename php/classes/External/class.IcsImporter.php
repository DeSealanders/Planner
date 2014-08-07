<?php

class IcsImporter {

    private function __construct() {

    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new IcsImporter();
        }
        return $instance;
    }

    /**
     * Import an .ics Ical file
     * This function converts Ical events into Planner Events
     * It does so by matching file contents to a regex
     * @param $filepath
     * @throws Exception
     */
    public function importIcs($filepath) {
        if(file_exists($filepath)) {

            // Load file contents
            $icsFile = file_get_contents($filepath);
            // Get all elements by using a regex
            $regex = "/BEGIN:VEVENT\\nSUMMARY:(.*)\\nDESCRIPTION:(.*)\\nUID:(.*)\\nSTATUS:(.*)\\nDTSTART(;.*)?:(.*)\\nDTEND(;.*)?:(.*)\\nLOCATION:(.*)\\nEND:(.*)/m";
            preg_match_all($regex, $icsFile, $matches);
            if(!empty($matches[1])) {

                // Convert the regex output to a formatted array
                $eventArray = array();
                for($i=0; $i < count($matches[1]); $i++) {
                    for($j=1; $j < count($matches)-1; $j++) {
                        $eventArray[$i][] = $matches[$j][$i];
                    }
                }

                // Convert the formated array to events
                return $this->arrayToEvents($eventArray);
            }
            else {
                echo 'Invalid .ics structure';
            }
        }
        else {
            Throw new Exception('No valid file provided');
        }
    }

    private function arrayToEvents($eventArray) {
        $eventList = array();
        foreach($eventArray as $eventElement) {

            // Create an array based on the regex matches
            $event = array(
                'id' => $eventElement[2],
                'name' => $eventElement[0],
                'description' => $eventElement[1],
                'location' => $eventElement[8],
                'start' => $eventElement[5],
                'end' => $eventElement[7],
                'userid' => UserManager::getInstance()->getCurrentUser()->getUserId()
            );

            // Add all events to the database and the EventManager
            $eventList[] = EventFactory::getInstance()->addEvent($event);
        }
        return $eventList;
    }

} 