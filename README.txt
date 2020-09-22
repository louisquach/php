#INTRODUCTION

This is a small project using doctrine/dbal and symfony/console to work with database.

#USAGE

[A] This project requires using XAMPP to create and manage mysql database. Doctrine/dbal was used to connect to
database by shipping the infomation that database needs to be able to create connection.

[B] To be able to use the app, we must create a database named staff_data and a table bluesky in it. This can be achieved
easily by enter the command below into the terminal:

    >>php index.php do:command create-tb

[C] There is two ways to test the code:

    1. From the browser, access to the link: "localhost/TASK_1/public/homepage.php":
        + Enter data into input field, then click "Add Data" to insert data into database.
        + Enter the ID (integer number start from 1), and click "Find By Id" to print out the data. 

    2. From terminal, enter the commands below:

        >>php index.php do:command insert-data   (Insert data to database)

        >>php index.php do:command print-data    (Print the data in the database)

        >>php index.php do:command delete-data   (Delete the data from the database)
        
        >>php index.php do:command -h    (To see the options)


#CONTRIBUTING

Please provide feedback to help to improve the code used in this project!