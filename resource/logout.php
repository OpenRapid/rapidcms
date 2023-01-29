<?php
//Cookie消掉
setcookie("user", "", time()-3600,'/');
setcookie("name", "", time()-3600,'/');
//获取返回位置
if($_GET["goto"]!="")
{
      $goto=$_GET["goto"];
}else{
      $goto="../../../../../../index.php";
}
//直接返回
echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\"".$goto."\""."</script>";
?>