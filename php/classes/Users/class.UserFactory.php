<?php

class UserFactory {

    private function __construct() {

    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return EventFactory
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new UserFactory();
        }
        return $instance;
    }

    public function addUser($user) {
        QueryManager::getInstance()->saveUser(new User($user));
    }

    public function editUser($user) {
        QueryManager::getInstance()->updateUser(new User($user));
    }

    public function removeUser($userid) {
        QueryManager::getInstance()->deleteUser($userid);
    }

} 