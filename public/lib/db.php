<?php
/*
*   @filename: db-class.php
*   @author: Ahmad Tibin
*   @description: This file should handle all connection to the database
*   and will be instantiated by all other model classes.
*/
class Database {
    public $is_connected = FALSE;
    protected $conn = NULL;
    private $db_driver;
    private $db_host;
    private $db_username;
    private $db_password;
    private $db_name;
    private $charset;
    private $sql_error;
    /* function name: Database::Database
     * Inputs: database configurations file
     * Outputs: None
     * Side affects: loads the database configurations and connect to database.
     */
    public function __construct($filename) {
        if (is_file($filename)) {
            include $filename;
            # Config database details from the included db-config file
            $this->db_driver = $driver;
            $this->db_host = $host;
            $this->db_username = $username;
            $this->db_password = $password;
            $this->db_name = $database;
            $this->charset = $charset;
            # Now connect to the db
            $this->connect();
        } else {
            die('ERROR :(');
        }

    } // END Database Function

    /* function name: Database::connect
     * Inputs: None
     * Outputs: None
     * Side affects: Create a new database instance and connect to the database.
     */
    private function connect(){
        try {
            # Create new PDO instance
            $this->conn = new PDO("$this->db_driver:host=$this->db_host;
        dbname=$this->db_name;charset=$this->charset", $this->db_username, $this->db_password);
            # For development purposes change the default err_mode to show errors
            # When in production change it to PDO::ERRMODE_SILENT
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            # By default fetch data into objects
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            # TODO RemoveMe the previous line When in production
            $this->is_connected = TRUE;
            //echo $this->is_connected;
        } catch (PDOException $e) {

            header('Location: error.php?error_code=connect');

        }
    } // END connect Function

    public function disconnect() {
        $this->conn = NULL;
        $this->is_connected = false;
    }
    public function getConn() {
        return $this->conn;
    }
    public function getRow($query, $params = array(), $fetch_mode = PDO::FETCH_OBJ) {
        try {
            $smt = $this->conn->prepare($query);
            $smt->execute($params);
            return $smt->fetch($fetch_mode);
        } catch (PDOException $e) {
            header('Location: error.php?error_code=data_retrieval');
            echo "SQL Error: " . $e->getMessage();
        }
    }
    public function getRowsCount($query, $params = array(), $fetch_mode = PDO::FETCH_OBJ) {
        try {
            $smt = $this->conn->prepare($query);
            $smt->execute($params);
            return $smt->fetchColumn();
        } catch (PDOException $e) {
            header('Location: error.php?error_code=data_retrieval');
            echo "SQL Error: " . $e->getMessage();
        }
    }
    public function getRows($query, $params = array(), $fetch_mode = PDO::FETCH_OBJ) {
        try {
            $smt = $this->conn->prepare($query);
            $smt->execute($params);
            return $smt->fetchAll($fetch_mode);
        } catch (PDOException $e) {
            header('Location: error.php?error_code=data_retrieval');
            echo "SQL Error: " . $e->getMessage();
        }
    }

    public function insertRow($query, $params = array()) {
        try {
            $smt = $this->conn->prepare($query);
            $smt->execute($params);
            return true;
        } catch (PDOException $e) {
            header('Location: error.php?error_code=data_save&message='.$e->getMessage());
            //echo "SQL Error: " . $e->getMessage();
        }
    }

    public function updateRow($query, $params = array()) {
        return $this->insertRow($query, $params);
    }

    public function deleteRow($query, $params = array()) {
        return $this->insertRow($query, $params);
    }
    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }
}
