<?php
include("../check.php");
$data1 = array();
$data1['headname'] = $_POST["headname"];
$data1['title'] = $_POST["title"];
$data1['icon'] =  $data_header["icon"];
$data1['description'] = $_POST["description"];
$data1['keywords'] = $_POST["keywords"];
$data1['introduce'] = $_POST["introduce"];
$data1['con'] = $_POST["con"];
$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/header.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"setting.php\"</script>";