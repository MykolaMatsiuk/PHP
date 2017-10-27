<?php
require_once "functions.php";

if (!empty($_POST) && !empty($_FILES['userfile'])) {
if (!isset($_FILES['userfile'])) {
  exit('File was not chosen!');
};
if ($_FILES['userfile']['size'] > 2000000) {
  exit('File size must be less than 2MB');
}

saveFile();

header("Location: index.php");
}
