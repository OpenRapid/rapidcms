<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmschat";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` WHERE id="'.$_POST["id"].'" ';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
while ($row = mysqli_fetch_row($res)) {
    $goodnum = $row[3];
}
$sql2 = 'UPDATE `rapidcmschat` SET `goodnum`="'.($goodnum+1).'" WHERE `id`="'.$_POST["id"].'"';
$res2 = mysqli_query($conn, $sql2);
echo $goodnum + 1;
?>
    
    
          