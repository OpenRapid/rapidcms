<?php
include("../resource/variable.php");
function encode($string = '', $skey = 'cxphp')
{
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key] .= $value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
$sql = "select password from `rapidcmsadmin` where username=\"admin\"";
$result = mysqli_query($link, $sql);
$pass = mysqli_fetch_row($result);
$pa = $pass[0];

if ($_COOKIE["admin"] != encode('admin',$pa)) {
    Header("Location: login.php"); 
}
$data1 = array();
if($_POST["tool"]=="on"){
    $data1['tool'] = "true";
}else{
    $data1['tool'] = "false";
}
$data1['kind'] = $_POST["kind"];
if ($_POST["kind"] == "one") {
    $data1['content'] ='<center><p id="hitokoto"><a href="#" id="hitokoto_text">获取中...</a></p></center><script>fetch(\'https://v1.hitokoto.cn\').then(response => response.json()).then(data => {const hitokoto = document.querySelector(\'#hitokoto_text\');hitokoto.href = \'#\';hitokoto.innerText = data.hitokoto;}).catch(console.error)</script>';
} else {
    $data1['content'] = $_POST["content"];
}


$json_string1 = json_encode($data1);
$filename1 = '../resource/config/tool.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"tool.php\"</script>";
