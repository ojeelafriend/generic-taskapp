<?php
    function connect($hostname, $username, $password, $database){
        return new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    }
?>