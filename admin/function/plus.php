<?php
include("../header.php");

?>
    <br><br>
    <div style=" position:  relative;left:15%">
        <div class="mdui-card" style="width:70%;height:300px; ">
            <div class="mdui-card-primary" style="text-align:center;">
                <div class="mdui-card-primary-title" style="font-size:30px">数据设置</div>
            </div>
            <div class="mdui-tab" mdui-tab>
                <a href="#move1" class="mdui-ripple">备份数据</a>
                <a href="#move2" class="mdui-ripple">导入备份</a>
           <a href="#move3" class="mdui-ripple">迁移数据</a> 
            </div>
            <div id="move1" class="mdui-p-a-2">
            <label class="mdui-textfield-label">备份系统数据，树立安全意识</label>
               
                <a href="plus-back-run.php"><button name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">备份数据</button></a>
           </div>
            <div id="move2" class="mdui-p-a-2">
            <label class="mdui-textfield-label">配置文件暂不支持，请解压后手动复制粘贴</label>
            
           <!--    <form enctype="multipart/form-data" id="fileupdateform" method="post" action="plus-back-upload-sql.php"><button for="file" onclick="document.getElementById('file').click()" type="button" style="color:black" class="mdui-btn mdui-btn-raised  action-btn">导入.sql文件</button><br>                    <input style="display: none;" onchange="document.getElementById('fileupdateform').submit()"   name="file"  id="file" type="file" required=""></form>
    --></div>
           <div id="move3" class="mdui-p-a-2">
            <label class="mdui-textfield-label">迁移其他数据，便捷导入内容</label>
                   <a href="plus-shark.php"><button name="sub" class="mdui-btn mdui-btn-raised mdui-text-color-black action-btn">从SharkCMS迁移数据</button></a>
       
            </div>
         </div>
    </div>
    <br>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>

</body>

</html>