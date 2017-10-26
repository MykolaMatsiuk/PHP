<?php
function htmlUploadFile () {
  $html = "
    <form enctype='multipart/form-data' action='process.php' method='POST'>
      Choose file: <input name='userfile' type='file'>
      <input type='submit' value='SEND'>
    </form>
  ";
  echo $html;
}

function saveFile () {
  $folder = (explode('/', $_FILES['userfile']['type']))[0];
  if (!file_exists('download/' . $folder)) {
    mkdir(('download/' . $folder));
  };
  move_uploaded_file($_FILES['userfile']['tmp_name'], 
    'download/' . $folder . "/" . $_FILES['userfile']['name']);
  print_r($_FILES);
}

function uploadFiles ($path) {
  $data = scandir($path);
  array_shift($data);
  array_shift($data);
  if ($path == 'download/image') {
    echo "<h2>Pictures Gallery</h2>";
    foreach ($data as $dir) {
      echo "<img src='{$path}/{$dir}' height='100px' alt='picture'>";
    }
  } else {
    echo "<h2>Uploaded files list:</h2><ul>";
    foreach ($data as $dir) {
      echo "<li>$dir</li>";    
    }
    echo "</ul>";
  }
}
