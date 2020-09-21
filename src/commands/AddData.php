<?php

$newStaff = "INSERT INTO staff_data.bluesky (ID,FULLNAME,EMAIL,PHONE, START_DAY) 
            VALUES (1,'Minh Luan Quach','quachminhluan@email.com','0411444442','2020-09-20')";

$addNewStaff = $conn->prepare($newStaff);
$addNewStaff->execute();

if ($addNewStaff) {
    $io->success('Staff infomation was added successfully!');
} 
else {
    $io->erro("There is an error: " . mysql_error);
}