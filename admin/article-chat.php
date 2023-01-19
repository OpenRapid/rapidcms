     <?php

use PhpMyAdmin\Charsets;

        include("../resource/variable.php");
        function encode($string = '', $skey = 'cxphp')
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
        $sql = "select password from `rapidcmsadmin` where username=\"admin\"";
        $result = mysqli_query($link, $sql);
        $pass = mysqli_fetch_row($result);
        $pa = $pass[0];

        if ($_COOKIE["admin"] != encode('admin', $pa)) {
            Header("Location: login.php");
        }
        ?>

     <!DOCTYPE html>
     <html lang="zh-cn">

     <head>
         <meta charset="utf-8">
         <title>RapidCMS管理后台</title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width,initial-scale=1">
         <link rel="shortcut icon"" href=" ../../../../../resource/img/icon.png" type="image/x-icon" />
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
         <link rel="stylesheet" href="../../../../resource/css/style.css">
         <link rel="stylesheet" href="../../../../../template/default/theme.css">
         <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

         <link rel="stylesheet" href="http://kindeditor.net/ke4/themes/default/default.css" />
         <script charset="utf-8" src="http://kindeditor.net/ke4/kindeditor-min.js"></script>
         <script charset="utf-8" src="http://kindeditor.net/ke4/lang/zh-CN.js"></script>
         <script>
             var editor;
             KindEditor.ready(function(K) {
                 editor = K.create('textarea[name="content"]', {
                     allowFileManager: true
                 });


             });
         </script>
     </head>

     <body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-indigo mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
         <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
             <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
             <span class="mdui-typo-title">RapidCMS管理后台</span>
         </div>

         <? include("drawer.php"); ?>
         <script>
             function randomString(length, ) {
                 var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 var result = '';
                 for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
                 return result;
             }


         </script>
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
         <style>
             * {
                 font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
             }
         </style>
         <div class="mdui-container"  id="page-question" style="margin:auto;">







             <?php
                error_reporting(0);
                header("Content-type:text/html;charset=utf-8");
                $table_name = "rapidcmschat";
                define('BASE_PATH2', str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");
                define('BASE_PATH3', str_replace('\\', '/', realpath(dirname(BASE_PATH2) . '/')) . "/");
                $json_string = file_get_contents(BASE_PATH3 . '/install/sql-config/sql.json');
                $data = json_decode($json_string, true);
                $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
                $sql = 'select * from `' . $table_name . '` WHERE articleid="' . $_GET["id"] . '" ORDER BY time DESC';
                $res = mysqli_query($conn, $sql);
                $colums = mysqli_num_fields($res);
                $row = mysqli_num_rows($res);
         
                    echo '<div class="mdui-card answers">          <h1  style="text-align:center;">
                    此文章下所有评论</h1>  ';
        

                while ($row = mysqli_fetch_row($res)) {
                    echo '<div class="item" id="chat_'.$row[0].'"><div class="mc-user-line"><div class="mc-user-popover"><a class="avatar user-popover-trigger"><i class="mdui-list-item-icon mdui-icon material-icons">people</i></a>    ';
                    echo '<a class="username user-popover-trigger mdui-text-color-theme-text">' . $row[1] . '</a>    ';
                    echo '<div class="more"><span class="time mdui-text-color-theme-secondary" >' . $row[4] . '</span></div>';
                    echo '</div></div><div class="content mdui-typo"><p>' . $row[2] . '</p>';
                    echo '</div><div class="actions"><div class="mc-vote">    ';
                      echo '</div><div class="flex-grow"></div><div class="mc-options-button">    ';
                    echo '<button mdui-menu="{target: \'#attr_' . $row[0] . '\',position:\'top\',align:\'right\',covered:false}" class="mdui-btn mdui-btn-icon mdui-text-color-theme-icon mdui-ripple"><i class="mdui-icon material-icons">more_vert</i></button>    ';
                    echo '<ul class="mdui-menu " id="attr_' . $row[0] . '" style="top: 7px; left: 597px; transform-origin: 100% 100%; position: absolute;">    ';
                    echo '<li class="mdui-menu-item"><a onclick="copyText(\'' . $row[0] . '\')" class="mdui-ripple">复制评论ID</a></li><li class="mdui-menu-item"><a target="_blank" onclick="document.getElementById(\'chat_'.$row[0].'\').style.display=\'none\';" href="article-chat-delete.php?id='.$row[0].'" class="mdui-ripple">删除评论</a></li></ul></div></div></div>    ';
                }

                    echo '</div>';
             

                ?>






         </div>

         <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>
     </body>

     </html>