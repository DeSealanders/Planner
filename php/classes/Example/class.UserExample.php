<?php

class UserExample {


    public function __construct() {

    }

    public function createUser($userid = 1337) {
        $userarray =
            array(
                'userid' => $userid,
                'pagelink' => false,
                'username' => 'test',
                'password' => 'pass',
                'firstname' => 'test',
                'lastname' => 'dummy',
                'email' => 'test@dummy.com');
        UserFactory::getInstance()->addUser($userarray);
        echo '<h2>creating user</h2>';
        var_dump($userarray);
    }

    public function editUser($userid) {
        $userarray =
            array(
                'userid' => $userid,
                'pagelink' => 'blabla',
                'username' => 'henkdetank',
                'password' => 'ikbensterk',
                'firstname' => 'henk',
                'lastname' => 'tank',
                'email' => 'henk@tank.de');
        UserFactory::getInstance()->editUser($userarray);
        echo '<h2>editing user</h2>';
        var_dump($userarray);
    }

    public function deleteUser($userid) {
        echo '<h2>deleting user</h2>';
        var_dump($userid);
        UserFactory::getInstance()->removeUser($userid);
    }

} 