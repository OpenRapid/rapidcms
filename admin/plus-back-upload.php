<?php
require_once('pclzip.lib.php');
$fileInfo = $_FILES['file'];
$name = $fileInfo['name'];
$pathname = pathinfo($name)["extension"];
$filename =  pathinfo($name, PATHINFO_FILENAME);
$filePath = $fileInfo['tmp_name'];
$str = rand();
$dir1 = 'backzip';
//mkdir($dir1);
$path = "./backup.zip";
move_uploaded_file($filePath, $path);

chmod("./backup.zip",0777);

$zip = new ZipArchive;
$word = $zip->open('backup.zip');
echo $word;