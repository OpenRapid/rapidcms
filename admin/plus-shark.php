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

define('BASE_PATH', str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");
define('BASE_PATH1', str_replace('\\', '/', realpath(dirname(BASE_PATH) . '/')) . "/");
$json_string = file_get_contents(BASE_PATH1 . '/install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
$sql = "select password from `rapidcmsadmin` where username=\"admin\"";
$result = mysqli_query($link, $sql);
$pass = mysqli_fetch_row($result);
$pa = $pass[0];

if ($_COOKIE["admin"] != encode('admin', $pa)) {
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
    <link rel="shortcut icon"" href=" ../../../../../resource/img/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../../../../../../resource/css/mdui.min.css" />
    <link rel="stylesheet" href="../../../../../../resource/css/mtu.min.css">
    <link rel="stylesheet" href="../../../../resource/css/style.css">
    <link rel="stylesheet" href="../../../../../template/default/theme.css">

</head>

<body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-deep-purple mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title">RapidCMS 管理后台</span>
    </div>

    <? include("drawer.php"); ?>
    <style>
        * {
            font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <br><br>
    <div style=" position:  relative;left:15%">
        <div class="mdui-card" style="width:70%;height:300px; ">
            <div class="mdui-card-primary" style="text-align:center;">
                <div class="mdui-card-primary-title" style="font-size:30px">从SharkCMS迁移数据</div>
            </div>
            <br>
            <label class="mdui-textfield-label">&nbsp;&nbsp;&nbsp;选择导入方式</label>
            &nbsp;&nbsp;&nbsp;
            <label class="mdui-radio">
                <input type="radio" name="group1" checked />
                <i class="mdui-radio-icon"></i>
                从本程序所在数据库导入
            </label>

            <label class="mdui-radio">
                <input type="radio" name="group1" disabled />
                <i class="mdui-radio-icon"></i>
                从其他数据库导入（暂不支持）
            </label>
            <br>  <br>
            &nbsp;&nbsp;&nbsp;<a href="plus-shark-run.php"><button name="sub" class="mdui-btn mdui-btn-raised mdui-text-color-black action-btn">一键导入文章</button></a>
       
        </div>
    </div>
    <br>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>