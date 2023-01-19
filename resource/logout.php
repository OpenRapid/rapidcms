<?php
setcookie("user", "", time()-3600,'/');
setcookie("name", "", time()-3600,'/');
if($_GET["goto"]!="")
{
      $goto=$_GET["goto"];
}else{
      $goto="../../../../../../index.php";
}
echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\"".$goto."\""."</script>";
?>