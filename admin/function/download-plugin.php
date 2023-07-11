<?php
include("../header.php");

?>
    <div class="medium" style=" text-align:center;display: flex">

        <div>
            <div style="color:black;font-size: 20px;" class="mdui-typo">
                <h1 style="font-weight: bold;">插件获取</h1>
                <h5>插件名称：<?php echo $_GET["name"]; ?> </h5>
                
                <br>


                <?php

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  
file_put_contents("../../plugin/".$_GET["name"].".zip", file_get_contents("http://cdn.jsdelivr.net/gh/codewyx/cmscdn/plugin/".$_GET["name"].".zip", false, stream_context_create($arrContextOptions)));
            
require_once('../src/pclzip.lib.php');

                $zip = new PclZip("../plugin/".$_GET["name"].".zip");
                $result = $zip->extract(PCLZIP_OPT_PATH, "../plugin/");
                if ($result == 0) {
                    echo '<br>输入错误';
                    unlink("../../plugin/" . $_GET["name"] . ".zip");
                } else {
                    echo '<br>导入成功';
                    unlink("../../plugin/" . $_GET["name"] . ".zip");
                }

                ?>
            </div>

        </div>
    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>