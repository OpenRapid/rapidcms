<?php
$json_string = file_get_contents('../install/sql-config/sql.json');
$dataxxx = json_decode($json_string, true);
header("Content-type:text/html;charset=utf-8");
$link = mysqli_connect($dataxxx['server'], $dataxxx['dbusername'], $dataxxx['dbpassword']);
if ($_GET["goto"] != "") {
        $goto = $_GET["goto"];
} else {
        $goto = "../../../../../../index.php";
}
if ($link) {
        $select = mysqli_select_db($link, $dataxxx['dbname']);
        if ($select) {

                $name = $_POST["username"];
                $password1 = $_POST["password"];
                $password2 = $_POST["password2"];
                if ($name == "" || $password1 == "") {
                        echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "请填写完整" . "\"" . ")" . ";" . "</script>";
                        echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $_GET["goto"] . "\"" . "</script>";
                        exit;
                }
                if ($password1 == $password2) {
                        $str = "select count(*) from `rapidcmsuser` where username=" . "'" . "$name" . "'";
                        $result = mysqli_query($link, $str);
                        $pass = mysqli_fetch_row($result);
                        $pa = $pass[0];
                        if ($pa == 1) {
                                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "该用户名已被注册" . "\"" . ")" . ";" . "</script>";
                                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $_GET["goto"] . "\"" . "</script>";
                                exit;
                        }
                        $jhzt = "user";
                        $password1 = md5(sha1(md5($password1)));
                        $sql = "insert into `rapidcmsuser` values(" . "\"" . "$name" . "\"" . "," . "\"" . "$password1" . "\"" . "," . "\"" . "$jhzt" . "\"" . ")";
                        //echo"$sql";
                        mysqli_query($link, $sql);
                        mysqli_error($link);
                        $close = mysqli_close($link);
                        if ($close) {

                                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "注册成功！" . "\"" . ")" . ";" . "</script>";
                                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $_GET["goto"] . "\"" . "</script>";
                        }
                } else {
                        echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "两次密码不一致！" . "\"" . ")" . ";" . "</script>";
                        echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . $_GET["goto"] . "\"" . "</script>";
                }
        }
}
