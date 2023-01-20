<div id="login" class="mc-account mc-login mdui-dialog " style="z-index:-999;display: block; top: 150.104px; height: 540.792px;">
<button class="mdui-btn mdui-btn-icon close" mdui-dialog-close><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title">登录</div>

    <form method="post" action="../../../../resource/runlogin.php?goto=<?php echo curPageURL();?>">
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5"><label class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" name="username" type="text" required="">
            <div class="mdui-textfield-error">账号不能为空</div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label class="mdui-textfield-label">密码</label><input class="mdui-textfield-input" name="password" type="password" required="">
            <div class="mdui-textfield-error">密码不能为空</div>
        </div>
        <div class="actions mdui-clearfix">
           <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">登录</button>
        </div>
    </form>
</div>


<div id="logon" class="mc-account  mc-register mdui-dialog " style="z-index:-998;display: block; top: 150.104px; height: 540.792px;">
<button class="mdui-btn mdui-btn-icon close" mdui-dialog-close><i class="mdui-icon material-icons">close</i></button>
    <div class="mdui-dialog-title">注册</div>
    <?php
    include("../../resource/variable.php");
    if($data_mail["logonwithmail"]=="true"){
        echo '  <form method="get" action="../../../../resource/mailenter.php">';
    }else{
        echo '  <form method="post" action="../../../../resource/runlogon.php?goto='.curPageURL().'">';
    }
    ?>
  
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom mdui-textfield-invalid-html5"><label class="mdui-textfield-label">用户名</label><input class="mdui-textfield-input" name="username" type="text" required="">
            <div class="mdui-textfield-error">账号不能为空</div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom"><label class="mdui-textfield-label">密码</label><input class="mdui-textfield-input" name="password" type="password" required="">
            <div class="mdui-textfield-error">密码不能为空</div>
        </div>
        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
        <?php
    include("../../resource/variable.php");
    if($data_mail["logonwithmail"]=="true"){
        echo '  <label class="mdui-textfield-label">邮箱</label>
        <input class="mdui-textfield-input" name="mail" type="email" required="">
        <div class="mdui-textfield-error">邮箱格式不符</div> ';
    }else{
        echo '   <label class="mdui-textfield-label">重复密码</label>
        <input class="mdui-textfield-input" name="password2" type="password" required="">
        <div class="mdui-textfield-error">重复密码不能为空</div>';
    }
    ?>
          
        </div>
           <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">注册</button>
        
    </form>
</div>