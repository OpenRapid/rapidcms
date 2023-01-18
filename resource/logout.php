<?php
setcookie("user", "", time()-3600,'/');
setcookie("name", "", time()-3600,'/');
echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."../../../index.php"."\""."</script>";
?>