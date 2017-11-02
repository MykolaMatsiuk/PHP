<?php
include_once "libs/Smarty.class.php";

$smarty = new Smarty();
$smarty -> setTemplateDir('template');
$smarty -> display('index.tpl');
