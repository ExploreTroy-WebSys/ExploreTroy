<?php 



// var_dump(array_keys($_GET));


if (in_array("authenticated", array_keys($_GET))) {
    echo ("Authenticated");
} else if (in_array("newUser", array_keys($_GET))) {
    echo ("We have a new year here babys");
} else {
    echo ("nothing here");
}

?>