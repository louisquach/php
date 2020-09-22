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
      new InputArgument('option', InputArgument::OPTIONAL, 'Create a table on database'),
    ))
  ->setDescription('Work with database')
  ->setHelp('
<info>do:command [option]</info>, this command will execute the option.
 
*** <comment>Samples:</comment>

  To insert data into the table:
    ><info>php index.php do:command insert-data</info>

  To print data from the table:
    ><info>php index.php do:command print-data</info>

  To delete data in the table:
    ><info>php index.php do:command delete-data</info>
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
        require_once('src/commands/AddData.php');
    }
    
    elseif ($option == 'print-data') {
        require_once('src/commands/PrintData.php');
    }
    
    elseif ($option == 'delete-data') {
        require_once('src/commands/DeleteData.php');
    }

    else {
        $io->text('Please choose an correct option or enter "php index.php -h" to get help!');
    }

  });
    
$console->run();