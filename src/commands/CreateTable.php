<?php

$bluesky = "CREATE TABLE staff_data.bluesky (
            ID int NOT NULL AUTO_INCREMENT,
            FULLNAME VARCHAR(100) NOT NULL,
            EMAIL VARCHAR(100) NOT NULL,
            PHONE VARCHAR(20) NOT NULL,
            START_DAY DATE,
            PRIMARY KEY (ID) )";
                
$createTableAction = $conn->prepare($bluesky);
$createTableAction->execute();

if (! $createTableAction) {
    $io->error("Create table failed: " . mysql_error);
} else {
    $io->success('Created table Bluesky successfully!');
}
