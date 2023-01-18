<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmscategory";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
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
