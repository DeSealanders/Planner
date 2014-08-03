<?php
/**
 * This function is called whenever a page is loaded
 */

// Call in order to load all events from the database
EventFactory::getInstance()->loadEvents();

// If a user used their pagelink, log this user in
if(isset($_GET['pagelink'])) {
    UserManager::getInstance()->setUser($_GET['pagelink']);
}