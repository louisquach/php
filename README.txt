#INTRODUCTION

This is a small project using doctrine/dbal and symfony/console to work with database.

#USAGE

[A] This project requires using XAMPP to create and manage mysql database. After installing XAMPP,
    from the browser, go to "localhost/phpmyadmin" to see and manage the database. Make sure we START the
    Apache and MySQL modules.

[IMPORTANT] To be able to use the commands were built in this app, we must create a database "staff_data"
    and a table "bluesky" in it by entering the command below into the terminal:

                >>php index.php do:command create-tb

[C] Now, we can use the commands below:

        >>php index.php do:command insert-data [firstname] [lastname]  (Insert data to database)

        >>php index.php do:command print-data    (Print the data in the database)

        >>php index.php do:command delete-data   (Delete the data from the database)

        >>php index.php do:command drop-database    (Drop table and database)
        
        >>php index.php do:command -h    (To see the options)

[WARNING] Once you DROPPED the database, you MUST create database and table again to be able
    to use other commands.

#CONTRIBUTING

Pull requests are welcomed! Github: https://github.com/louisquach/php.
Please provide feedback to help to improve the code used in this project!
