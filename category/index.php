<?php
//引入变量和函数库
include("../resource/variable.php");
include("../resource/function.php"); 
if ($data_index["close"] == "true") {
    echo '网页正在维护中！';
} else {
    //设置分类的id变量，方便模板回去数据
    $cid = $_GET["id"];

    //引入系统的顶部<head>内容
    include("../resource/head-message.php");
    //引入模板的附加CSS和代码等
    include('../template/' . $data_index["template"] . '/header.php');
    echo '</head>';
    //引入模板的分类内容
    include("../template/" . $data_index["template"] . "/category.php");
    //引入模板的附加JS和代码等
    include('../template/' . $data_index["template"] . '/footer.php');
    //判断并加载插件
    $file = scandir("../plugin");
    for ($i = 2; $i < count($file); $i++) {
        $json_string = file_get_contents('../plugin/' . $file[$i] . "/version.json");
        $row = json_decode($json_string, true);
        if ($row["use"] == true) {
            include("../plugin/" . $file[$i] . "/index.php");
        }
    }
    //引用系统的尾部内容
    include("../resource/foot-message.php");

}