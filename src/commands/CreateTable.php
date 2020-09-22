<?php

$db = "CREATE DATABASE staff_data";
$createdb = $conn->prepare($db);
$createdb->execute();

$bluesky = "CREATE TABLE staff_data.bluesky (
    FIRST_NAME VARCHAR(100) NOT NULL,
    LAST_NAME VARCHAR(100) NOT NULL
    )";
$createTableAction = $conn->prepare($bluesky);
$createTableAction->execute();

if (! $createTableAction) {
    $io->error("Create table failed: " . mysql_error);
} else {
    $io->success('Created table Bluesky successfully!');
}
