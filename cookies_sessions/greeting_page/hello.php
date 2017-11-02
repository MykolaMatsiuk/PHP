<?php
include_once "libs/Smarty.class.php";
session_start();

$name = strip_tags(ucfirst($_POST['username']));
$_SESSION['user']['name'] = $name;
$smarty = new Smarty();
$smarty -> setTemplateDir('template');
$smarty -> display('hello.tpl');
$smarty -> assign('name', $name);
