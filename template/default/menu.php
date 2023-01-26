<body class=" mdui-appbar-with-toolbar mdui-theme-accent-indigo mdui-theme-primary-indigo mdui-text-color-white mdui-drawer-body-left" style="--color-primary: 63, 81, 181; --color-accent: 63, 81, 181;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title"><? echo $data_header["title"]; ?></span>
        <div class="mdui-toolbar-spacer"></div>
        <?php
    function curPageURL() 
    {
      $pageURL = 'http';
      if ($_SERVER["HTTPS"] == "on") 
      {
        $pageURL .= "s";
      }
      $pageURL .= "://";
      if ($_SERVER["SERVER_PORT"] != "80") 
      {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
      } 
      else
      {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
      }
      return $pageURL;
    }
    ?>
        <?php
        function encode($string = '', $skey = 'cxphp')
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

        if ($_COOKIE["user"] == encode($_COOKIE["name"], $pa)&&$_COOKIE["user"]!="") {
            echo '<div mdui-menu="{target: \'#logout-menu\'}" class="mdui-typo  mdui-btn mdui-ripple more-option" >[用户] ' . $_COOKIE["name"] . '<i style="color:white!important" class="mdui-text-color-white mdui-icon material-icons mdui-text-color-theme-icon">arrow_drop_down</i></div>';
        } else {
            echo '<div class="mdui-btn mdui-btn-dense" onclick="document.getElementById(\'login\').style.zIndex=999999" mdui-dialog="{target: \'#login\'}">登录</div><div class="mdui-btn mdui-btn-dense" onclick="document.getElementById(\'logon\').style.zIndex=999999" mdui-dialog="{target: \'#logon\'}">注册</div>';
        }
        ?>
        <ul class="mdui-menu" id="logout-menu" style="transform-origin: 0px 100%">
            <li class="mdui-menu-item"><a class="mdui-ripple" href="../../../../resource/logout.php?goto=<?php  echo curPageURL(); ?>">退出登录</a></li>

        </ul>
    </div>

    <div style="color:black;" class="mdui-drawer mdui-drawer-open mc-drawer" id="drawer">
        <ul class="mdui-list">
            <a href="../../../../../index.php">
                <li class="mdui-list-item mdui-ripple" style="font-size:15px!important">
                    <i class="mdui-list-item-icon mdui-icon material-icons">&#xe88a;</i>
                    <div class="mdui-list-item-content" style="font-size:15px!important">首页</div>
                </li>
            </a>
            <div class="mdui-divider"></div>
            <?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmscategory";

$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` ORDER BY num DESC';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
while ($row = mysqli_fetch_row($res)) {
    echo '<a href="../../../../category?id='.$row[0].'">';
    echo '<li class="mdui-list-item mdui-ripple"> ';
    echo '<i class="mdui-list-item-icon mdui-icon material-icons">'.$row[2].'</i>';
    echo '<div class="mdui-list-item-content" style="font-size:15px!important">'.$row[1].'</div>';
    echo "</li></a>";

}
?>

        </ul>
        <div class="mdui-typo" style=" position: absolute;bottom:0%;   box-sizing: border-box; width: 100%;  padding: 20px 16px;">
            <h4> <small>© 2023 RapidTeam</small><br> <small>Powered and Theme by RapidTeam
                </small></h4>
        </div>
    </div>