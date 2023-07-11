<? include("../header.php"); ?>
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">邮箱设置</div>
            </div>
            <form method="post" action="run-mail.php">
                <m-scrollbar style="height: 650px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">


                        <label class="mdui-switch">
                            开启邮箱注册&nbsp;&nbsp;&nbsp;
                            <input <?
                                    if ($data_mail["logonwithmail"] == "true") {
                                        echo " checked='true'";
                                    }
                                    ?> name="logonwithmail" type="checkbox" />
                            <i class="mdui-switch-icon"></i>
                        </label>


                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">SMTP服务器</label>
                            <input class="mdui-textfield-input" name="smtp" type="text" value="<? echo $data_mail["smtp"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">加密方式</label>
                            <input class="mdui-textfield-input" name="secure" type="text" value="<? echo $data_mail["secure"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">加密端口</label>
                            <input class="mdui-textfield-input" name="port" type="number" value="<? echo $data_mail["port"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">邮箱地址</label>
                            <input class="mdui-textfield-input" name="username" type="mail" value="<? echo $data_mail["username"]; ?>" required="">
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">SMTP专用密码</label>
                            <input class="mdui-textfield-input" name="password" type="text" value="<? echo $data_mail["password"]; ?>" required="">
                        </div>
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">提交</button>

                    </div>
                </m-scrollbar>
            </form>
        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>