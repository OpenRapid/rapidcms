<?php
include("../resource/variable.php");
function encode($string = '', $skey = 'cxphp')
{
    $strArr = str_split(base64_encode($string));
    $strCount = count($strArr);
    foreach (str_split($skey) as $key => $value)
        $key < $strCount && $strArr[$key] .= $value;
    return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}

define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
$sql = "select password from `rapidcmsadmin` where username=\"admin\"";
$result = mysqli_query($link, $sql);
$pass = mysqli_fetch_row($result);
$pa = $pass[0];

if ($_COOKIE["admin"] != encode('admin',$pa)) {
    Header("Location: login.php"); 
}
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>RapidCMS管理后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon"" href="../../../../../resource/img/icon.png" type="image/x-icon" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
<link rel="stylesheet" href="../../../../resource/css/style.css">
<link rel="stylesheet" href="../../../../../template/default/theme.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head><body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-indigo mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title">RapidCMS管理后台</span>
    </div>

<? include("drawer.php");?>
    
    <style>
    * {
        font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
<div class="medium" style=" text-align:center;">

    <div>
        <div style="color:black;font-size: 20px;" class="mdui-typo">
            <h1 style="font-weight: bold;">RapidCMS V<?echo $data_index["version"];?></h1>
        </div>
        <div style="color:black;font-size: 10px;" class="mdui-typo">
            <h1>简单好用的官网CMS系统</h1>
        </div>
    </div>
    <br>  <br>
    <div class="mdui-card" >

<div class="mdui-card-primary">
    <div class="mdui-card-primary-title" style="font-size:30px">服务器信息</div>
</div>
<m-scrollbar style="height: 350px">
    <div class="mdui-card-content" style="font-size:15px;text-align:left">



PHP程式版本：<?PHP echo PHP_VERSION; ?> 
<br>
ZEND版本： <?PHP echo zend_version(); ?> 
<br>


服务器操作系统： <?PHP echo PHP_OS; ?> 
<br>
服务器端信息： <?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?>
<br>
最大上传限制： <?PHP echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?> 
<br>
最大执行时间： <?PHP echo get_cfg_var("max_execution_time")."秒 "; ?> 
<br>
脚本运行占用最大内存： 
<?PHP echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无" ?>
<br>
服务器当前时间（服务器时区）：<? echo date('Y-m-d h:i:s', time()); ?>



    </div>
</m-scrollbar>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>

</body>
</html>