<?php
include("../header.php");

?>

    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">用户设置</div>
            </div>
           
                <m-scrollbar style="height: 650px;width:900px;text-align:left ">
                <div id="login" class="mc-account mc-login mdui-dialog mdui-dialog-open " style="overflow: hidden;z-index:999;display: block; top: 150.104px; height: 540.792px;">
                <button class="mdui-btn mdui-btn-icon close" onclick="window.location.href='user.php'"><i class="mdui-icon material-icons">close</i></button>
 
<div class="mdui-dialog-title">修改用户密码</div>
<form method="post" action="user-move-run.php">
<div style="display:none" class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom "><label class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" value="<?echo $_GET["username"]?>"  name="username" type="text" >
        <div class="mdui-textfield-error">账号不能为空</div>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom "><label class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" value="<?echo $_GET["username"]?>" type="text" disabled="true">
        <div class="mdui-textfield-error">账号不能为空</div>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label class="mdui-textfield-label">新密码</label><input class="mdui-textfield-input" name="password" type="password" required="">
        <div class="mdui-textfield-error">密码不能为空</div>
    </div>
    <div class="actions mdui-clearfix">
       <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">修改</button>
    </div>
</form>
</div>
                </m-scrollbar>
  
        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>



