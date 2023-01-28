<?php include("menu.php") ?>
<div class="mdui-container" style="margin:auto;overflow:auto;">


    <div class="mdui-text-color-black  ">
        <br>
        <div class="mdui-container">
        <?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmspage";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` WHERE categoryid="'.$cid.'"  ORDER BY time DESC';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
echo '<div class="item-list mdui-card mdui-card-shadow">';
while ($row = mysqli_fetch_row($res)) {

    if ($data_index["rewrite"] == "true") {
        echo '   <a class="mc-list-item" href="/a/'.$row[0].'">';
    } else {
        echo '   <a class="mc-list-item" href="../../../../article/?id='.$row[0].'">';
    }
   
    echo '    <div class="mc-user-popover"><i class="mdui-list-item-icon mdui-icon material-icons">description</i></div>';
    echo '   <div class="title mdui-text-color-theme-text">'.$row[1].'</div><div class="content mdui-text-color-theme-secondary">';
    echo '   <div class="snippet">'.$row[3].'  </div></div></a>';

}
        echo "</div>";
?>
    
                       
                      
                          



        </div>

    </div>
    <?php include("login-logon.php") ?>