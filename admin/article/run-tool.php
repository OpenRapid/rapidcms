<?php
include("../check.php");
$data1 = array();
if ($_POST["tool"] == "on") {
    $data1['tool'] = "true";
} else {
    $data1['tool'] = "false";
}
$data1['kind'] = $_POST["kind"];
if ($_POST["kind"] == "one") {
    $data1['content'] = '<center><p id="hitokoto"><a style="color:#000000" href="#" id="hitokoto_text">获取中...</a></p></center><script>fetch(\'https://v1.hitokoto.cn\').then(response => response.json()).then(data => {const hitokoto = document.querySelector(\'#hitokoto_text\');hitokoto.href = \'https://hitokoto.cn/?uuid=\' + data.uuid;
        if (data.from_who == null) {
        hitokoto.innerHTML = "「 " + data.hitokoto + " 」<br>——" + data.from;
        }else {
        hitokoto.innerHTML = "「 " + data.hitokoto + " 」<br>——" + data.from_who + "「" + data.from + "」"
        }}).catch(console.error)
        </script>';
} else if ($_POST["kind"] == "time") {
    $data1['content'] = '<center><a  id="time_is_link" rel="nofollow" style="display:none"></a><span id="China_z43d" style="font-size:25px;"></span><script src="https://widget.time.is/t.js"></script><script>time_is_widget.init({China_z43d:{}});</script></center>';
} else {
    $data1['content'] = $_POST["content"];
}


$json_string1 = json_encode($data1);
$filename1 = '../../resource/config/tool.json';
$fp1 = fopen($filename1, "w");
$len1 = fwrite($fp1, $json_string1);
fclose($fp1);
echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"tool.php\"</script>";
