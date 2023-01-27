<?php
$fileInfo=$_FILES['file'];
$name=$fileInfo['name'];
$pathname = pathinfo($name)["extension"];
$filename =  pathinfo($name, PATHINFO_FILENAME); 
$filePath=$fileInfo['tmp_name'];
//$name = iconv('utf-8', 'gb2312', $filename);
$str=rand(); 

$path="../update/upload_".md5($str).".".$pathname;
move_uploaded_file($filePath,$path);
echo json_encode([
  "code" => 0,
  "data" => [
    "url" => $path,
    "name" => $name
  ]
 ]);
