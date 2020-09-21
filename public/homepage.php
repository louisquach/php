<?php
    require_once __DIR__.'/../src/commands/Connect.php';
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
        <div class='container__content'>

            <h1>DATABASE</h1>
            <form action='' method='POST' class='form'>
                <p class='input'>ID: <input type='text' name='id' required></p>
                <p class='input'>Full Name: <input type='text' name='fullname' required></p>
                <p class='input'>Email: <input type='text' name='email' required></p>
                <p class='input'>Phone: <input type='text' name='phone' required></p>
                <p class='input'>Date Start: <input type='text' name='date' required></p>

                <div class='container__btn'>
                    <input type='submit' name='insert' value='Add Data' class='btn'>
                    <input type='submit' name='print' value='Print Data' class='btn'>
                </div>

            </form>
        </div>
    </div>

    <?php
    
    if (isset($_POST['insert'])) {
        $bluesky = "CREATE TABLE staff_data.bluesky (
                    ID int NOT NULL AUTO_INCREMENT,
                    FULLNAME VARCHAR(100) NOT NULL,
                    EMAIL VARCHAR(100) NOT NULL,
                    PHONE VARCHAR(20) NOT NULL,
                    START_DAY VARCHAR(20) NOT NULL,
                    PRIMARY KEY (ID) )";
                            
        $createTableAction = $conn->prepare($bluesky);
        $createTableAction->execute();
        
        if (!$createTableAction) {
            echo 'created table failed';
        }
        echo "Create table successfully!";

        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
        ->insert('staff_data.bluesky')
        ->values(
            array(
                'ID' => '?',
                'FULLNAME' => '?',
                'EMAIL' => '?',
                'PHONE' => '?',
                'START_DAY' => '?' 
            )
        )
        ->setParameter(0, $_POST['id'])
        ->setParameter(1, $_POST['fullname'])
        ->setParameter(2, $_POST['email'])
        ->setParameter(3, $_POST['phone'])
        ->setParameter(4, $_POST['date'])
        ->execute();
    }
    
    function printData() {
        echo 'hello';
    }

    ?>

</body>
</html>