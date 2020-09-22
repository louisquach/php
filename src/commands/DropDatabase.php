<?php

//DROP TABLE
$dropTableCommand = 'DROP TABLE staff_data.bluesky';
$dropTableAction = $conn->prepare($dropTableCommand);
$dropTableAction->execute();

$dropDb = 'DROP DATABASE staff_data';
$dropDBAction = $conn->prepare($dropDb);
$dropDBAction->execute();

if ($dropDBAction) {
    $io->success('Dropped database successfully!');
}