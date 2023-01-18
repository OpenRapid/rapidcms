<?php

/**
 * 使用分类id搜索分类信息，$result共3个值：1-3分别为分类名称、分类图标和分类权重。
 * @param string $dataValue
 * @param integer $result
 * @param string $url
 * @return void
 */
function search_category($dataValue, $result, $url = "../../install/sql-config/sql.json")
{
    $table_name = "rapidcmscategory";
    $json_string = file_get_contents($url);
    $data = json_decode($json_string, true);
    $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
    $sql = 'select * from `' . $table_name . '` WHERE id="' . $dataValue . '"';
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($res)) {
        return $row[$result];
    }
}


/**
 * 使用文章id搜索文章信息，$result共4个值：1-4分别为文章标题、文章内容、文章修改时间、文章所属分类id。
 * @param string $dataValue
 * @param integer $result
 * @param string $url
 * @return void
 */
function search_article($dataValue, $result, $url = "../../install/sql-config/sql.json")
{
    $table_name = "rapidcmspage";
    $json_string = file_get_contents($url);
    $data = json_decode($json_string, true);
    $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
    $sql = 'select * from `' . $table_name . '` WHERE id="' . $dataValue . '"';
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($res)) {
        return $row[$result];
    }
}


/**
 * 使用文章id搜索所属分类信息，$result共4个值：1-3分别为分类名称、分类图标和分类权重，查询分类id请使用search_article函数。
 * @param string $dataValue
 * @param integer $result
 * @param string $url
 * @return void
 */
function search_catename_by_articleid($dataValue, $result, $url = "../../install/sql-config/sql.json")
{
    $table_name = "rapidcmspage";
    $json_string = file_get_contents($url);
    $data = json_decode($json_string, true);
    $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
    $sql = 'select * from `' . $table_name . '` WHERE id="' . $dataValue . '"';
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($res)) {
        $cageid = $row[4];
    }
    $table_name1 = "rapidcmscategory";
    $sql1 = 'select name from `' . $table_name1 . '` WHERE `id`="' . $cageid . '"';
    $res1 = mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_row($res1)) {
        return $row1[$result];
    }
}
