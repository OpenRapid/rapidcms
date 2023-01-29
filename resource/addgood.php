<?php
//禁用报错
error_reporting(0);
//解析json连接数据库
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmschat";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
//编写SQL语句并运行
$sql = 'select * from `'.$table_name .'` WHERE id="'.$_POST["id"].'" ';
$res = mysqli_query($conn, $sql);
//获取数量轮查
$colums = mysqli_num_fields($res);
while ($row = mysqli_fetch_row($res)) {
    //获取赞数
    $goodnum = $row[3];
}
//编写赞数+1的语句并运行
$sql2 = 'UPDATE `rapidcmschat` SET `goodnum`="'.($goodnum+1).'" WHERE `id`="'.$_POST["id"].'"';
$res2 = mysqli_query($conn, $sql2);
//返回数据，方便模板操作
echo $goodnum + 1;
?>
    
    
          