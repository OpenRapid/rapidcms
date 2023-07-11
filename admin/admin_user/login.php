<?php

?>

<link rel="stylesheet" href="../../../../../../resource/css/mdui.min.css" />
<link rel="stylesheet" href="../../../../../../resource/css/mtu.min.css">
<link rel="stylesheet" href="../../../../resource/css/style.css">
<link rel="stylesheet" href="../../../../../template/default/theme.css">

    <script src="../../../../../../resource/js/mtu.min.js"></script>
<script src="../../../../../../resource/js/mdui.min.js"></script>

<div id="form" class="mc-account mc-login mdui-dialog mdui-dialog-open " style="overflow: hidden;z-index:999;display: block; top: 150.104px; height: 540.792px;">

    <div class="mdui-dialog-title">RapidCMS管理中心 登录</div>

    <form id="formsq" action="./runlogin.php" method="post" >
        <div class="mdui-textfield"><label class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" value="admin" name="username" type="text" required="">
            <div class="mdui-textfield-error">账号不能为空</div>
        </div>
        <div class="mdui-textfield "><label class="mdui-textfield-label">密码</label><input class="mdui-textfield-input" value="" name="password" type="password" required="">
            <div class="mdui-textfield-error">密码不能为空</div>
        </div>
  

	
       <button type="submit"  name="sub" class="mdui-btn mdui-btn-raised mdui-color-deep-purple action-btn">确认</button>
    
    </form>
</div>

