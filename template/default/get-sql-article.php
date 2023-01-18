<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmspage";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` WHERE id="'.$cid.'"';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
while ($row = mysqli_fetch_row($res)) {
    $cont3 = htmlspecialchars_decode($row[2]);
    echo '<div class="mdui-card mdui-card-shadow question"><h1 class="title">'.$row[1].'</h1>';
    echo '  <div class="mc-user-line"><div class="mc-user-popover"><span style="color:#757575">'.$row[3].'</span>';
    echo '  </div></div><div class="mdui-typo" style="padding: 12px 0 32px;">'.$cont3." </div><br>  <br>  <br></div>                ";
}
?>
    
    
                   
             
               
                      
                          