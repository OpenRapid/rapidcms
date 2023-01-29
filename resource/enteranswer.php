<?php
//禁用报错
error_reporting(0);
//解析位置并传输
if($_GET["goto"]!="")
{
      $goto=$_GET["goto"];
}else{
      $goto="../../../../../../index.php";
}
//解析json连接数据库
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmschat";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$timenow = date('Y-m-d H:i:s');
$pcon = str_replace("<script>","<div>",$pcon);
$pcon = str_replace("<script","<div",$pcon);
$pcon = str_replace("</script>","</div>",$pcon);
$pcon = str_replace("<link","<div",$pcon);
$pcon = str_replace("<link>","</div>",$pcon);

$pcon = rawurlencode(htmlentities($_POST["content"]));

$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
//编写SQL语句并运行
$sql2 = 'insert into `rapidcmschat` values("'.$_POST["id"].'","'.$_POST["people"].'","'.$pcon.'",0,"'.$timenow.'","'.$_POST["articleid"].'")';
$res2 = mysqli_query($conn, $sql2);
//直接返回
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $goto . "\"" . "</script>";

?>
    
    
          