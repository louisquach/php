<?php

$staffId = "SELECT * FROM staff_data.bluesky";
$findStaff = $conn->fetchAll($staffId);

if (!$findStaff) {
    echo "Could not get the data ";
}

//PRINT RESULT
echo "<pre>";                         
print_r($findStaff);                       
echo "</pre>";   
