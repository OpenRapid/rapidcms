<?php
//引入变量和函数库
include("resource/variable.php");
include("resource/function.php");

//解析安装锁，将json弄到数组里面
$json_string = file_get_contents($servers["lockurl"]);
$data_json = json_decode($json_string, true);

//判断是否安装
if (!empty($data_json["lock"]) && $data_json["lock"] == "install") {
    if ($data_index["close"] == "true") {
        Header("Location: resource/close.php");
    } else {
        //引入系统的顶部<head>内容
        include("resource/head-message.php");
        //引入模板的附加CSS和代码等
        include('template/' . $data_index["template"] . '/header.php');
        echo '</head>';
        //引入模板的首页内容
        include("template/" . $data_index["template"] . "/index.php");
        //引入模板的附加JS和代码等
        include('template/' . $data_index["template"] . '/footer.php');
        //判断并加载插件
        $file = scandir("plugin");
        for ($i = 2; $i < count($file); $i++) {
            //先从version.json中判断是否启用了该插件
            $json_string = file_get_contents('plugin/' . $file[$i] . "/version.json");
            $row = json_decode($json_string, true);
            //如果启用就加载
            if ($row["use"] == true) {
                include("plugin/" . $file[$i] . "/index.php");
            }
        }
        //引用系统的尾部内容
        include("resource/foot-message.php");
    }
} else {
    //直接跳转安装
    Header("Location: install");
}
