<?php

class Event {

    private $id;
    private $name;
    private $description;
    private $startDate;
    private $endDate;
    private $image;
    private $userid;

    public function __construct($id = false, $name, $description, $startDate, $endDate = false, $image = false, $userid) {
        // Set an id if none is provided
        if(!$id) {
            $this->id = uniqid('', true);
        }
        else {
            $this->id = $id;
        }
        $this->name = $name;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->image = $image;
        $this->userid = $userid;
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

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function getImage() {
        return $this->image;
    }

    public function getUserid() {
        return $this->userid;
    }

} 