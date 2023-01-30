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
$ran12 = rand() * 10;
$dir = './backup/';
mkdir($dir);
chmod($dir, 0755);


header("Content-type:text/html;charset=utf-8");


$json_string = file_get_contents(BASE_PATH1 . 'install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `rapidcmschat` ORDER BY time DESC';
$res = mysqli_query($conn, $sql);
$row = mysqli_num_rows($res);

while ($row = mysqli_fetch_row($res)) {

    $enter .= 'INSERT INTO `rapidcmschat` VALUES ("' . $row[0] . '","' . $row[1] . '","' . $row[2] . '",' . $row[3] . ',"' . $row[4] . '","' . $row[5] . '");' . PHP_EOL;
}

$enter .= PHP_EOL;

$sql1 = 'select * from `rapidcmsuser`';
$res1 = mysqli_query($conn, $sql1);
$row1 = mysqli_num_rows($res1);

while ($row1 = mysqli_fetch_row($res1)) {

    $enter .= 'INSERT INTO `rapidcmsuser` VALUES ("' . $row1[0] . '","' . $row1[1] . '","' . $row1[2] . '");' . PHP_EOL;
}

$enter .= PHP_EOL;

$sql2 = 'select * from `rapidcmscategory`';
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_num_rows($res2);

while ($row2 = mysqli_fetch_row($res2)) {

    $enter .= 'INSERT INTO `rapidcmscategory` VALUES ("' . $row2[0] . '","' . $row2[1] . '","' . $row2[2] . '",' . $row2[3] . ');' . PHP_EOL;
}


$enter .= PHP_EOL;

$sql3 = 'select * from `rapidcmspage`';
$res3 = mysqli_query($conn, $sql3);
$row3 = mysqli_num_rows($res3);

while ($row3 = mysqli_fetch_row($res3)) {

    $enter .= 'INSERT INTO `rapidcmspage` VALUES ("' . $row3[0] . '","' . $row3[1] . '","' . $row3[2] . '","' . $row3[3] . '","' . $row3[4] . '");' . PHP_EOL;
}
$myfile = fopen($dir . "sql.sql", "w+") or die("打开失败");
fwrite($myfile, $enter);
fclose($myfile);


function copydir($source, $dest)
{
    if (!file_exists($dest)) mkdir($dest);
    $handle = opendir($source);
    while (($item = readdir($handle)) !== false) {
        if ($item == '.' || $item == '..') continue;
        $_source = $source . '/' . $item;
        $_dest = $dest . '/' . $item;
        if (is_file($_source)) copy($_source, $_dest);
        if (is_dir($_source)) copydir($_source, $_dest);
    }
    closedir($handle);
}
function deldir($path)
{
    if (is_dir($path)) {
        $p = scandir($path);
        foreach ($p as $val) {
            if ($val != "." && $val != "..") {

                if (is_dir($path . $val)) {
                    deldir($path . $val . '/');
                    @rmdir($path . $val . '/');
                } else {
                    unlink($path . $val);
                }
            }
        }
    }
}
deldir('./backzip/');
rmdir('./backzip/');
$dir1 = 'backzip';
mkdir($dir1);
chmod($dir1, 0755);
copydir("../resource/config", $dir . "config");
require_once('pclzip.lib.php');
$rands = rand();
$zip = new PclZip("./backzip/backup.zip");
$result = $zip->create($dir, PCLZIP_OPT_ADD_PATH, "./");


function downfile($name,$ran)
{
$filename=realpath($name); 
Header( "Content-type: application/octet-stream ");
Header( "Accept-Ranges: bytes ");
Header( "Accept-Length: " .filesize($filename));
header( "Content-Disposition: attachment; filename= rapidcms_" . $ran . ".backup");
echo file_get_contents($filename);
readfile($filename);
}
deldir($dir);
rmdir($dir);
downfile("./backzip/backup.zip",$ran12);
Header("Location:plus.php"); 
$fp=fopen("./backzip/backup_" . $ran12 . ".zip","r");
$buffer=1024; 
$file_count=0;
while(!feof($fp) && $file_count<filesize($filename)){ 
$file_con=fread($fp,$buffer); 
$file_count+=$buffer; 
} 
fclose($fp);

if($file_count >=filesize($filename))
{

    deldir('./backzip/');
    rmdir('./backzip/');

}
