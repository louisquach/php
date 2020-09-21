<?php

require_once('vendor/autoload.php');

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\DBAL\DriverManager;
 
$console = new Application();
 
$console
  ->register('do:command')
  ->setDefinition(array(
      new InputArgument('option', InputArgument::OPTIONAL, 'Create a table on database'),
    ))
  ->setDescription('Work with database')
  ->setHelp('
The <info>do:command [option]</info>, this command will execute the option.
 
<comment>Samples:</comment>
  To create table on database:
    <info>php index.php do:command create-tb</info>
  To insert data into the table:
    <info>php index.php do:command add-data</info>
  To print data from the table:
    <info>php index.php do:command print-data</info>
  To print data from the table:
    <info>php index.php do:command drop-table</info>

')
  ->setCode(function (InputInterface $input, OutputInterface $output) {
    $option = $input->getArgument('option');
    $io = new SymfonyStyle($input, $output);
    $connectionParams = array(
        'dbname' => 'mysql',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    );
    $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

    if (!$conn) {
        $output->writeln('There is problems with connection, please check!');
    }

    if ($option == 'create-tb') {
        require_once('src/commands/CreateTable.php');
    }
    elseif ($option == 'add-data') {
        require_once('src/commands/AddData.php');
    }
    elseif ($option == 'print-data') {
        require_once('src/commands/PrintData.php');
    }
    elseif ($option == 'drop-table') {
        require_once('src/commands/DropTable.php');
    }
    else {
        $io->text('Please choose an correct option or enter "php index.php -h" to get help!');
    }

  });
    
$console->run();