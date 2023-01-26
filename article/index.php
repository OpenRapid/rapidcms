<?php
include("../resource/variable.php");
include("../resource/head-message.php");
include("../resource/function.php"); 
include('../template/' . $data_index["template"] . '/header.php');
echo '</head>';
$cid = $_GET["id"];
include("../template/" . $data_index["template"] . "/article.php");
include('../template/' . $data_index["template"] . '/footer.php');
include("../resource/foot-message.php");
