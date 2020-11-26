<?php

include('../../assets/includes/helperFunctions.php');

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
        $update = false;
        $usrID = checkUserOptionalExists($request['rcsid']);
        if (!array_key_exists("newUser", $request['postData']) && ($request['tableName'] == "users" || $usrID != NULL)) $update = true;

        // Fetch user ID -- Exit process if user doesn't exist in users table
        if ($request['tableName'] != 'users' && $usrID == NULL) exit("Error: Please provide your name and email address before continuing.");

        // Tag processing for user interests
        if ($request['tableName'] == 'users_interests') {
            $currentTags = array();
            $removeTags = array();
            $addTags = array();
            $query = "SELECT * FROM `users_interests` WHERE `user_id` = :usrID";
            $param_arr = array(":usrID" => $usrID);
            $resp = $db->getQuery($query, $param_arr);
            $resp = json_decode($resp, true);
            foreach ($resp as $item) {
                $currentTags[] = $item['interest'];
            }

            exit;
        }

        // Prepare insert/update statement
        if ($update) {
            $query = "UPDATE " . $request['tableName'] . " SET ";
            $param_arr = array();
            $i = 0;
            foreach ($request['postData'] as $key => $val) {
                $i++;
                $query .= "`" . $key . "` = :" . $i;
                $param_arr[":$i"] = $val;
                if ($i != sizeof($request['postData'])) $query .= ", ";
            }
            $i++;
            $query .= " WHERE `id` = :" . $i;
            $param_arr[":$i"] = $usrID;
            
        } else {
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
                    } if ($request['tableName'] != 'users') {
                        $query .= ", ";
                        $valStr .= ", ";
                        $i++;
                        $query .= "`id`";
                        $valStr .= ":" . $i;
                        $param_arr[":$i"] = $usrID;
                    }
                    $query .= ") ";
                    $valStr .= ") ";
                }
            }
            $query .= "VALUES " . $valStr;
        }

        echo $query;
        var_dump($param_arr);
        

        if ($db->postQuery($query, $param_arr)) {
            exit("Success");
        } else {
            exit("ERROR: Unable to process request");
        }
    }
}

?>
