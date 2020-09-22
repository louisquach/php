<?php
    require_once __DIR__.'/../src/commands/Connect.php';
    require_once __DIR__.'/../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASK 1 - WORK WITH DATABASE</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class='container'>
        <div class="container__content">
            <h1>DATABASE</h1>

            <form action='' method='POST' class='form'>
                <p class='input'>Full Name: <input type='text' name='fullname' required></p>
                <p class='input'>Email: <input type='text' name='email' required></p>
                <p class='input'>Phone: <input type='text' name='phone' required></p>
                <p class='input'>Date Start: <input type='text' name='date' required></p>

                <div class='container__btn'>
                    <input type='submit' name='insert' value='Add Data' class='btn'>
                </div>
            </form>

            <div class='find__container'>
                <form action='' method='GET' class='get__form'>
                    Email: <input type='text' name='findemail' required>
                    <input type='submit' name='printdata' value='Find Email' class='btn'>
                </form>

                <form action='' method='GET' class='get__form'>
                    <input type='submit' name='printall' value='Print All' class='btn'>
                </form>

                <form action='' method='GET' class='get__form'>
                    <input type='submit' name='delete' value='Delete All' class='btn'>
                </form>
            </div>
        </div>
    </div>

    <?php

    // ADD DATA
    if (isset($_POST['insert'])) {
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->insert('staff_data.bluesky')
            ->values(
                array(
                    'FULLNAME' => '?',
                    'EMAIL' => '?',
                    'PHONE' => '?',
                    'START_DAY' => '?' 
                )
        )
        ->setParameter(1, $_POST['fullname'])
        ->setParameter(2, $_POST['email'])
        ->setParameter(3, $_POST['phone'])
        ->setParameter(4, $_POST['date'])
        ->execute();

        if ($queryBuilder) {
            echo "Added data successfully!";
        }
    }

    // FIND DATA BY EMAIL
    if (isset($_GET['printdata'])) {
        $staffId = "SELECT * FROM staff_data.bluesky WHERE EMAIL = ?";
        $findStaff = $conn->fetchArray($staffId,array($_GET['findemail']));
        
        if (!$findStaff) {
            echo "Could not get the data ";
        }
        
        //PRINT RESULT
        echo "<pre>";                         
        print_r($findStaff);                       
        echo "</pre>";   
    }

    // PRINT ALL DATA FROM THE TABLE
    if (isset($_GET['printall'])) {
        require_once __DIR__.'/../src/commands/PrintData.php';  
    }

    // DELETE ALL DATA FROM THE TABLE
    if (isset($_GET['delete'])) {
        require_once __DIR__.'/../src/commands/DeleteData.php';  
    }

    ?>

</body>
</html>