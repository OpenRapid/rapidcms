<?php
function isImage($imgPath){
if($imgPath=="jpg"||$imgPath=="png"||$imgPath=="gif"||$imgPath=="jpeg"){
return true;
}else{
  return false;
}
}

$fileInfo = $_FILES['file'];
$name = $fileInfo['name'];
$pathname = pathinfo($name)["extension"];
$filename =  pathinfo($name, PATHINFO_FILENAME);
$filePath = $fileInfo['tmp_name'];
if(isImage($pathname)==false){
  exit;
}
 //$name = iconv('utf-8', 'gb2312', $filename);
  $str = rand();
  $path = "../../upload/upload_" . md5($str) . "." . $pathname;
  move_uploaded_file($filePath, $path);
  echo json_encode([
    "code" => 0,
    "data" => [
      "url" => $path,
      "name" => $name
    ]
  ]);