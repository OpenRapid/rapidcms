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

<body class=" mdui-appbar-with-toolbar mdui-theme-accent-deep-purple mdui-theme-primary-deep-purple mdui-text-color-white mdui-drawer-body-left" style="--color-primary:79, 55, 139; --color-accent: 79, 55, 139;">
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
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">伪静态设置</div>
            </div>
            <form method="post" action="run-rewrite.php">
                <m-scrollbar style="height: 620px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">

                        
                        <div class="mdui-tab" mdui-tab>
                            <a href="#Apache" class="mdui-ripple">Apache伪静态</a>
                            <a href="#Nginx" class="mdui-ripple">Nginx伪静态</a>

                        </div>
                        <div id="Apache" class="mdui-p-a-2">
                            RewriteEngine On<br>
                            RewriteRule index.html index.php<br>
                            RewriteRule ^c/([a-zA-Z0-9\-]*)$ category/index.php?id=$1<br>
                            RewriteRule ^c/([a-zA-Z0-9\-]*)/$ category/index.php?id=$1<br>
                            RewriteRule ^a/([a-zA-Z0-9\-]*)$ article/index.php?id=$1<br>
                            RewriteRule ^a/([a-zA-Z0-9\-]*)/$ article/index.php?id=$1<br>
                        </div>
                        <div id="Nginx" class="mdui-p-a-2">
                            rewrite /index.html /index.php;<br>
                            rewrite ^/c/([a-zA-Z0-9\-]*)$ /category/index.php?id=$1;<br>
                            rewrite ^/c/([a-zA-Z0-9\-]*)/$ /category/index.php?id=$1;<br>
                            rewrite ^/a/([a-zA-Z0-9\-]*)$ /article/index.php?id=$1;<br>
                            rewrite ^/a/([a-zA-Z0-9\-]*)/$ /article/index.php?id=$1;<br>
                        </div>
                        <div class="mdui-divider"></div><br>
                        <label class="mdui-switch">
                            开启伪静态&nbsp;&nbsp;&nbsp;
                            <input <?
                                    if ($data_index["rewrite"] == "true") {
                                        echo " checked='true'";
                                    }
                                    ?> name="rewrite" type="checkbox" />
                            <i class="mdui-switch-icon"></i>
                        </label>  <br>
                        &nbsp;&nbsp;&nbsp;
                        <label class="mdui-textfield-label">注意：将伪静态规则填写到对应处再开启此选项，否则会遇到意想不到的后果。</label>
                      <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                    </div>
                </m-scrollbar>
            </form>
        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>