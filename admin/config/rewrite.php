<? include("../header.php"); ?>
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">伪静态设置</div>
            </div>
            <form method="post" action="run-rewrite.php">
                <m-scrollbar style="height: 620px;width:900px">
                    <div class="mdui-card-content" style="font-size:15px;text-align:left">

                        
                        <div class="mdui-tab" mdui-tab>
                            <a href="#Apache" class="mdui-ripple">Apache伪静态</a>
                            <a href="#Nginx" class="mdui-ripple">Nginx伪静态</a>

                        </div>
                        <div id="Apache" class="mdui-p-a-2">
                            RewriteEngine On<br>
                            RewriteRule index.html index.php<br>
                            RewriteRule ^c/([a-zA-Z0-9\-]*)$ category/index.php?id=$1<br>
                            RewriteRule ^c/([a-zA-Z0-9\-]*)/$ category/index.php?id=$1<br>
                            RewriteRule ^a/([a-zA-Z0-9\-]*)$ article/index.php?id=$1<br>
                            RewriteRule ^a/([a-zA-Z0-9\-]*)/$ article/index.php?id=$1<br>
                        </div>
                        <div id="Nginx" class="mdui-p-a-2">
                            rewrite /index.html /index.php;<br>
                            rewrite ^/c/([a-zA-Z0-9\-]*)$ /category/index.php?id=$1;<br>
                            rewrite ^/c/([a-zA-Z0-9\-]*)/$ /category/index.php?id=$1;<br>
                            rewrite ^/a/([a-zA-Z0-9\-]*)$ /article/index.php?id=$1;<br>
                            rewrite ^/a/([a-zA-Z0-9\-]*)/$ /article/index.php?id=$1;<br>
                        </div>
                        <div class="mdui-divider"></div><br>
                        <label class="mdui-switch">
                            开启伪静态&nbsp;&nbsp;&nbsp;
                            <input <?
                                    if ($data_index["rewrite"] == "true") {
                                        echo " checked='true'";
                                    }
                                    ?> name="rewrite" type="checkbox" />
                            <i class="mdui-switch-icon"></i>
                        </label>  <br>
                        &nbsp;&nbsp;&nbsp;
                        <label class="mdui-textfield-label">注意：将伪静态规则填写到对应处再开启此选项，否则会遇到意想不到的后果。</label>
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