<?php
//返回窗口
function sendalert($content){
  echo "
  <style>
  .yj{
      Border-radius:10px!important
  }
  </style>
  <link rel='stylesheet' href='../../../../../../resource/css/mdui.min.css'/>
  <body  class=' mdui-theme-accent-deep-purple mdui-theme-primary-deep-purple'>
  <script> 
  window.onload=()=>{
     mdui.dialog({
        title: '提示',
        content:'$content',
        cssClass:'yj',
        modal:true,
        buttons: [
          {
            text: '确认'
          }
        ]
      });
  }
  
   </script>
   <script src='../../../../../../resource/js/mdui.min.js'></script>'></script>
   </body>
   ";
  
}

$servers["lockurl"] = "install/install-config/install.json";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
//在json中获取输入变量
$json_string = file_get_contents(BASE_PATH.'/config/header.json');
$data_header = json_decode($json_string, true);
$json_string1 = file_get_contents(BASE_PATH.'/config/index.json');
$data_index = json_decode($json_string1, true);
$json_string2 = file_get_contents(BASE_PATH.'/config/mail.json');
$data_mail = json_decode($json_string2, true);

?>