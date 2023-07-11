<?php
include("../check.php");

$data1 = array();
if($_POST["logonwithmail"]=="on"){
    $data1['logonwithmail'] = "true";
}else{
    $data1['logonwithmail'] = "false";
}
$data1['smtp'] = $_POST["smtp"];
$data1['secure'] = $_POST["secure"];
$data1['port'] = $_POST["port"];
$data1['username'] = $_POST["username"];
$data1['password'] = $_POST["password"];
$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/mail.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"mail.php\"</script>";