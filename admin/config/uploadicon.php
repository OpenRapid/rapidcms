<?php
include("../check.php");

$fileInfo = $_FILES['file'];
$name = $fileInfo['name'];
function isImg($fileName)

{

  $file  = fopen($fileName, "rb");

  $bin  = fread($file, 2); // 只读2字节 



  fclose($file);

  $strInfo = @unpack("C2chars", $bin);

  $typeCode = intval($strInfo['chars1'] . $strInfo['chars2']);

  $fileType = '';



  if ($typeCode == 255216 /*jpg*/ || $typeCode == 7173 /*gif*/ || $typeCode == 13780 /*png*/) {

    return $typeCode;
  } else {

    // echo '"仅允许上传jpg/jpeg/gif/png格式的图片！'; 

    return false;
  }
}
if (isImg($fileInfo['tmp_name']))

{

  $pathname = pathinfo($name)["extension"];
  $filename =  pathinfo($name, PATHINFO_FILENAME);
  $filePath = $fileInfo['tmp_name'];
  //$name = iconv('utf-8', 'gb2312', $filename);
  $str = rand();
  $path1 = "upload/upload_" . md5($str) . "." . $pathname;
  $path = "../../" . $path1;
  move_uploaded_file($filePath, $path);


  $data1 = array();
  $data1['headname'] = $data_header["headname"];
  $data1['title'] =  $data_header["title"];
  $data1['icon'] = $path1;
  $data1['description'] = $data_header["description"];
  $data1['keywords'] = $data_header["keywords"];
  $data1['introduce'] = $data_header["introduce"];
  $data1['con'] = $data_header["con"];
  $json_string1 = json_encode($data1);
  $filename1 = '../../resource/config/header.json';
  $fp1 = fopen($filename1, "w");
  $len1 = fwrite($fp1, $json_string1);
  fclose($fp1);

  echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=\"setting.php\"</script>";

}

else

{

  sendalert("请上传图片");

}

