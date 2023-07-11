<?php include("menu.php") ?>
<style>
    * {
        font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
<div class="mdui-container" style="margin:auto;">


    <div class="mdui-text-color-black  ">
        <br>
        <div id="page-question" class="mdui-container">
            <div class="mc-nav" onclick="window.history.go(-1);"><button class="back mdui-btn mdui-color-theme mdui-ripple"><i class="mdui-icon mdui-icon-left material-icons">arrow_back</i>返回</button></div>
            <?php
            error_reporting(0);
            header("Content-type:text/html;charset=utf-8");
            $table_name = "rapidcmspage";
            $json_string = file_get_contents(BASE_PATH1 . '/install/sql-config/sql.json');
            $data = json_decode($json_string, true);
            $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
            $sql = 'select * from `' . $table_name . '` WHERE id="' . $cid . '"';
            $res = mysqli_query($conn, $sql);
            $colums = mysqli_num_fields($res);
            while ($row = mysqli_fetch_row($res)) {
                $cont3 = htmlspecialchars_decode(rawurldecode($row[2]));
                echo '<div class="mdui-card mdui-card-shadow question"><h1 class="title">' . rawurldecode($row[1]) . '</h1>';
                echo '  <div class="mc-user-line"><div class="mc-user-popover"><span style="color:#757575">' . $row[3] . '</span>';
                echo '  </div></div><div class="mdui-typo" style="padding: 12px 0 32px;">' . $cont3 . " </div><br>  <br>  <br></div>                ";
            }
            ?>
            <br>
            <?php
            if ($data_tool["tool"] == "true") {
                echo '<div class="mdui-card mdui-card-shadow question"> <br>';
                echo ' <div class="mdui-typo" style="padding: 10px;">' . $data_tool["content"] . '</div><br></div><br>';
            }
            ?>
            <script>
                function copyText(text) {
                    var textareaC = document.createElement('textarea');
                    textareaC.setAttribute('readonly', 'readonly');
                    textareaC.value = text;
                    document.body.appendChild(textareaC);
                    textareaC.select();
                    var res = document.execCommand('copy');
                    document.body.removeChild(textareaC);
                    console.log("复制成功");
                    return res;
                }

                function sendaddgood(uid, articleid) {
                    var httpRequest = new XMLHttpRequest();
                    httpRequest.open('POST', '../../../../../resource/addgood.php', true);
                    httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    httpRequest.send('id=' + uid);

                    httpRequest.onreadystatechange = function() {
                        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                            var json = httpRequest.responseText;
                            document.getElementById("goodbut_" + uid).innerHTML = json;
                        }
                    };
                }
            </script>
            <?php
            error_reporting(0);
            header("Content-type:text/html;charset=utf-8");
            $table_name = "rapidcmschat";

            $json_string = file_get_contents(BASE_PATH1 . '/install/sql-config/sql.json');
            $data = json_decode($json_string, true);
            $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
            $sql = 'select * from `' . $table_name . '` WHERE articleid="' . $cid . '" ORDER BY time DESC';
            $res = mysqli_query($conn, $sql);
            $colums = mysqli_num_fields($res);
            $row = mysqli_num_rows($res);
            if ($row != 0) {
                echo '<div class="mdui-card answers">   ';
            }

            while ($row = mysqli_fetch_row($res)) {
                echo '<div class="item"><div class="mc-user-line"><div class="mc-user-popover"><a class="avatar user-popover-trigger"><i class="mdui-list-item-icon mdui-icon material-icons">people</i></a>    ';
                echo '<a class="username user-popover-trigger mdui-text-color-theme-text">' . $row[1] . '</a>    ';
                echo '<div class="more"><span class="time mdui-text-color-theme-secondary" >' . $row[4] . '</span></div>';
                echo '</div></div><div class="content mdui-typo"><p>' . html_entity_decode(rawurldecode($row[2])) . '</p>';
                echo '</div><div class="actions"><div class="mc-vote"><button onclick="sendaddgood(\'' . $row[0] . '\',\'' . $row[5] . '\')" class="mc-icon-button mdui-btn mdui-btn-icon mdui-btn-outlined" mdui-tooltip="{content: \'顶一下\', delay: 300}">    ';
                echo '<span id="goodbut_' . $row[0] . '" class="badge">' . $row[3] . '</span>    ';
                echo '<i class="mdui-icon material-icons mdui-text-color-theme-icon">thumb_up</i></button></div><div class="flex-grow"></div><div class="mc-options-button">    ';
                echo '<button mdui-menu="{target: \'#attr_' . $row[0] . '\',position:\'top\',align:\'right\',covered:false}" class="mdui-btn mdui-btn-icon mdui-text-color-theme-icon mdui-ripple"><i class="mdui-icon material-icons">more_vert</i></button>    ';
                echo '<ul class="mdui-menu " id="attr_' . $row[0] . '" style="top: 7px; left: 597px; transform-origin: 100% 100%; position: absolute;">    ';
                echo '<li class="mdui-menu-item"><a onclick="copyText(\'' . $row[0] . '\')" class="mdui-ripple">复制评论ID</a></li></ul></div></div></div>    ';
            }
            if ($row != 0) {
                echo '</div>';
            }

            ?>

        </div>

    </div>
    <?php include("login-logon.php") ?>
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

    define('BASE_PATH', str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");
    define('BASE_PATH1', str_replace('\\', '/', realpath(dirname(BASE_PATH) . '/')) . "/");
    $json_string = file_get_contents(BASE_PATH1 . '/install/sql-config/sql.json');
    $dataxxx = json_decode($json_string, true);
    $link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'], $dataxxx['dbname']);
    $sql = "select password from `rapidcmsuser` where username=\"" . $_COOKIE["name"] . "\"";
    $result = mysqli_query($link, $sql);
    $pass = mysqli_fetch_row($result);
    $pa = $pass[0];

    if ($_COOKIE["user"] == encode1($_COOKIE["name"], $pa) && $_COOKIE["user"] != "") {
        echo ' <button onclick="document.getElementById(\'chaton\').style.zIndex=999999"  mdui-menu="{target: \'#chaton\'}" class="mdui-fab mdui-fab-fixed mdui-fab-extended mdui-ripple mdui-color-theme"><i class="mdui-icon material-icons">add</i><span>写评论</span></button>
            ';
    } else {
        echo '<button onclick="document.getElementById(\'login\').style.zIndex=999999" mdui-dialog="{target: \'#login\'}" class="mdui-fab mdui-fab-fixed mdui-fab-extended mdui-ripple mdui-color-theme"><i class="mdui-icon material-icons">add</i><span>请先登录</span></button>';
    }
    ?>

    <div id="chaton" class="mc-account  mc-login mdui-dialog " style="z-index:-998;display: block">
        <div class="mdui-dialog-title">写回答</div>
        <form id="form" method="post" action="../../../../resource/enteranswer.php?goto=<?php echo curPageURL(); ?>">

            <input style="display:none" class="mdui-textfield-input" name="id" id="ranid" value="" type="text" required="">
            <input style="display:none" class="mdui-textfield-input" name="people" value="<?php echo $_COOKIE["name"] ?>" type="text" required="">
            <input style="display:none" class="mdui-textfield-input" name="articleid" value="<?php echo $_GET["id"] ?>" type="text" required="">

            <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom">

                <div class="mdui-textfield-input" id="content" style="height:200px" placeholder="输入内容" contenteditable="true"></div>
                <textarea style="display:none" id="area" name="content"></textarea>
                <div class="mdui-textfield-error">内容不能为空</div>
            </div>
            <button class="mdui-btn r-menu" type="button" mdui-menu="{target: '#emoji'}">
                <i class="mdui-icon material-icons">sentiment_satisfied</i>
            </button>

            <ul class="mdui-menu" id="emoji">
                <m-scrollbar style="height: 200px">
                    <?php
                    $pizza = "128512 128513 128514 128515 128516 128517 128518 128519 128520 128521 128522 128523 128524 128525 128526 128527 128528 128529 128530 128531 128532 128533 128534 128535 128536 128537 128538 128539 128540 128541 128542 128543 128544 128545 128546 128547 128548 128549 128550 128551 128552 128553 128554 128555 128556 128557 128558 128559 128560 128561 128562 128563 128564 128565 128566 128567 128568 128569 128570 128571 128572 128573 128574 128575 128576 128577 128578 128579 128580 129296 129297 129298 129299 129300 129301 129305 129306 129307 129308 129309 129310 129311 129312 129313 129314 129315 129316 129317 129318 129319 129320 129321 129322 129323 129324 129325 129326 129327 128544 128545 128546 128547 128548 128549 128550 128551 128552 128553 128554 128555 128556 128557 128558 128559 128560 128561 128562 128563 128564 128565 128566 128567 128568 128569 128570 128571 128572 128573 128574 128575 128576 128577 128578 128579 128580";
                    $pieces = explode(" ", $pizza);
                    for ($i = 0; $i < 135; $i++) {
                        echo '<button onclick="enteremoji(\'' . $pieces[$i] . '\')" class="mdui-btn r-menu-square" type="button">&#' . $pieces[$i] . ';</button>';
                    }
                    ?>
                    <script>
                        function enteremoji(value) {
                            console.log("ok")
                            document.getElementById("content").innerHTML = document.getElementById("content").innerHTML + "&#" + value + ";"
                        }
                    </script>
                </m-scrollbar>
            </ul>

            <button type="button" name="sub" onclick="sub1()" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">提交</button>
            <script>
                function sub1() {
                    document.getElementById("area").value = document.getElementById("content").innerHTML;
                    document.getElementById("form").submit()
                }
            </script>
        </form>
    </div>