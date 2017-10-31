<?php
if (empty($user = $_POST['username'])) {
  die("Enter your name!");
}

if (isset($_COOKIE['session_id'])) {
  session_id($_COOKIE['session_id']);
  echo "wellcome back $user<br>";
  session_start();
} else {
  echo "hello $user";
  session_start();
  session_unset();
  setcookie('session_id', session_id(), time() + 30);
}
