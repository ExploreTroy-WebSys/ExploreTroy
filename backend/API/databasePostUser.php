<?php

include('../../assets/includes/database_object.php');

// Function which checks to see if the user making a post request to the DB has an ExploreTroy account
function checkUserExists($rcsid) {
    $db = new Database();
    $query = "SELECT * FROM `users` WHERE `rcsid` = :rcsid";
    $param_arr = array(':rcsid'=>$rcsid);
    if ($db->getQuery($query, $param_arr)) {
        return true;
    } 
    return false;
}

// Function which checks whether the RCSID is a column in the table being worked with
function checkRCSIDColumn($tableName) {
    $db = new Database();
    $query = "DESCRIBE " . $tableName;
    $query = $db->getQuery($query);
    $query = json_decode($query);
    // var_dump($query);
    
    foreach ($query as $item) {
        foreach ($item as $key => $val) {
            if ($key == "Field" && $val == "rcsid") return true;
        }
    }

    return false;
}

// Post workflow
if (isset($_POST)) {
    // Read in JSON OBJ
    $rawIn = file_get_contents('php://input');
    $request = json_decode($rawIn, true);

    // Check to make sure proper keys are in JSON obj
    if (!array_key_exists("tableName", $request) || !array_key_exists("rcsid", $request) || !array_key_exists("postData", $request)) {
        exit("DEV ERROR: Failed to provide proper form data");
    } else {
        // Don't process request if no ExploreTroy account
        if (!checkUserExists($request['rcsid']) && !array_key_exists("newUser", $request['postData'])) {
            exit("ERROR: User does not exist");
        }

        // Database connection
        $db = new Database();

        // Add table checking logic for INSERT or UPDATE


        // Prepare insert statement
        $query = "INSERT INTO " . $request['tableName'] . " (";
        $valStr = '(';
        $param_arr = array();
        $i = 0;
        foreach ($request['postData'] as $key => $val) {
            $i++;
            if ($key == "newUser") continue;
            $query .= "`" . $key . "`";
            $valStr .= ":" . $i;
            $param_arr[":$i"] = $val;
            if ($i != sizeof($request['postData'])) {
                $query .= ", ";
                $valStr .= ", ";
            } else {
                if (checkRCSIDColumn($request['tableName'])) {
                    $query .= ", ";
                    $valStr .= ", ";
                    $i++;
                    $query .= "`rcsid`";
                    $valStr .= ":" . $i;
                    $param_arr[":$i"] = $request['rcsid'];
                }
                $query .= ") ";
                $valStr .= ") ";
            }
        }

        $query .= "VALUES " . $valStr;

        if ($db->postQuery($query, $param_arr)) {
            exit("Success");
        } else {
            exit("ERROR: Unable to process request");
        }
    }
}

?>
