<?php
include("../resource/variable.php");
include("../resource/head-message.php");
include("../resource/function.php"); 
include('../template/' . $data_index["template"] . '/header.php');
echo '</head>';
$cid = $_GET["id"];
include("../template/" . $data_index["template"] . "/category.php");
include('../template/' . $data_index["template"] . '/footer.php');
$file = scandir("../plugin");
for ($i = 2; $i < count($file); $i++) {
    $json_string = file_get_contents('../plugin/' . $file[$i] . "/version.json");
    $row = json_decode($json_string, true);
    if ($row["use"] == true) {
        include("../plugin/" . $file[$i] . "/index.php");
    }
}
include("../resource/foot-message.php");

