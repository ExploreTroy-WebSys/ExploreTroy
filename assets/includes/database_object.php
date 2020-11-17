<?php

class Database {
    public $db;

    public function __construct($db_t_hostname="mysql:host=localhost;dbname=websys_final", $db_username="websys_user", $db_password="websys_password") {
        try {
            $this->db = new PDO($db_t_hostname, $db_username, $db_password);
        } catch(PDOException $e) {
            throw new Exception('Database Connection Error: ' . $e->getMessage());
        }
    }

    public function getQuery($query, $param_array=null) {
        // Array which will be JSON encoded
        $output = array();
    
        try {
            $query = $this->db->prepare($query);
            $queryRes = $query->execute($param_array);
            $query = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo $e;
        }
    
        foreach ($query as $row) {
            $tmp_out = array();
        
            // Iterate over element in a given row response
            foreach ($row as $key => $val) {
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

    public function postQuery($query, $param_array=null) {
        try {
            $query = $this->db->prepare($query);
            $queryRes = $query->execute($param_array);
            return true;
        }
        catch(PDOException $e) {
            return false;
        }
    }
}

// function getQuery($query, $db_obj, $param_array=null) {
//     // Array which will be JSON encoded
//     $output = array();

//     try {
//         $query = $db_obj->prepare($query);
//         $queryRes = $query->execute($param_array);
//         $query = $query->fetchAll(PDO::FETCH_ASSOC);
//     }
//     catch(PDOException $e) {
//         echo $e;
//     }

//     foreach ($query as $row) {
//         $tmp_out = array();
    
//         // Iterate over element in a given row response
//         foreach ($row as $key => $val) {
//             if (!is_numeric($key)) {
//                 $tmp_out[$key] = $val;
//             }
//         }
//         $output[] = $tmp_out;
//     }

//     // If nothing was returned, return false
//     if (empty($output)) {
//         return false;
//     }

//     // Return the JSON interpretation of the user information
//     return json_encode($output);
// }

// function postQuery($query, $db_obj, $param_array) {
//     try {
//         $query = $db_obj->prepare($query);
//         $queryRes = $query->execute($param_array);
//         return true;
//     }
//     catch(PDOException $e) {
//         return false;
//     }
// }

?>