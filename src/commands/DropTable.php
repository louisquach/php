<?php

//DELETE ALL DATA IN TABLE
$deleteCommand = 'DELETE FROM staff_data.bluesky';
$deleteAction = $conn->prepare($deleteCommand);
$deleteAction->execute();

//DROP TABLE
$dropTableCommand = 'DROP TABLE staff_data.bluesky';
$dropTableAction = $conn->prepare($dropTableCommand);
$dropTableAction->execute();
if ($dropTableAction) {
    $io->success('Table was dropped successfully!');
}