<?php
include("../header.php");

?>
    <div style=" position:  relative;left:15%">
    <br><br>
        <div class="mdui-card" style="width:70%;height:300px; ">
            <div class="mdui-card-primary" style="text-align:center;">
                <div class="mdui-card-primary-title" style="font-size:30px">版本更新</div>
            </div>
            <div style="color:black;font-size: 20px;" class="mdui-typo">
                <h5>&nbsp;&nbsp;&nbsp;当前版本：Dev.<? echo $data_index["version"]; ?></h5>
                <h5 id="contents">&nbsp;&nbsp;&nbsp;正在获取中，请稍后……</h5>
                &nbsp;&nbsp;&nbsp;<a  id="bt1" style="display:none"><button name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">点击更新</button></a>
                <a href="https://yuque.com/rapid/cms" id="bt2" style="display:none"><button name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">此版本为结构更新，请备份并删除数据库重新安装！</button></a>
                   
                <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
                <script>
                    $.ajaxSetup({cache:false})
                    $.ajax({
                        type: "GET",
                        url: "https://cdn.jsdelivr.net/gh/codewyx/cmscdn/version.json",
                        dataType: "json",
                        success: function(data) {
                            console.log(data["version"]);
                            if (data["version"] != "<? echo $data_index["version"]; ?>") {
                                document.getElementById("contents").innerHTML = "&nbsp;&nbsp;&nbsp;当前有更新，最新版本为：Dev." + data["version"];
                                if (data["function"] == 1) {
                                    document.getElementById("bt1").style.display="inline";
                                    document.getElementById("bt1").href="update-run.php?version="+data["version"];
                                } else {
                                    document.getElementById("bt2").style.display="inline";
                                }
                            } else {
                                document.getElementById("contents").innerHTML = '&nbsp;&nbsp;&nbsp;当前为最新版本，感谢使用！';
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>


    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>