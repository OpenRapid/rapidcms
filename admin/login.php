<?php
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
  
}else{
    Header("Location: index.php");
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/css/mdui.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.css">
<link rel="stylesheet" href="../../../../resource/css/style.css">
<link rel="stylesheet" href="../../../../../template/default/theme.css">

    <script src="https://cdn.jsdelivr.net/npm/mtu/dist/mtu.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/mdui@1.0.2/dist/js/mdui.min.js"></script>

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

