<?php

//DELETE ALL DATA IN TABLE
$deleteCommand = 'DELETE FROM staff_data.bluesky';
$deleteAction = $conn->prepare($deleteCommand);
$deleteAction->execute();

if ($deleteAction) {
    echo 'Deleted successfully!';
}
