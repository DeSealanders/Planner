<?php

class Event {

    private $id;
    private $name;
    private $description;
    private $location;
    private $start;
    private $end;
    private $userid;

    public function __construct($event) {
        // Load all found values into their respective fields
        foreach($event as $key => $value) {
            if(isset($value) || $value || $value != '') {
                $this->$key = $value;
            }
            else {
                $this->$key = false;
            }
        }

        // Set an id if none is provided
        if(!isset($event['id']) || !$event['id'] || $event['id'] == '') {
            $this->id = generateRandom(10, QueryManager::getInstance()->getEventIds());
        }
        else {
            $this->id = $event['id'];
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function getStartDate() {
        return $this->formatToDate($this->start);
    }

    public function getStartTime() {
        return $this->formatToTime($this->start);
    }

    public function getEndDate() {
        return $this->formatToDate($this->end);
    }

    public function getEndTime() {
        return $this->formatToTime($this->end);
    }

    private function formatToTime($datetime) {
        return(date('g:i', strtotime($datetime)));
    }

    private function formatToDate($datetime) {
        return(date('d-m-Y', strtotime($datetime)));
    }

} 