<?php
//获取变量库
include("variable.php");
//解析json连接数据库
$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword'],$dataxxx['dbname']);
$goto = "../../../../../../index.php";
$name = $_GET["username"];

//编写SQL语句并运行
$str = "select count(*) from `rapidcmsuser` where username=" . "'" . "$name" . "'";
$result = mysqli_query($link, $str);
$pass = mysqli_fetch_row($result);
if (!$result) {
    printf("Error: %s\n", mysqli_error($link));
    exit();
}
$pa = $pass[0];
if ($pa == 1) {
    echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "该用户名已被注册" . "\"" . ")" . ";" . "</script>";
    echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $goto . "\"" . "</script>";
    exit;
}
//发送邮件
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './mail/Exception.php';
require './mail/PHPMailer.php';
require './mail/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //服务器配置
    $mail->CharSet = "UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = $data_mail["smtp"];                // SMTP服务器
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = $data_mail["username"];              // SMTP 用户名  即邮箱的用户名
    $mail->Password = $data_mail["password"];             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

    $mail->setFrom($data_mail["username"], $data_header["title"]);  //发件人
    $mail->addAddress($_GET["mail"], $_GET["mail"]);  // 收件人
    $mail->addReplyTo($data_mail["username"], $data_header["title"]); //回复的时候回复给哪个邮箱 建议和发件人一致

    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = '您好，欢迎注册' . $data_header["title"] . "网站账户！";
    $mail->Body    = '<h3>您好，欢迎注册' . $data_header["title"] . "网站账户！点击下方链接注册账户即可，如果不是您注册的请不要点击下方链接！</h3><a href=" . 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . '/resource/maillogon.php?username=' . $_GET["username"] . '&password=' . md5(sha1(md5($_GET["password"]))) . '>' . 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . '/resource/maillogon.php?username=' . $_GET["username"] . '&password=' . md5(sha1(md5($_GET["password"]))) . '</a>';

    $mail->send();
    echo '邮件发送成功，请您在邮箱中找到邮件点击链接注册';
} catch (Exception $e) {
    echo '邮件发送失败，错误原因如下: ', $mail->ErrorInfo;
}
