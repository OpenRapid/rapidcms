<?php include("head-menu.php") ?>
<div class="mdui-container" style="margin:auto;">


    <div class="mdui-text-color-black  ">
        <br>
        <div id="page-question" class="mdui-container">
            <div class="mc-nav" onclick="window.history.go(-1);"><button class="back mdui-btn mdui-color-theme mdui-ripple"><i class="mdui-icon mdui-icon-left material-icons">arrow_back</i>返回</button></div>
            <?php include("get-sql-article.php") ?>
            <br>

            <?php include("get-sql-chat.php") ?>

        </div>

    </div>
    <?php include("login-logon-onload.php") ?>
    <script>
        function randomString(length, ) {
            var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
            var result = '';
            for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
            return result;
        }

        function resetnum() {
            document.getElementById("ranid").value = randomString(10);
        }
        window.onload = function() {
            resetnum()
        }
    </script>
      <?php
        function encode1($string = '', $skey = 'cxphp')
        {
            $strArr = str_split(base64_encode($string));
            $strCount = count($strArr);
            foreach (str_split($skey) as $key => $value)
                $key < $strCount && $strArr[$key] .= $value;
            return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
        }

        define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
        define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
       $json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
        $dataxxx = json_decode($json_string, true);
        $link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
        $sql = "select password from `rapidcmsuser` where username=\"" . $_COOKIE["name"] . "\"";
        $result = mysqli_query($link, $sql);
        $pass = mysqli_fetch_row($result);
        $pa = $pass[0];

        if ($_COOKIE["user"] == encode1($_COOKIE["name"], $pa)&&$_COOKIE["user"]!="") {
            echo ' <button onclick="document.getElementById(\'chaton\').style.zIndex=999999"  mdui-menu="{target: \'#chaton\'}" class="mdui-fab mdui-fab-fixed mdui-fab-extended mdui-ripple mdui-color-theme"><i class="mdui-icon material-icons">add</i><span>写评论</span></button>
            ';
        } else {
            echo '<button class="mdui-fab mdui-fab-fixed mdui-fab-extended mdui-ripple mdui-color-theme"><i class="mdui-icon material-icons">add</i><span>请先登录</span></button>';
        }
        ?>

    <div id="chaton" class="mc-account  mc-login mdui-dialog " style="z-index:-998;display: block">
        <div class="mdui-dialog-title">写回答</div>
        <form method="post" action="../../../../resource/enteranswer.php?goto=<?php echo curPageURL();?>">

            <input style="display:none" class="mdui-textfield-input" name="id" id="ranid" value="" type="text" required="">
            <input style="display:none" class="mdui-textfield-input" name="people" value="<?php echo $_COOKIE["name"] ?>" type="text" required="">
            <input style="display:none" class="mdui-textfield-input" name="articleid" value="<?php echo $_GET["id"] ?>" type="text" required="">

            <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">
                <textarea class="mdui-textfield-input" rows="7" name="content" placeholder="输入内容" ></textarea>
                <div class="mdui-textfield-error">内容不能为空</div>
            </div>
            <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">提交</button>

        </form>
    </div>