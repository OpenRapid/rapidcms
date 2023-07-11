<?php
include("../check.php");
$data1 = array();
$data1['template'] = $_POST["template"];
$data1['version'] = $data_index["version"];
$data1['rewrite'] = $data_index["rewrite"];
$data1['close'] = $data_index["close"];
$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/index.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
sendalert("修改成功！");