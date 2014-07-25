<?php
/**
 * This class is used for establishing a database connection and executing queries
 */

class DatabaseManager
{

    private $connection;
    private $databaseConfig;

    private function __construct()
    {
        $this->init();
    }

    /**
     * Function for creating only 1 instance and return that each time its called (singleton)
     * @return DatabaseManager
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new DatabaseManager();
        }
        return $instance;
    }

    /**
     * Setup the database connection using the config file
     */
    private function init()
    {
        $this->databaseConfig = new DatabaseConfig();
        $dbDetails = $this->databaseConfig->getDbDetails();
        $this->connection = mysqli_connect(
            $dbDetails['address'],
            $dbDetails['username'],
            $dbDetails['password'],
            $dbDetails['database']
        );
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    /**
     * Execute a specified query
     * @param $query the query to be executed
     * @param bool $params a list of parameters for prepared statements
     * @return array|null returns the result of the query in the form of an array
     */
    private function executeQuery($query, $params = false)
    {

    }

} 