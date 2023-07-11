<?php
include("../check.php");

header ( "Content-type:text/html;charset=utf-8" );
$json_string = file_get_contents('../../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link=mysqli_connect($dataxxx['server'],$dataxxx['dbusername'],$dataxxx['dbpassword']);

if($link)
{
    $select=mysqli_select_db($link,$dataxxx['dbname']);
  if($select)
  {
    $timenow = date('Y-m-d H:i:s');
    $cont2=rawurlencode(htmlspecialchars($_POST["content"]));
      $str='INSERT INTO `rapidcmspage`(`id`, `title`, `content`, `time`, `categoryid`) VALUES ("'.$_POST["id"].'","'.rawurlencode($_POST["title"]).'","'.$cont2.'","'.$timenow.'","'.$_POST["categoryid"].'")';
	  $result=mysqli_query($link,$str);
    sendalert("增加成功！");
     
  }
}
?>