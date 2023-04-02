<?php
class ResourceController
{
  public function get($resource)
  {
    $path = __DIR__ . '/../../resources/' . $resource;
    if (file_exists($path)) {
      $file = fopen($path, 'r');
      $content = fread($file, filesize($path));
      fclose($file);
      echo $content;
    } else {
      echo '404';
    }
  }
  public function upload($resource)
  {
    // if image put in images folder
    $path = __DIR__ . '/../../resources/' . $resource;
    if (file_exists($path)) {
      $newPath = $path . '_' . time();
      $path = $newPath;
    }
    $file = fopen($path, 'w');
    fwrite($file, $_POST['content']);
    fclose($file);
    echo json_encode(['path' => $path]);
  }
}