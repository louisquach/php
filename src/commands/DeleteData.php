<?php

//DELETE ALL DATA IN TABLE
$deleteCommand = 'DELETE FROM staff_data.bluesky';
$deleteAction = $conn->prepare($deleteCommand);
$deleteAction->execute();

if ($deleteAction) {
    $io->success('Deleted successfully!');
}
