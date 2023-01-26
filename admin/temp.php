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
    <link rel="shortcut icon"" href=" ../../../../../resource/img/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
    <link rel="stylesheet" href="../../../../resource/css/style.css">
    <link rel="stylesheet" href="../../../../../template/default/theme.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
    <div class="medium" style=" text-align:center;">


        <div class="mdui-card" style="width:600px">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">设置模板</div>
            </div>
            <m-scrollbar style="font-size:15px;height: 400px">
                <div class="mdui-card-content" style="font-size:18px;text-align:left">
                    当前模板：<? echo $data_index["template"] ?>
                    &nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;     <a  target="_blank" href="../../../../template/<? echo $data_index["template"] ?>/setting.php"><button type="button" style="color:black" class="mdui-btn mdui-btn-raised  action-btn">模板单独设置</button></a><br><br>
                    <form method="post" action="temp-run.php"> 切换模板：
                        <select class="mdui-select" name="template" mdui-select>



                            <?php

                            $file = scandir("../template");

                            for ($i = 2; $i < count($file); $i++) {
                                echo '  <option value="' . $file[$i] . '">' . $file[$i] . '</option>';
                            }
                            ?></select>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                    </form>
                    <form method="get" action="download-template.php"> 输入Key加载模板：
                      <div style="display: inline;">  
                    <input style="width:300px" class="mdui-textfield-input" name="name" type="text"
                                value="" required="">
                                <br>
                        <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                        </div>
                    </form>
                    <a  target="_blank" href="https://www.yuque.com/rapid/cms/yo0y1er0vg6rl86g"><button type="button" style="color:black" class="mdui-btn mdui-btn-raised  action-btn">进入文档获取模板</button><br><br></a>
                     

                </div>
            </m-scrollbar>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>

</body>

</html>