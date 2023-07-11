<?php
include("../header.php");

?>
    <br><br>
    <div style=" position:  relative;left:15%">
        <div class="mdui-card" style="width:70%;height:300px; ">
            <div class="mdui-card-primary" style="text-align:center;">
                <div class="mdui-card-primary-title" style="font-size:30px">从SharkCMS迁移数据</div>
            </div>
            <br>
            <label class="mdui-textfield-label">&nbsp;&nbsp;&nbsp;选择导入方式</label>
            &nbsp;&nbsp;&nbsp;
            <label class="mdui-radio">
                <input type="radio" name="group1" checked />
                <i class="mdui-radio-icon"></i>
                从本程序所在数据库导入
            </label>

            <label class="mdui-radio">
                <input type="radio" name="group1" disabled />
                <i class="mdui-radio-icon"></i>
                从其他数据库导入（暂不支持）
            </label>
            <br>  <br>
            &nbsp;&nbsp;&nbsp;<a href="plus-shark-run.php"><button name="sub" class="mdui-btn mdui-btn-raised mdui-text-color-black action-btn">一键导入文章</button></a>
       
        </div>
    </div>
    <br>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>