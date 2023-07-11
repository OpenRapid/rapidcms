<?php

include("../check.php");
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "sk_content";
$json_string = file_get_contents('../../install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `' . $table_name . '`';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);

while ($row = mysqli_fetch_row($res)) {
    $sqli .= 'INSERT INTO `rapidcmspage` VALUES ("' . $row[0] . '","' . $row[1] . '","' . rawurlencode(htmlspecialchars($row[2])) . '","' . $row[8] . '","1");';
}

$res1 = mysqli_query($conn, $sqli);
sendalert("导入完毕");
