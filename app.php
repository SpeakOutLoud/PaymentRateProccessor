<?php

function __autoload($classname) {
    $filename = "./". $classname .".php";
    include_once($filename);
}


$fileUtilityManager = new FileUtilityManager($argv[1]);
$fileErrorUtilityManager = new FileUtilityManager('error_logs.txt');

$errorManager = new ErrorManager($fileUtilityManager, $fileErrorUtilityManager);

$tansactionProccessor = new TransactionProccessor($fileUtilityManager, $errorManager);
$tansactionProccessor->process_transactions();