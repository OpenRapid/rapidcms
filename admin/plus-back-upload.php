<?php
require_once('pclzip.lib.php');
$fileInfo=$_FILES['file'];
$name=$fileInfo['name'];
$pathname = pathinfo($name)["extension"];
$filename =  pathinfo($name, PATHINFO_FILENAME); 
$filePath=$fileInfo['tmp_name'];
$str=rand(); 
$dir1 = 'backzip';
mkdir($dir1);
$path="./backzip/backup.zip";
move_uploaded_file($filePath,$path);


$rands = rand();

$zip = new PclZip("./backzip/backup.zip");
$result = $zip->extract(PCLZIP_OPT_PATH, "./backzip/");
?>