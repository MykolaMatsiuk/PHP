<?php
include_once "libs/Smarty.class.php";
session_start();
$smarty = new Smarty();

$smarty -> setTemplateDir('templates');
$smarty -> assign('pages', $_SESSION);
$smarty -> display('page4.tpl');
