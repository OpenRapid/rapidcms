<?php
error_reporting(0);
if($_GET["goto"]!="")
{
      $goto=$_GET["goto"];
}else{
      $goto="../../../../../../index.php";
}
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmschat";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$timenow = date('Y-m-d H:i:s');
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql2 = 'insert into `rapidcmschat` values("'.$_POST["id"].'","'.$_POST["people"].'","'.$_POST["content"].'",0,"'.$timenow.'","'.$_POST["articleid"].'")';
$res2 = mysqli_query($conn, $sql2);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "发送成功！" . "\"" . ")" . ";" . "</script>";
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $goto . "\"" . "</script>";

?>
    
    
          