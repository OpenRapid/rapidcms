<?php
include("../header.php");

?>
    <div class="medium" style=" text-align:center;display: flex">

        <div>
            <div style="color:black;font-size: 20px;" class="mdui-typo">
                <h1 style="font-weight: bold;">版本更新</h1>
                <h5>正在更新中，版本：<?php echo $_GET["version"]; ?> </h5>

                <br>


                <?php

                $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                );
                file_put_contents("../../upload/" . $_GET["version"] . ".zip", file_get_contents("http://cdn.jsdelivr.net/gh/codewyx/cmscdn/version/" . $_GET["version"] . ".zip", false, stream_context_create($arrContextOptions)));

                require_once('../src/pclzip.lib.php');

                $zip = new PclZip("../../upload/" . $_GET["version"] . ".zip");
                $result = $zip->extract(PCLZIP_OPT_PATH, "../");
                if ($result == 0) {
                    echo '<br>更新失败';
                    unlink("../../upload/" . $_GET["version"] . ".zip");
                } else {
                    echo '<br>更新成功';
                    unlink("../../upload/" . $_GET["version"] . ".zip");
                }

                ?>
            </div>

        </div>
    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>