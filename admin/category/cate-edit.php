<?php
include("../header.php");

?>

        <?php
error_reporting(0);
header("Content-type:text/html;charset=utf-8");
$table_name = "rapidcmscategory";

$json_string = file_get_contents('../../install/sql-config/sql.json');
$data = json_decode($json_string, true);
$conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
$sql = 'select * from `'.$table_name .'` WHERE id="'.$_GET["id"].'"';
$res = mysqli_query($conn, $sql);
$colums = mysqli_num_fields($res);
while ($row = mysqli_fetch_row($res)) {
        $cat1= $row[1];
        $cat2= $row[2];
        $cat3= $row[3];
}

?>

    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px">分类修改</div>
            </div>
           
                <m-scrollbar style="height: 800px;width:900px;text-align:left ">
                <div id="login" class="mc-account mc-login mdui-dialog mdui-dialog-open " style="overflow: hidden;z-index:999;display: block; top: 150.104px; height: 700px;">
                <button class="mdui-btn mdui-btn-icon close" onclick="window.location.href='category.php'"><i class="mdui-icon material-icons">close</i></button>
 
<div class="mdui-dialog-title">修改</div>
<form method="post" action="cate-edit-run.php">
<div style="display:none" class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">唯一ID（10位字符）</label>
    <input class="mdui-textfield-input" name="id" type="text" value="<?php echo $_GET["id"]?>" >
 </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">唯一ID（10位字符）</label>
    <input class="mdui-textfield-input" type="text" value="<?php echo $_GET["id"]?>" disabled>
 </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">名称</label>

    <input class="mdui-textfield-input" type="text" value="<?php echo $cat1;?>" name="name" required=""></div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">图标ID（在MDUI中获取&#XXXX;）</label>
    <input class="mdui-textfield-input" style="width:90%" value="<?php echo htmlentities($cat2);?>" type="text" name="pic" required="">
    <i   style="cursor:pointer;position: absolute;left: 92%" onclick="window.open('https://www.mdui.org/docs/material_icon')" class="mdui-icon material-icons">&#xe250;</i>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label mdui-textfield-has-bottom ">
        <label class="mdui-textfield-label">权重（大的在前面）</label>
    <input class="mdui-textfield-input" type="number" name="num" value="<?php echo $cat3;?>" required=""></div>

    <div class="actions mdui-clearfix">
       <button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button>
    </div>
</form>
</div>
                </m-scrollbar>
  
        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>



