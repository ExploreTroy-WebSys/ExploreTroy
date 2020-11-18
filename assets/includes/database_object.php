<?php

class Database {
    // PDO connect object
    private $db;

    // Constructor defaults to connecting to ExploreTroy database
    public function __construct($db_t_hostname="mysql:host=localhost;dbname=websys_final", $db_username="websys_user", $db_password="websys_password") {
        try {
            $this->db = new PDO($db_t_hostname, $db_username, $db_password);
        } catch(PDOException $e) {
            // echo "Connection to database failed";
        }
    }

    // Function used for queries which are expected to return information (SELECT, SHOW, ...)
    // The function will return a JSON object which includes the relevant information for a query
    public function getQuery($query, $param_array=null) {
        // Output array which will be JSON encoded
        $output = array();
    
        // Try to execute the statement on the Database
        try {
            $query = $this->db->prepare($query);
            $queryRes = $query->execute($param_array);
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            // echo $e;
        }
    
        // Iterate over results, parse, sanatize, and add to $output
        foreach ($query as $row) {
            $tmp_out = array();
        
            // Iterate over element in a given row response
            foreach ($row as $key => $val) {
                // Remove duplicate rows with numeric keys
                if (!is_numeric($key)) {
                    $tmp_out[$key] = $val;
                }
            }
            $output[] = $tmp_out;
        }
    
        // If nothing was returned, return false
        if (empty($output)) {
            return false;
        }
    
        // Return the JSON interpretation of the user information
        return json_encode($output);
    }

    // Fucntion used for queries which are not expected to return informtion (INSERT, UPDATE, ALTER, DELETE, ...)
    public function postQuery($query, $param_array=null) {
        // Try to execute the query on the database
        // Return true if the query execute successfully
        try {
            $query = $this->db->prepare($query);
            $queryRes = $query->execute($param_array);
            return true;
        }
        // Return false if the query doesn't work
        catch(PDOException $e) {
            return false;
        }
    }
}

?>