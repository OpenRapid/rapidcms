<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
include("../resource/variable.php");
$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword']);
if($_GET["goto"]!="")
{
      $goto=$_GET["goto"];
}else{
      $goto="../../../../../../index.php";
}
function encode($string = '', $skey = 'cxphp')
{
      $strArr = str_split(base64_encode($string));
      $strCount = count($strArr);
      foreach (str_split($skey) as $key => $value)
            $key < $strCount && $strArr[$key] .= $value;
      return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}



if ($link) {
      $select = mysqli_select_db($link, $dataxxx['dbname']);
      if ($select) {

            $name = $_POST["username"];
            $password = $_POST["password"];
            if ($name == "" || $password == "") {
                  sendalert("请填写正确的信息");
                  exit;
            }
            $str = "select password from `rapidcmsuser` where username=" . "'" . "$name" . "'";
            $str1 = "select yhxx from `rapidcmsuser` where username=" . "'" . "$name" . "'";
            $result1 = mysqli_query($link, $str1);
            $result = mysqli_query($link, $str);
            $pass = mysqli_fetch_row($result);
            $pass1 = mysqli_fetch_row($result1);
            $pa = $pass[0];
            $pas = $pass1[0];
            $password11 = md5(sha1(md5($password)));
            if ($pa == $password11) {


                  setcookie("user", encode($name, $password11), time() + 3600000, '/');
                  setcookie("name", $name, time() + 3600000, '/');
                  sleep(2);
                  sendalert("登录成功");
             } else {
                  sendalert("登录失败");   }
      }
}
