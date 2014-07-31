<?php

/**
 * Magic function called whenever an unkown class is to be loaded
 * @param $className
 */
function __autoload($className)
{
    // Filenames
    $fileNames = array(
        'class.' . $className . '.php',
        'func.' . $className . '.php',
        'conf.' . $className . '.php',
        'conf.' . substr($className, 0, strlen($className)-6) . '.php'

    );
    // Directories
    $filepaths = array(
        'php/classes/',
        'php/classes/Database/',
        'php/classes/Events/',
        'php/classes/Example/',
        'php/classes/Display/',
        'php/classes/Users/',
        'php/funtions/',
        'php/config/'
    );

    // Loop through all combinations of filenames and folders
    // Include all found classes
    foreach ($filepaths as $filepath) {
        foreach($fileNames as $fileName) {
            $fullPath = $filepath . $fileName;
            if (file_exists($fullPath)) {
                include $fullPath;
                break;
            }
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


function getAmountOfDaysInMonth($date) {
    return cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($date)), date('y', strtotime($date)));
}