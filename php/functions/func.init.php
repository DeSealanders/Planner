<?php
/**
 * This function is called whenever a page is loaded
 */


// If a user used their pagelink, log this user in
if(isset($_GET['pagelink'])) {
    UserManager::getInstance()->setUser($_GET['pagelink']);
}

// Call in order to load all events from the database
// Important: User should be loaded before loading events
EventFactory::getInstance()->loadEvents();