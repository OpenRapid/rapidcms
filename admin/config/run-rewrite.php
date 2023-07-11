<?php
include("../check.php");

$data1 = array();
if($_POST["rewrite"]=="on"){
    $data1['rewrite'] = "true";
}else{
    $data1['rewrite'] = "false";
}
$data1['template'] = $data_index["template"];
$data1['version'] = $data_index["version"];
$data1['close'] = $data_index["close"];

$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/index.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"rewrite.php\"</script>";
