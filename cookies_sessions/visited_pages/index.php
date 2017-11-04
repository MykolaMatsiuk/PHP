<?php
include_once "libs/Smarty.class.php";

$smarty = new Smarty();
$smarty -> setTemplateDir('templates');
$smarty -> display('index.tpl');
