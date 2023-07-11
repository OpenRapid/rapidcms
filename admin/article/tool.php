<?php
include("../header.php");

?>

<div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

    <div class="mdui-card">

        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title" style="font-size:30px">小组件设置</div>
        </div>
        <form method="post" action="run-tool.php">
            <m-scrollbar style="height: 620px;width:900px">
                <div class="mdui-card-content" style="font-size:15px;text-align:left">

                    <label class="mdui-switch">
                        开启小组件&nbsp;&nbsp;&nbsp;
                        <input <?
                                if ($data_tool["tool"]  == "true") {
                                    echo " checked='true'";
                                }
                                ?> name="tool" type="checkbox" />
                        <i class="mdui-switch-icon"></i>
                    </label> <br>
                    <label class="mdui-textfield-label">选择小组件</label>
                    <select class="mdui-select" name="kind" id="kind" onchange="kindmove()" mdui-select>
                        <?

                        if ($data_tool["kind"] == "one") {
                            echo ' <option value="one" selected>一言</option>';
                            echo '   <option value="time" >时间</option>';
                            echo '   <option value="write" >自定义</option>';
                        } else if ($data_tool["kind"] == "time") {
                            echo ' <option value="one" >一言</option>';
                            echo '   <option value="time" selected>时间</option>';
                            echo '   <option value="write" >自定义</option>';
                        } else {
                            echo ' <option value="one" >一言</option>';
                            echo '   <option value="time" >时间</option>';
                            echo '   <option value="write" selected>自定义</option>';
                        }
                        ?>


                    </select> <br> <br>
                    <div id="con" style="display:none" class="mdui-textfield  mdui-textfield-has-bottom ">
                        <label class="mdui-textfield-label">输入内容</label>


                        <textarea rows="7" class="mdui-textfield-input" name="content" type="text" required=""><? echo $data_tool["content"]; ?></textarea>
                    </div>
                    <br>
                    <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                </div>
            </m-scrollbar>
        </form>
    </div>

</div>
<script>
    function kindmove() {
        if (document.getElementById("kind").value == "write") {
            document.getElementById("con").style.display = "inline";
        } else {
            document.getElementById("con").style.display = "none";
        }
    }
    window.onload = () => {
        kindmove()
    }
</script>
<script src="../../../../../../resource/js/mtu.min.js"></script>
<script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>