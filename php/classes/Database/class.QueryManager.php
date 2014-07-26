<?php

class QueryManager {

    private function __construct() {
        $this->databaseManager = DatabaseManager::getInstance();
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new QueryManager();
        }
        return $instance;
    }

    /**
     * Save a specified event
     * @param $event
     * @return array|null
     */
    public function saveEvent(Event $event) {
        $query = "INSERT INTO events (itemid, name, description, startDate, endDate, image) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array(
            $event->getId(),
            $event->getName(),
            $event->getDescription(),
            $event->getStartDate(),
            $event->getEndDate(),
            $event->getImage()
        );
        return $this->databaseManager->executeQuery($query , $params);
    }

    /**
     * Retrieve all events
     * @return array|null
     */
    public function getEvents() {
        $query = "SELECT * FROM events";
        return $this->databaseManager->executeQuery($query);
    }

} 