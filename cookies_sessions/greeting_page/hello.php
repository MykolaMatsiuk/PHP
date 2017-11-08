<?php
include_once "libs/Smarty.class.php";
session_start();
$msg = '';
if (empty($_POST['username']) || !isset($_POST['username'])) {
  $msg = "Enter your name!";
}
if ($_POST['username']) {
  $_SESSION['name'] = $_POST['username'];
}


$smarty = new Smarty();
$smarty -> setTemplateDir('template');
$smarty -> assign('error', $msg);
$smarty -> display('hello.tpl');
