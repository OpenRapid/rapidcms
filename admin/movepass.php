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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
    <link rel="stylesheet" href="../../../../resource/css/style.css">
    <link rel="stylesheet" href="../../../../../template/default/theme.css">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
                <div class="mdui-card-primary-title" style="font-size:30px">修改管理员密码</div>
            </div>
            <form method="post" action="run-movepass.php">
                <m-scrollbar style="height: 300px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">输入密码</label>
                            <input class="mdui-textfield-input" name="password" type="password"
                              required="">
                              <div class="mdui-textfield-error">密码不能为空</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">重复密码</label>
                            <input class="mdui-textfield-input" name="password2" type="password"
                               required="">
                               <div class="mdui-textfield-error">重复密码不能为空</div>
                        </div>
                      
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                    </div>
                </m-scrollbar>
            </form>
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
</body>

</html>