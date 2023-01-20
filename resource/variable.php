<?php
$servers["lockurl"] = "install/install-config/install.json";
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
$json_string = file_get_contents(BASE_PATH.'/config/header.json');
$data_header = json_decode($json_string, true);
$json_string1 = file_get_contents(BASE_PATH.'/config/index.json');
$data_index = json_decode($json_string1, true);
$json_string2 = file_get_contents(BASE_PATH.'/config/mail.json');
$data_mail = json_decode($json_string2, true);
?>