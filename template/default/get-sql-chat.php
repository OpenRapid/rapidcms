
<script>
    function copyText(text){
    var textareaC = document.createElement('textarea');
    textareaC.setAttribute('readonly', 'readonly'); 
    textareaC.value = text;
    document.body.appendChild(textareaC); 
    textareaC.select();
    var res = document.execCommand('copy');
    document.body.removeChild(textareaC);
    console.log("复制成功");
    return res;
}
function sendaddgood(uid,articleid){
var httpRequest = new XMLHttpRequest();
httpRequest.open('POST', '../../../../../resource/addgood.php', true); 
httpRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
httpRequest.send('id='+uid);

httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState == 4 && httpRequest.status == 200) {
        var json = httpRequest.responseText;
        document.getElementById("goodbut_"+uid).innerHTML=json;
    }
};
}


    </script>
<?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmschat";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
define('BASE_PATH1',str_replace('\\','/',realpath(dirname(BASE_PATH).'/'))."/");
$json_string = file_get_contents(BASE_PATH1.'/install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` WHERE articleid="'.$cid.'" ORDER BY time DESC';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
$row= mysqli_num_rows($res);
if($row!=0){
    echo '<div class="mdui-card answers">   '; 
}

while ($row = mysqli_fetch_row($res)) {
    echo '<div class="item"><div class="mc-user-line"><div class="mc-user-popover"><a class="avatar user-popover-trigger"><i class="mdui-list-item-icon mdui-icon material-icons">people</i></a>    '; 
    echo '<a class="username user-popover-trigger mdui-text-color-theme-text">'.$row[1].'</a>    '; 
    echo '<div class="more"><span class="time mdui-text-color-theme-secondary" >'.$row[4].'</span></div>'; 
    echo '</div></div><div class="content mdui-typo"><p>'.$row[2].'</p>'; 
    echo '</div><div class="actions"><div class="mc-vote"><button onclick="sendaddgood(\''.$row[0].'\',\''.$row[5].'\')" class="mc-icon-button mdui-btn mdui-btn-icon mdui-btn-outlined" mdui-tooltip="{content: \'顶一下\', delay: 300}">    '; 
    echo '<span id="goodbut_'.$row[0].'" class="badge">'.$row[3].'</span>    '; 
    echo '<i class="mdui-icon material-icons mdui-text-color-theme-icon">thumb_up</i></button></div><div class="flex-grow"></div><div class="mc-options-button">    '; 
    echo '<button mdui-menu="{target: \'#attr_'.$row[0].'\',position:\'top\',align:\'right\',covered:false}" class="mdui-btn mdui-btn-icon mdui-text-color-theme-icon mdui-ripple"><i class="mdui-icon material-icons">more_vert</i></button>    '; 
    echo '<ul class="mdui-menu " id="attr_'.$row[0].'" style="top: 7px; left: 597px; transform-origin: 100% 100%; position: absolute;">    '; 
    echo '<li class="mdui-menu-item"><a onclick="copyText(\''.$row[0].'\')" class="mdui-ripple">复制评论ID</a></li></ul></div></div></div>    '; 
}
if($row!=0){
    echo '</div>';
}

?>
    
    
                   
             
               
                      
                          