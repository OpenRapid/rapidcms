<?php
include("../header.php");

?>
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">修改管理员密码</div>
            </div>
            <form method="post" action="run-movepass.php">
                <m-scrollbar style="height: 300px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">输入密码</label>
                            <input class="mdui-textfield-input" name="password" type="password"
                              required="">
                              <div class="mdui-textfield-error">密码不能为空</div>
                        </div>
                        <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
                            <label class="mdui-textfield-label">重复密码</label>
                            <input class="mdui-textfield-input" name="password2" type="password"
                               required="">
                               <div class="mdui-textfield-error">重复密码不能为空</div>
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