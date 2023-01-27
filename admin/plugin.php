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

<body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-deep-purple mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title">RapidCMS 管理后台</span>
    </div>

    <? include("drawer.php"); ?>

    <script type="text/javascript" language="javascript">
        function confirmAct() {
            if (confirm('确定要删除插件吗?')) {
                return true;
            }
            return false;
        }

        function confirmAct1() {
            if (confirm('确定要禁用插件吗?')) {
                return true;
            }
            return false;
        }

        function confirmAct2() {
            if (confirm('确定要启用插件吗?')) {
                return true;
            }
            return false;
        }
    </script>
    <style>
        * {
            font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card" style="overflow:scroll">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px;">插件设置</div>

            </div> 
            <div class="mdui-divider"></div> <br>
            <m-scrollbar style="height: 650px;width:900px;">
          
            <form method="get" action="download-plugin.php" style="text-align:left;padding:0 0 0 250px">
                    <div style="  display: flex;gap: 47px;">

                        <div>输入Key加载插件：<input style="width:300px" class="mdui-textfield-input" name="name" type="text" value="" required=""> </div>
                        <div><button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                        </div>




                    </div>
                </form>
                <br>
                <div class="mdui-divider"></div>  <br>
                <div style="width:90%;position: absolute;left: 50%;    transform: translateX(-50%  );" class="mdui-table-fluid">

                    <table class="mdui-table">
                        <thead>
                            <tr>
                                <th>ID-Key</th>
                                <th>名称</th>
                                <th>版本</th>
                                <th>作者</th>
                                <th>状态</th>
                                <th class="mdui-table-col-numeric"> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php




                            $file = scandir("../plugin");

                            for ($i = 2; $i < count($file); $i++) {

                                $json_string = file_get_contents('../plugin/' . $file[$i] . "/version.json");
                                $row = json_decode($json_string, true);
                                echo "<tr>";
                                echo "</tr>";
                                echo "<td>" . $row["key"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["version"] . "</td>";
                                echo "<td>" . $row["author"] . "</td>";
                                if ($row["use"] == true) {
                                    echo "<td>启用</td>";
                                    echo '<td><a target="_blank" href="' . '../plugin/' . $file[$i] . "/setting.php" . '"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a>';
                                    echo '<a onclick="return confirmAct1();" href="plugin-move.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe644;</i></button></a>';
                                } else {
                                    echo "<td>禁用</td>";
                                    echo '<td><a target="_blank" href="' . '../plugin/' . $file[$i] . "/setting.php" . '"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a>';
                                    echo '<a onclick="return confirmAct2();" href="plugin-move.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe86c;</i></button></a>';
                                }


                                echo '<a onclick="return confirmAct();" href="plugin-del.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe872;</i></button></a>&nbsp;';

                                echo "</td>";
                            }



                            ?>


                        </tbody>
                    </table>
                </div>
            </m-scrollbar>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
</body>

</html>