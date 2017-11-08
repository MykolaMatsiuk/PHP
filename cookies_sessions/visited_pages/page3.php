<?php
include_once "libs/Smarty.class.php";
session_start();
$_SESSION['page3'] = "Laptops";

$smarty = new Smarty();
$smarty -> setTemplateDir('templates');
$smarty -> display('page3.tpl');
