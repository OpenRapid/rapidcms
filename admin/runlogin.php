<?php
include("../resource/variable.php");

header ( "Content-type:text/html;charset=utf-8" );
$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link=mysqli_connect($dataxxx['server'],$dataxxx['dbusername'],$dataxxx['dbpassword']);

if($link)
{
    $select=mysqli_select_db($link,$dataxxx['dbname']);
  if($select)
  {

      $password=$_POST["password"];
      $str="select password from `rapidcmsadmin` Where username = 'admin'";
	  $result=mysqli_query($link,$str);
      $pass=mysqli_fetch_row($result);
      $pa=$pass[0];
      $password=md5(sha1(md5($password)));
      if($pa==$password)
      {
        function encode($string = '', $skey = 'cxphp')
        {
            $strArr = str_split(base64_encode($string));
            $strCount = count($strArr);
            foreach (str_split($skey) as $key => $value)
                $key < $strCount && $strArr[$key] .= $value;
            return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
        }

setcookie("admin", encode('admin',$password) ,time()+3600000,'/');
Header("Location: index.php");


      }else{ 
        sendalert("登录失败");
        
    
    }
    
  }
}
