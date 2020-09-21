<?php

$staffId = "SELECT * FROM staff_data.bluesky WHERE ID = ?";
$findStaff = $conn->fetchArray($staffId,array(1));

if (!$findStaff) {
    $io->error("Could not get the data " . mysql_error);
}

//PRINT RESULT
echo "<pre>";                         
print_r($findStaff);                       
echo "</pre>";   
