<?php
/**
 * This class represents an user with certain properties
 * Class User
 */
class User {

    private $userid;
    private $pagelink;
    private $username;
    private $password;
    private $firstname;
    private $lastname;
    private $email;


    public function __construct($user) {
        // Load all found values into their respective fields
        foreach($user as $key => $value) {
            if(isset($value) || $value || $value != '') {
                $this->$key = $value;
            }
            else {
                $this->$key = false;
            }
        }

        // Set a pagelink if none is provided
        if(!isset($user['pagelink']) || !$user['pagelink'] || $user['pagelink'] == '') {
            $this->pagelink = generateRandom(7, QueryManager::getInstance()->getUserLinks());
        }
        else {
            $this->pagelink = $user['pagelink'];
        }
    }

    public function getName() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getPagelink() {
        return $this->pagelink;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

} 