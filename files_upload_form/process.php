<?php
require_once "functions.php";

if (empty($_FILES['userfile'])) {
  die('File was not chosen!');
};
if ($_FILES['userfile']['size'] > 2000000) {
  exit('File size must be less than 2MB');
}
saveFile();
header("Location: index.php");
