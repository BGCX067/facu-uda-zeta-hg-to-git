<?php
session_start();
$include_path = ini_get('include_path');
$include_path.= getcwd().DIRECTORY_SEPARATOR.'model';
$include_path.= getcwd().DIRECTORY_SEPARATOR.'model'.DIRECTORY_SEPARATOR.'database';
$include_path.= getcwd().DIRECTORY_SEPARATOR.'controller';
ini_set('include_path',$include_path);
?>