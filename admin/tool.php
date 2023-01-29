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
                <div class="mdui-card-primary-title" style="font-size:30px">小组件设置</div>
            </div>
            <form method="post" action="run-tool.php">
                <m-scrollbar style="height: 620px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">

                        <label class="mdui-switch">
                            开启小组件&nbsp;&nbsp;&nbsp;
                            <input <?
                                    if ($data_tool["tool"]  == "true") {
                                        echo " checked='true'";
                                    }
                                    ?> name="tool" type="checkbox" />
                            <i class="mdui-switch-icon"></i>
                        </label> <br>
                        <label class="mdui-textfield-label">选择小组件</label>
                        <select class="mdui-select" name="kind" id="kind" onchange="kindmove()" mdui-select>
                            <?

                            if ($data_tool["kind"] == "one") {
                                echo ' <option value="one" selected>一言</option>';
                                echo '   <option value="write" >自定义</option>';
                            } else {
                                echo ' <option value="one" >一言</option>';
                                echo '   <option value="write" selected>自定义</option>';
                            }
                            ?>


                        </select> <br> <br>
                        <div id="con" style="display:none" class="mdui-textfield  mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">输入内容</label>


                            <textarea rows="7" class="mdui-textfield-input" name="content" type="text" required=""><? echo $data_tool["content"]; ?></textarea>
                        </div>
                        <br>
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                    </div>
                </m-scrollbar>
            </form>
        </div>

    </div>
    <script>
        function kindmove(){
if(document.getElementById("kind").value=="write"){
    document.getElementById("con").style.display="inline";
}else{
    document.getElementById("con").style.display="none";
}
        }
        window.onload=()=>{
            kindmove()
        }
    </script>
    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>