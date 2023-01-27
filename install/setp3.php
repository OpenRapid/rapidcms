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
        <m-stepper style="width:50%;position: absolute;left: 50%;transform: translateX(-50%);" value="2">
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
                <div class="mdui-card-primary-title" style="font-size:30px">填写信息</div>
            </div>
            <form action='setp4.php' method='POST' id="Form">
            <div style="text-align:left" >
                <div style="position: absolute;left: 25%;transform: translateX(-50%);">
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">Mysql地址</label>
                        <input id="form1" class="mdui-textfield-input" oninput="inputok()" name="server" value="localhost" type="text" />
                    </div>
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">Mysql用户名</label>
                        <input id="form2" class="mdui-textfield-input" oninput="inputok()" name="dbusername" value="" type="text" required="required"/>
                    </div>
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">Mysql密码</label>
                        <input id="form3" class="mdui-textfield-input" oninput="inputok()" name="dbpassword" value="" type="password" required="required"/>
                    </div>
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">Mysql库名</label>
                        <input id="form4" class="mdui-textfield-input" oninput="inputok()" name="dbname" value="" type="text" required="required"/>
                    </div>
                </div>
                <div style="position: absolute;left: 50%;transform: translateX(-50%);top:24%;height:290px;width:1px;background-color:#757575"></div>
                <div style="position: absolute;left: 75%;transform: translateX(-50%);">
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">后台用户名</label>
                        <input class="mdui-textfield-input" name="username" value="admin" type="text" disabled="disabled"/>
                    </div>
                    <div class="mdui-textfield" style="width:300px">
                        <label class="mdui-textfield-label">后台密码</label>
                        <input id="form5" class="mdui-textfield-input" oninput="inputok()" name="password" value="" type="password" required="required"/>
                    </div>
                   
                </div>
            </div>
            </form>  
        </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <m-button theme="color" onclick="window.location.href='setp2.php'">上一步</m-button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <m-button disabled="true" theme="color" id="nextButton" onclick="NextStep()">下一步</m-button>
     
         <script>
            function NextStep() {
                document.getElementById("Form").submit();
            }
            function inputok() {
              if(document.getElementById("form1").value!=""&&document.getElementById("form2").value!=""&&document.getElementById("form1").value!=""&&document.getElementById("form3").value!=""&&document.getElementById("form4").value!=""&&document.getElementById("form5").value!=""){
                document.getElementById("nextButton").disabled="false"
              }else{
                document.getElementById("nextButton").disabled="true"
              }
            }
        </script>
        <script src="../../../../../../resource/js/mtu.min.js"></script>
    </div>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>