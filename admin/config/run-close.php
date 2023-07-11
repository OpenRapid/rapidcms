<?php
include("../check.php");

$data1 = array();
if($_POST["close"]=="on"){
    $data1['close'] = "true";
}else{
    $data1['close'] = "false";
}
$data1['template'] = $data_index["template"];
$data1['version'] = $data_index["version"];
$data1['rewrite'] = $data_index["rewrite"];

$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/index.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"server.php\"</script>";