<?php

$fname = $input->getArgument('FIRSTNAME');
$lname = $input->getArgument('LASTNAME');
$queryBuilder = $conn->createQueryBuilder();

if ($fname === null || $lname === null || ($fname === null && $lname === null)) {
  $io->warning(
    "First Name and Last Name are required, enter 'php index.php do:command -h' to get help!"
  );
} 
elseif ($fname !== null && $lname!== null) {
  $queryBuilder
      ->insert('staff_data.bluesky')
      ->values(
          array(
              'FIRST_NAME' => '?',
              'LAST_NAME' => '?',
          )
    )
      ->setParameter(1, $fname)
      ->setParameter(2, $lname)
      ->execute();

      if ($queryBuilder) {
          $io->success("Added data successfully!");
      }
}
