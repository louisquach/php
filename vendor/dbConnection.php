<?php

require_once 'autoload.php';

// I am using XAMPP to create server and database, using Doctrine DBAL to connect to database

/* Prepare Params, using pdo_mysql driver to connect to mysql database */
$connectionParams = array(
    'dbname' => 'mysql',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);




