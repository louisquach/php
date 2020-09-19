<?php
    require_once dirname(__DIR__).'/vendor/dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
</head>
<body>

    <h1>NEW STAFF INFORMATION</h1>


    <?php
    /*------------------- CREATE TABLE BLUESKY -------------------*/
    $createTableCommand = "CREATE TABLE bluesky (
                            ID int NOT NULL AUTO_INCREMENT,
                            FULLNAME VARCHAR(100) NOT NULL,
                            EMAIL VARCHAR(100) NOT NULL,
                            PHONE VARCHAR(20) NOT NULL,
                            START_DAY DATE,
                            PRIMARY KEY (ID) )";

    $createTableAction = $conn->prepare($createTableCommand);
    $createTableAction->execute();

    if (! $createTableAction) {
        echo "Create table failed: " . mysql_error;
    }

    /*------------------- INSERT DATA TO DATABASE -------------------*/
    $newStaff = "INSERT INTO bluesky (ID,FULLNAME,EMAIL,PHONE, START_DAY) 
                    VALUES (1,'Minh Luan Quach','quachminhluan@email.com', 
                            '0411444442','2020-09-20')";

    $addNewStaff = $conn->prepare($newStaff);
    $addNewStaff->execute();

    if ($addNewStaff) {
        echo "There is a new staff! <br>";
    } else {
        echo "There is an error: " . mysql_error;
    }

    /*-------------------- SELECT DATA FROM DATABASE----------------------*/
    $staffId = "SELECT * FROM bluesky WHERE ID = ?";
    $findStaff = $conn->fetchArray($staffId,array(1));

    if (!$findStaff) {
        echo "Could not get data " . mysql_error;
    }
            
    /*--------------- PRINT RESULT --------------*/
    echo "<pre>";                         
    print_r($findStaff);                       
    echo "</pre>";   

    /*------ DELETE ALL DATA IN TABLE --------*/
    $deleteCommand = 'DELETE FROM bluesky';
    $deleteAction = $conn->prepare($deleteCommand);
    $deleteAction->execute();

    /*----------- DROP TABLE -------------*/
    $dropTableCommand = 'DROP TABLE bluesky';
    $dropTableAction = $conn->prepare($dropTableCommand);
    $dropTableAction->execute();

    ?>

</body>
</html>