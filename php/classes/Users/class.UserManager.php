<?php
/**
 * This class is responsible for user management
 * It retrieves the correct user by pagelink
 * Class UserManager
 */
class UserManager {

    private $user;
    private $queryManager;

    public function __construct() {
        $this->queryManager = QueryManager::getInstance();
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new UserManager();
        }
        return $instance;
    }

    public function setUser($pageLink) {
        if($user = $this->queryManager->getUserByLink($pageLink)) {
            $this->user = new User($user[0]);
        }
        else {
            $this->user = false;
        }
    }

    public function getUser() {
        return $this->user;
    }

} 