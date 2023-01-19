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

        <span class="mdui-typo-title">RapidCMS V<? echo $data_index["version"]; ?>安装</span>
        <div class="mdui-toolbar-spacer"></div>
    </div>

    <div class="mdui-container medium" style="margin:auto;text-align:center">
        <div class=" mdui-text-color-theme mdui-typo-display-3">RapidCMS V<? echo $data_index["version"]; ?>安装</div>
        <div class="mdui-text-color-black mdui-typo ">
            <br>

        </div>
        <m-stepper style="width:50%;position: absolute;left: 50%;transform: translateX(-50%);" value="3">
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
        <div class="mdui-card" style="width:60%;height:400px;position: absolute;left: 50%;transform: translateX(-50%);">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">安装程序</div>
            </div>

            <div style="text-align:left;font-size:20px">
                <?php
                error_reporting(0);
                $data = array();
                $data['server'] = $_POST['server'];
                $data['dbusername'] = $_POST['dbusername'];
                $data['dbpassword'] = $_POST['dbpassword'];
                $data['dbname'] = $_POST['dbname'];
                $data['password'] = $_POST['password'];
                $json_string = json_encode($data);
                $filename = 'sql-config/sql.json';
                $fp = fopen($filename, "w");
                $len = fwrite($fp, $json_string);
                fclose($fp);
                echo '&nbsp;&nbsp;&nbsp;1、数据库数据写入成功，请等待后续步骤……';
                $link = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
                if ($link) {
                    echo "<br>&nbsp;&nbsp;&nbsp;2、数据库连接成功";
                    $sql = "CREATE TABLE `rapidcmsuser` ( `username` CHAR(100) PRIMARY KEY , `password` TEXT NOT NULL , `power` CHAR(100) NOT NULL ) ENGINE = MyISAM;";
                    $cona = mysqli_query($link, $sql);
                    if ($cona) {
                        echo "<br>&nbsp;&nbsp;&nbsp;3、表 RapidCMSUser 创建成功";
                        $sql2 = "CREATE TABLE `rapidcmsadmin` (`username` CHAR(100) PRIMARY KEY ,  `password` TEXT NOT NULL ) ENGINE = MyISAM;";
                        $conb = mysqli_query($link, $sql2);
                        if ($conb) {
                            echo "<br>&nbsp;&nbsp;&nbsp;4、表 RapidCMSAdmin 创建成功";
                            $passwordq = md5(sha1(md5($data["password"])));
                            $sqlx = "insert into `rapidcmsadmin` values('admin','{$passwordq}');";
                            $conc = mysqli_query($link, $sqlx);
                            if ($conc) {
                                echo "<br>&nbsp;&nbsp;&nbsp;5、表 RapidCMSAdmin 插入成功";
                                $sqly = 'CREATE TABLE `rapidcmspage` (
                                    `id` char(10) COLLATE utf8_unicode_ci PRIMARY KEY,
                                    `title` char(100) COLLATE utf8_unicode_ci NOT NULL,
                                    `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
                                    `time` datetime NOT NULL,
                                    `categoryid` char(10) COLLATE utf8_unicode_ci NOT NULL
                                  ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
                                $cond = mysqli_query($link, $sqly);
                                if ($cond) {
                                    echo "<br>&nbsp;&nbsp;&nbsp;6、表 RapidCMSPage 创建成功";
                                    $sqlz = 'CREATE TABLE `rapidcmscategory` (
                                        `id` char(10) COLLATE utf8_unicode_ci PRIMARY KEY,
                                        `name` char(100) COLLATE utf8_unicode_ci NOT NULL,
                                        `pic` char(10) COLLATE utf8_unicode_ci NOT NULL,
                                        `num` int(10) COLLATE utf8_unicode_ci NOT NULL
                                      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
                                    $cone = mysqli_query($link, $sqlz);
                                    if ($cone) {
                                        echo "<br>&nbsp;&nbsp;&nbsp;7、表 RapidCMSCategory 创建成功";
                                        $sqlz1 = 'CREATE TABLE `rapidcmschat` (
                                            `id` char(10) COLLATE utf8_unicode_ci PRIMARY KEY,
                                            `people` char(100) COLLATE utf8_unicode_ci NOT NULL,
                                            `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
                                            `goodnum` int(10) COLLATE utf8_unicode_ci NOT NULL,
                                            `time` datetime NOT NULL,
                                            `articleid` char(10) COLLATE utf8_unicode_ci NOT NULL
                                          ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;';
                                        $cone1 = mysqli_query($link, $sqlz1);
                                        if ($cone1) {
                                            echo "<br>&nbsp;&nbsp;&nbsp;8、表 RapidCMSChat 创建成功";

                                            $data1 = array();
                                            $data1['lock'] = "install";
                                            $json_string1 = json_encode($data1);
                                            $filename1 = 'install-config/install.json';
                                            $fp1 = fopen($filename1, "w");
                                            $len1 = fwrite($fp1, $json_string1);
                                            fclose($fp1);
                                            echo "<br>&nbsp;&nbsp;&nbsp;9、锁定安装成功，解锁请清空install/install-config/install.json";
                                            echo "<br>&nbsp;&nbsp;&nbsp;10、后台创建成功，后台地址" . $_SERVER['HTTP_HOST'] . "/admin";
                                            echo '<script>setTimeout(`document.getElementById("nextButton").disabled="false"`, 1000 )</script>';
                                        } else {
                                            echo "<br>&nbsp;&nbsp;&nbsp;8、表 RapidCMSChat 出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                                            echo mysqli_error($link);
                                        }
                                    } else {
                                        echo "<br>&nbsp;&nbsp;&nbsp;7、表 RapidCMSCategory 出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                                        echo mysqli_error($link);
                                    }
                                } else {
                                    echo "<br>&nbsp;&nbsp;&nbsp;6、表 RapidCMSPage 出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                                    echo mysqli_error($link);
                                }
                            } else {
                                echo "<br>&nbsp;&nbsp;&nbsp;5、表 RapidCMSAdmin 插入时出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                                echo mysqli_error($link);
                            }
                        } else {
                            echo "<br>&nbsp;&nbsp;&nbsp;4、表 RapidCMSAdmin 出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                            echo mysqli_error($link);
                        }
                    } else {
                        echo "<br>&nbsp;&nbsp;&nbsp;3、表 RapidCMSUser 出现问题，请按照报错内容修改<br>&nbsp;&nbsp;&nbsp;";
                        echo mysqli_error($link);
                    }
                } else {
                    echo "<br>&nbsp;&nbsp;&nbsp;2、数据库连接失败，问题如下<br>&nbsp;&nbsp;&nbsp;";
                    echo mysqli_connect_error();
                }

                ?>
            </div>

        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <m-button theme="color" onclick="window.location.href='setp3.php'">上一步</m-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <m-button disabled="true" theme="color" id="nextButton" onclick="NextStep()">完成安装</m-button>

        <script>
            function NextStep() {
                window.location.href = "../../../../../#";
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
</body>

</html>