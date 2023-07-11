<? include("../header.php"); ?>
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">


        <div class="mdui-card" style="width:900px">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">网站服务设置</div>
            </div>
            <form method="post" action="run-close.php">
            <div class="mdui-card-content" style="font-size:15px;text-align:left">
            <label class="mdui-switch">
                            启用网页维护&nbsp;&nbsp;&nbsp;
                            <input <?
                                    if ($data_index["close"]  == "true") {
                                        echo " checked='true'";
                                    }
                                    ?> name="close" type="checkbox" />
                            <i class="mdui-switch-icon"></i>
                        </label> 
                        <br> <br>
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">确认</button>
                  
            </div>
            </form>
        </div>
        <br>
    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>