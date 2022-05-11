<?php

    try {
    	$bd = new PDO('mysql:host=localhost;dbname=id18917055_forum	;charset=utf8', 'id18917055_root', '=#z5{p+&nJ8TG%px');
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }