<?php
//Cookie消掉
setcookie("admin", "", time()-3600,'/');

//获取返回位置

      $goto="login.php";

//直接返回
echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\"".$goto."\""."</script>";
?>