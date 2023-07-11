<?php
include("../check.php");
$json_string=file_get_contents('../../plugin/'. $_GET["id"]."/version.json");
$row = json_decode($json_string, true);
if($row["use"]==true){
    $data = array();
    $data['key'] =$row["key"];
    $data['name'] = $row["name"];
    $data['version'] = $row["version"];
    $data['author'] = $row["author"];
    $data['use'] = false;
    $json_string = json_encode($data);
    
    file_put_contents('../../plugin/'. $_GET["id"]."/version.json", $json_string);

   }else{
    $data = array();
    $data['key'] =$row["key"];
    $data['name'] = $row["name"];
    $data['version'] = $row["version"];
    $data['author'] = $row["author"];
    $data['use'] = true;
    $json_string = json_encode($data);
    
    file_put_contents('../../plugin/'. $_GET["id"]."/version.json", $json_string);
   }
   echo "<script type='text/javascript'>window.location.href='plugin.php'</script>"
?>