<?php

/**
 * Magic function called whenever an unkown class is to be loaded
 * @param $className
 */
function __autoload($className)
{
    // Filepaths to search for classes
    $filepaths = array(
        'php/classes/class.' . $className . '.php',
        'php/funtions/func.' . $className . '.php',
        'php/config/conf.' . $className . '.php',
        // Also check for classname - 6 characters (e.g. databaseconfig = database)
        'php/config/conf.' . substr($className, 0, strlen($className)-6) . '.php'
    );
    foreach ($filepaths as $filepath) {
        if (file_exists($filepath)) {
            include $filepath;
            break;
        }
    }
}

/**
 * Check if live or local by ip
 * @return bool true if live, false of local
 */
function isLive()
{
    if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
        return false;
    }
    return true;
}