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

      $str='INSERT INTO `rapidcmscategory`(`id`, `name`, `pic`, `num`) VALUES ("'.$_POST["id"].'","'.rawurlencode($_POST["name"]).'","'.$_POST["pic"].'",'.$_POST["num"].')';

	  $result=mysqli_query($link,$str);
      sendalert("增加成功！");
  }
}
?>