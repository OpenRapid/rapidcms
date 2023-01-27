<?php
include("resource/variable.php");
include("resource/function.php");
$json_string = file_get_contents($servers["lockurl"]);
$data_json = json_decode($json_string, true);
if ($data_json["lock"] == "install") {
    include("resource/head-message.php");
    include('./././././template/' . $data_index["template"] . '/header.php');
    echo '</head>';
    include("template/" . $data_index["template"] . "/index.php");
    include('template/' . $data_index["template"] . '/footer.php');
    $file = scandir("plugin");
    for ($i = 2; $i < count($file); $i++) {
        include("plugin/" . $file[$i] . "/index.php");
    }
    include("resource/foot-message.php");
} else {
    Header("Location: install");
}
