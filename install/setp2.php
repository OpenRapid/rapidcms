<?php
include("../resource/variable.php");
$json_string = file_get_contents('../' . $servers["lockurl"]);
$data_json = json_decode($json_string, true);
if ($data_json["lock"] == "install") {
    Header("Location: already.php");
}
?>



<!doctype html>
<html lang="zh-cmn-Hans">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <meta name="renderer" content="webkit" />
    <meta name="force-rendering" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
    <link rel="stylesheet" href="../resource/css/style.css">
    <title>RapidCms安装</title>
</head>

<body class=" mdui-theme-accent-indigo mdui-theme-primary-indigo mdui-text-color-white" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white">

        <span class="mdui-typo-title">RapidCMS V<?echo $data_index["version"];?>安装</span>
        <div class="mdui-toolbar-spacer"></div>
    </div>

    <div class="mdui-container medium" style="margin:auto;text-align:center">
        <div class=" mdui-text-color-theme mdui-typo-display-3">RapidCMS V<?echo $data_index["version"];?>安装</div>
        <div class="mdui-text-color-black mdui-typo ">
            <br>

        </div>
        <m-stepper style="width:50%;position: absolute;left: 50%;transform: translateX(-50%);" value="1">
            <m-stepper-item>
                <div slot="start">1</div>
                <div slot="title">确认协议</div>
            </m-stepper-item>
            <m-stepper-item>
                <div slot="start">2</div>
                <div slot="title">检查版本</div>
            </m-stepper-item>
            <m-stepper-item>
                <div slot="start">3</div>
                <div slot="title">填写信息</div>
            </m-stepper-item>
            <m-stepper-item>
                <div slot="start">4</div>
                <div slot="title">安装程序</div>
            </m-stepper-item>
        </m-stepper>
        <br><br><br><br><br><br>
        <div class="mdui-card" style="width:60%;height:360px;position: absolute;left: 50%;transform: translateX(-50%);">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">检查版本</div>
            </div>
            <div class="mdui-card-content" style="font-size:20px">
                <div class="mdui-table-fluid">
                    <table class="mdui-table">
                        <thead>
                            <tr>
                                <th>状态</th>
                                <th>项目</th>
                                <th>最低要求</th>
                                <th>实际情况</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            $install_check = 0;
                            if (PHP_MAJOR_VERSION >= 5) {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">check_circle</i>';
                                echo "</td><td>PHP版本";
                                echo "</td><td><font style='color:#888888'>>=5</font>";
                                echo "</td><td>" . PHP_MAJOR_VERSION . "</td></tr>";
                                $install_check = $install_check + 1;
                            } else {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">remove_circle</i>';
                                echo "</td><td>PHP版本";
                                echo "</td><td><font style='color:#888888'>>=5</font>";
                                echo "</td><td>" . PHP_MAJOR_VERSION . "</td></tr>";
                            }
                            if (extension_loaded('fileinfo')) {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">check_circle</i>';
                                echo "</td><td>fileinfo拓展";
                                echo "</td><td><font style='color:#888888'>已安装</font>";
                                echo "</td><td>已安装</td></tr>";
                                $install_check = $install_check + 1;
                            } else {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">remove_circle</i>';
                                echo "</td><td>fileinfo拓展";
                                echo "</td><td><font style='color:#888888'>已安装</font>";
                                echo "</td><td>未安装</td></tr>";
                            }
                            if (extension_loaded('gd')) {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">check_circle</i>';
                                echo "</td><td>gd拓展";
                                echo "</td><td><font style='color:#888888'>已安装</font>";
                                echo "</td><td>已安装</td></tr>";
                                $install_check = $install_check + 1;
                            } else {
                                echo '<tr><td><i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-red">remove_circle</i>';
                                echo "</td><td>gd拓展";
                                echo "</td><td><font style='color:#888888'>已安装</font>";
                                echo "</td><td>未安装</td></tr>";
                            }



                            echo " </tbody></table></div></div></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
                            echo '<m-button theme="color" onclick="window.location.href=\'setp1.php\'">上一步</m-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            if ($install_check == 3) {
                                echo '<m-button theme="color" onclick="window.location.href=\'setp3.php\'">下一步</m-button>';
                            } else {
                                echo '<m-button theme="color" disabled="true">请检查并安装缺漏内容</m-button>';
                            }
                            ?>

                            </article>

                </div>
                <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
</body>

</html>