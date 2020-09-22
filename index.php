<?php

require_once('vendor/autoload.php');

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
 
$console = new Application();
 
$console
  ->register('do:command')
  ->setDefinition(array(
      new InputArgument('option', InputArgument::OPTIONAL)
    ))
  ->addArgument('FIRSTNAME', InputArgument::OPTIONAL,'Enter staff First Name.')
  ->addArgument('LASTNAME', InputArgument::OPTIONAL,'Enter staff Last Name.')
  ->setDescription('Work with database')
  ->setHelp('
      [*] <info>do:command [option]</info>, this command has some options as below:
    
      To CREATE DATABASE AND TABLE:
        ><info>php index.php do:command create-tb</info>

      To INSERT STAFF DATA into the table:
        ><info>php index.php do:command insert-data [firstname] [lastname]</info>

      To PRINT DATA from the table:
        ><info>php index.php do:command print-data</info>

      To DELETE DATA in the table:
        ><info>php index.php do:command delete-data</info>

      To DROP DATABASE:
        ><info>php index.php do:command drop-database</info>
  ')
  ->setCode(function (InputInterface $input, OutputInterface $output) {
    $option = $input->getArgument('option');
    $io = new SymfonyStyle($input, $output);

    require_once('src/commands/Connect.php');
        
    if (!$conn) {
        $output->writeln('There is problems with connection, please check!');
    }

    if ($option == 'create-tb') {
        require_once('src/commands/CreateTable.php');
    }
    elseif ($option == 'insert-data') {
        require_once('src/commands/InsertData.php');  
    }
    elseif ($option == 'print-data') {
        require_once('src/commands/PrintData.php');
    }
    elseif ($option == 'delete-data') {
        require_once('src/commands/DeleteData.php');
    }
    elseif ($option == 'drop-database') {
        require_once('src/commands/DropDatabase.php');
    }
    else {
        $io->text(
          'Enter "php index.php do:command -h" to get help or 
          read the README.txt file to have more information!'
        );
    }
  }); 
    
$console->run();

