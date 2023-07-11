<?php
include("../header.php");

?>
    <div style=" position:  relative;left:25%;top:10%">


        <div class="mdui-card" style="width:600px">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">设置模板</div>
            </div>
            <m-scrollbar style="font-size:15px;height: 400px">
                <div class="mdui-card-content" style="font-size:18px;text-align:left">
                    当前模板：<? echo $data_index["template"] ?>
                    &nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;&nbsp;          &nbsp;&nbsp;     <a  target="_blank" href="../../../../template/<? echo $data_index["template"] ?>/setting.php"><button type="button" style="color:black" class="mdui-btn mdui-btn-raised  action-btn">模板单独设置</button></a><br><br>
                    <form method="post" action="temp-run.php"> 切换模板：
                        <select class="mdui-select" name="template" mdui-select>



                            <?php

                            $file = scandir("../../template");

                            for ($i = 2; $i < count($file); $i++) {
                                echo '  <option value="' . $file[$i] . '">' . $file[$i] . '</option>';
                            }
                            ?></select>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                    </form>
                    <form method="get" action="download-template.php"> 输入Key加载模板：
                      <div style="display: inline;">  
                    <input style="width:300px" class="mdui-textfield-input" name="name" type="text"
                                value="" required="">
                                <br>
                        <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                        </div>
                    </form>
                    <a  target="_blank" href="https://www.yuque.com/rapid/cms/yo0y1er0vg6rl86g"><button type="button" style="color:black" class="mdui-btn mdui-btn-raised  action-btn">进入文档获取模板</button><br><br></a>
                     

                </div>
            </m-scrollbar>

        </div>
    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>