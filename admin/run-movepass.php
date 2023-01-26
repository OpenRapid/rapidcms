
<?php
include("../resource/variable.php");

header("Content-type:text/html;charset=utf-8");
$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword']);

if ($link) {
   $select = mysqli_select_db($link, $dataxxx['dbname']);
   if ($select) {

      if ($_POST["password"] == $_POST["password2"]) {
         $str = 'UPDATE `rapidcmsadmin` SET `password`= "' . md5(sha1(md5( $_POST["password"]))) . '" WHERE `username`="admin"';

         $result = mysqli_query($link, $str);
         sendalert("修改成功");
      } else {
         sendalert("两次密码不一致");
      }
   } else {
      sendalert('修改失败');
   }
}
