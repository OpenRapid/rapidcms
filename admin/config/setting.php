<? include("../header.php"); ?>

    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">基本设置</div>
            </div>
            <form method="post" action="run-setting.php">
                <m-scrollbar style="height: 720px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">网站名称</label>
                            <input class="mdui-textfield-input" name="title" type="text" value="<? echo $data_header["title"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">版权信息</label>
                            <input class="mdui-textfield-input" name="con" type="text" value="<? echo $data_header["con"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">标签页标题</label>
                            <input class="mdui-textfield-input" name="headname" type="text" value="<? echo $data_header["headname"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">首页简介</label>
                            <input class="mdui-textfield-input" name="introduce" type="text" value="<? echo $data_header["introduce"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">SEO描述</label>
                            <input class="mdui-textfield-input" name="description" type="text" value="<? echo $data_header["description"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">SEO关键词</label>
                            <input class="mdui-textfield-input" name="keywords" type="text" value="<? echo $data_header["keywords"]; ?>" required="">
                        </div>

                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                    </div>
                </m-scrollbar>
            </form>
        </div>  <br>
        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">设置图标</div>
            </div>
            
            <div class="mdui-card-content" style="font-size:15px;text-align:left">
                <div class="mdui-textfield  mdui-textfield-has-bottom ">
                    <label class="mdui-textfield-label">当前图标</label>

                    <input class="mdui-textfield-input" name="icon" type="text" value="<? echo $data_header["icon"]; ?>" disabled>
                    <br>
                    <label class="mdui-textfield-label">上传图标</label>
                    <form    enctype="multipart/form-data" id="fileupdateform" method="post" action="uploadicon.php">
                    <button for="file" onclick="document.getElementById('file').click()" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">选择并上传</button>
                        <input style="display: none;" onchange="document.getElementById('fileupdateform').submit()" name="file"  id="file" type="file" required="">
                        <br><br>
                        
                    </form>
                </div>
            </div>
        </div>
        <br>
      
        <br>
    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>