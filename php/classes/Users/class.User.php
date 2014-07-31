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
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getUserName() {
        return $this->username;
    }

    public function getName() {
        return $this->firstname . ' ' . $this->lastname;
    }

} 