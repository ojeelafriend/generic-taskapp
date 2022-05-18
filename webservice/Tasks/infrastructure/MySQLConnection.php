<?php

    function connect($hostname, $username, $password, $database){
        $mysqli = new mysqli($hostname, $username, $password, $database);

        if($mysqli->connect_errno){
            echo "Failed to connect a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        echo $mysqli->host_info . "\n";

        return $mysqli;
    }

    function disconnect(\mysqli $mysqli){
        mysqli_close($mysqli);
    }

?>