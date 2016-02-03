<?php


//uncomma this on live
//$configBackup = array('../../../');
$configBackup = array('../');

// which directories to skip while backup 

$configSkip   = array('../backup/');  

// Put backups in which directory 

$configBackupDir = '../backup/';

//  Databses you wish to backup , can be many ( tables array if contains table names only those tables will be backed up ) 

$configBackupDB[] = array('server'=>$connection->dbhost,'username'=>$connection->dbuser,'password'=>$connection->dbpass,'database'=>$connection->dbname,'tables'=>array());

// Put in a email ID if you want the backup emailed 

$configEmail = '';