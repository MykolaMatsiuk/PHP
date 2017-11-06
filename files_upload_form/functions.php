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
    /*if (!empty($_FILES['userfile'])) {
        // $folder = (explode('/', $_FILES['userfile']['type']))[0];
        $folder = 'image';
        echo __FUNCTION__ . ' folder: ' .  $folder . '<br>';
        if (!file_exists('download/' . $folder)) {
            mkdir(('download/' . $folder));
        }
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'download/' . $folder . "/" . $_FILES['userfile']['name']);
    }*/
}

function uploadFiles ($path) {
  opendir($path);
  $data = scandir($path);
  array_shift($data);
  array_shift($data);
  foreach ($data as $dir) {
    if ($dir == 'image') {
      echo "<h2>Pictures Gallery</h2>";
      $dir_image = scandir($path . "/" . $dir);
      array_shift($dir_image);
      array_shift($dir_image);
      foreach ($dir_image as $inner) {
        echo "<img src='{$path}/{$dir}/{$inner}' height='100px' alt='picture'>";
      }
    } else {
      echo "<h2>Uploaded files list:</h2><ul>";
      $dir_another = scandir($path . "/" . $dir);
      array_shift($dir_another);
      array_shift($dir_another);
      foreach ($dir_another as $inner) {
        echo "<li>$inner</li>";    
      }
      echo "</ul>";
    }
  }
}
