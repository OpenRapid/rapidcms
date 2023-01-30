<?php
include("../resource/variable.php");
$json_string = file_get_contents('../' . $servers["lockurl"]);
$data_json = json_decode($json_string, true);
if (!empty($data_json["lock"]) && $data_json["lock"] == "install") {
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
    <link rel="stylesheet" href="../../../../../../resource/css/mdui.min.css" />
    <link rel="stylesheet" href="../../../../../../resource/css/mtu.min.css">
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
        <m-stepper style="width:50%;position: absolute;left: 50%;transform: translateX(-50%);" value="0">
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
                <div class="mdui-card-primary-title" style="font-size:30px">用户协议</div>
            </div>
            <m-scrollbar style="height: 260px">
                <div class="mdui-card-content" style="font-size:15px;text-align:left">
               <strong>反馈信息：https://wj.qq.com/s2/11590586/99ad/</strong>
                <br>  AS-RapidTeam（以下简称”我们“）依据本协议为用户（以下简称“你”）提供 RapidCMS服务。本协议对你和我们均具有法律约束力。
                <br>一、本服务的功能
                <br>1.1 辅助您开发你的网站
                <br>1.2 使您便捷的管理此网站。
                <br>二、责任范围及限制
                <br>2.1 你使用本服务得到的结果仅供参考，实际情况以官方为准。
                <br>三、隐私保护
                <br>3.1 我们重视对你隐私的保护，我们将按照如下条款适当处理您的个人信息。
                <br>3.1.1 我方出于开发与效果验证需要，可能会采集您的<strong>安装信息等部分内容</strong>。
                <br>3.1.2 我方除部分必须信息外，不会收集您的任何信息。
                <br>3.1.3 我方在收集信息时会以适当形式通知您，除必要信息外，我方收集信息时均需得到您的同意。
                <br>四、其他条款
                <br>4.1 本协议所有条款的标题仅为阅读方便，本身并无实际涵义，不能作为本协议涵义解释的依据。
                <br>4.2 本协议条款无论因何种原因部分无效或不可执行，其余条款仍有效，对双方具有约束力。
                <br>4.3 我们有权随时修改此用户协议，届时恕不通知。
                <br>4.4 我们拥有此协议最终解释权。
             

                </div>
            </m-scrollbar>

        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <label style="color:black;text-align:left;    position: absolute;left: 20%;" class="mdui-checkbox ">
            <input type="checkbox" onclick="checkboxOnclick(this)" />
            <i class="mdui-checkbox-icon "></i>
            我同意用户协议
        </label><br><br><br>
        <m-button disabled="true" theme="color" id="nextButton" onclick="window.location.href='setp2.php'">下一步</m-button>
        <script>
            function checkboxOnclick(checkbox) {
                if (checkbox.checked == true) {
                    document.getElementById('nextButton').disabled = "false"
                } else {
                    document.getElementById('nextButton').disabled = "true"
                }
            }
        </script>
        <script src="../../../../../../resource/js/mtu.min.js"></script>
    </div>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>