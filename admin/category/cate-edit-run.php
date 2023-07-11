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
  
      $str='  UPDATE `rapidcmscategory` SET `name`="'.rawurlencode($_POST["name"]).'",`pic`="'.$_POST["pic"].'",`num`='.$_POST["num"].' WHERE `id`="'.$_POST["id"].'"';
      
	  $result=mysqli_query($link,$str);
      sendalert("修改成功！");
  }
}
?>