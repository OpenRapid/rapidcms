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

                    子曰：“学而时习之，不亦说乎？有朋自远方来，不亦乐乎？人不知而不愠，不亦君子乎？”
                    <br>有子曰：“其为人也孝弟，而好犯上者，鲜矣；不好犯上而好作乱者，未之有也。君子务本，本立而道生。孝弟也者，其为仁之本与！”
                    <br>子曰：“巧言令色，鲜矣仁！”
                    <br>曾子曰：“吾日三省吾身：为人谋而不忠乎？与朋友交而不信乎？传不习乎？”
                    <br>子曰：“道千乘之国，敬事而信，节用而爱人，使民以时。”
                    <br>子曰：“弟子入则孝，出则弟，谨而信，泛爱众，而亲仁，行有余力，则以学文。”
                    <br>子夏曰：“贤贤易色；事父母，能竭其力；事君，能致其身；与朋友交，言而有信。虽曰未学，吾必谓之学矣。”
                    <br>子曰：“君子不重则不威，学则不固。主忠信，无友不如己者，过，则勿惮改。”
                    <br>曾子曰：“慎终追远，民德归厚矣。”
                    <br>子禽问于子贡曰：“夫子至于是邦也，必闻其政，求之与，抑与之与？”子贡曰：“夫子温、良、恭、俭、让以得之。夫子之求之也，其诸异乎人之求之与？”
                    <br>子曰：“父在，观其志；父没，观其行；三年无改于父之道，可谓孝矣。”
                    <br>有子曰：“礼之用，和为贵。先王之道，斯为美。小大由之，有所不行。知和而和，不以礼节之，亦不可行也。”
                    <br>有子曰：“信近于义，言可复也。恭近于礼，远耻辱也。因不失其亲，亦可宗也。”
                    <br>子曰：“君子食无求饱，居无求安，敏于事而慎于言，就有道而正焉，可谓好学也已。”
                    <br>子贡曰：“贫而无谄，富而无骄，何如？”子曰：“可也。未若贫而乐，富而好礼者也。”子贡曰：“《诗》云：‘如切如磋，如琢如磨’，其斯之谓与？”子曰：“赐也，始可与言《诗》已矣，告诸往而知来者。”
                    <br>子曰：“不患人之不己知，患不知人也。”

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