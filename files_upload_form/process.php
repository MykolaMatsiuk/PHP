<?php
require_once "functions.php";

if (!isset($_FILES['userfile']) || $_FILES['userfile']['size'] > 2000000) {
  die('File was not chosen or its size is more than 2MB!');
};

saveFile();

//header("Location: index.php");
