<?php

include("../check.php");
require_once('../src/pclzip.lib.php');


$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link=mysqli_connect($dataxxx['server'],$dataxxx['dbusername'],$dataxxx['dbpassword'],$dataxxx['dbname']);


    $fileInfo = $_FILES['file'];
    $name = $fileInfo['name'];
    $pathname = pathinfo($name)["extension"];
    $filename =  pathinfo($name, PATHINFO_FILENAME);
    $filePath = $fileInfo['tmp_name'];
        $str = file_get_contents($filePath);
echo $str;
        mysqli_query($link, $str);
 mysqli_error($link);
?>