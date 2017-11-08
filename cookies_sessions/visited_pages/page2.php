<?php
include_once "libs/Smarty.class.php";
session_start();
$_SESSION['page2'] = "Tablets";

$smarty = new Smarty();
$smarty -> setTemplateDir('templates');
$smarty -> display('page2.tpl');
