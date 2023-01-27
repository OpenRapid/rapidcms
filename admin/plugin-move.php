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

define('BASE_PATH', str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");
define('BASE_PATH1', str_replace('\\', '/', realpath(dirname(BASE_PATH) . '/')) . "/");
$json_string = file_get_contents(BASE_PATH1 . '/install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
$sql = "select password from `rapidcmsadmin` where username=\"admin\"";
$result = mysqli_query($link, $sql);
$pass = mysqli_fetch_row($result);
$pa = $pass[0];

if ($_COOKIE["admin"] != encode('admin', $pa)) {
    Header("Location: login.php");
}
$json_string=file_get_contents('../plugin/'. $_GET["id"]."/version.json");
$row = json_decode($json_string, true);
if($row["use"]==true){
    $data = array();
    $data['key'] =$row["key"];
    $data['name'] = $row["name"];
    $data['version'] = $row["version"];
    $data['author'] = $row["author"];
    $data['use'] = false;
    $json_string = json_encode($data);
    
    file_put_contents('../plugin/'. $_GET["id"]."/version.json", $json_string);

   }else{
    $data = array();
    $data['key'] =$row["key"];
    $data['name'] = $row["name"];
    $data['version'] = $row["version"];
    $data['author'] = $row["author"];
    $data['use'] = true;
    $json_string = json_encode($data);
    
    file_put_contents('../plugin/'. $_GET["id"]."/version.json", $json_string);
   }
   echo "<script type='text/javascript'>window.location.href='plugin.php'</script>"
?>