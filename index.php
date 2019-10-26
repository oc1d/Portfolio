<?php
/**
 * Main entry point. do not modify!
 */
// getting page
if(!$_GET['page'])
    $class = 'HomePage';
else 
    $class = $_GET['page'] . "Page";
// getting action
if(!$_GET['action'])
    $action = 'indexAction';
else 
    $action = $_GET['action'] . "Action";
require_once('./pages/' . $class . '.php');
$page = new $class();
$page->$action();	
?>
