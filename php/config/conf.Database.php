<?php
/**
 * This class is the config file for the database
 */
class DatabaseConfig {

    public function __construct() {
    }

    /**
     * Return database details on basis of host location
     * @return array database details
     */
    public function getDbDetails() {
        if(isLive()) {
            return $this->getLiveDetails();
        }
        else {
            return $this->getLocalDetails();
        }
    }

    private function getLocalDetails() {
        return array(
            'username' => 'root',
            'password' => 'usbw',
            'database' => 'planner',
            'address' => 'localhost'
            );
    }

    private function getLiveDetails() {
        return array(
            'password' => 'LR5NoHh7',
            'username' => 'tonpeter_planner',
            'database' => 'tonpeter_planner',
            'address' => 'localhost'
            );
    }
}