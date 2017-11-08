<?php
include_once "libs/Smarty.class.php";
session_start();
$_SESSION['page1'] = "Phones";

$smarty = new Smarty();
$smarty -> setTemplateDir('templates');
$smarty -> display('page1.tpl');
