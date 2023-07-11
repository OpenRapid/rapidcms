<?php
include("../header.php");

?>  <script type="text/javascript" language="javascript"> 
function confirmAct() 
{ 
  if(confirm('确定要删除吗?')) 
  { 
    return true; 
  } 
  return false; 
} 

</script> 
    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card" style="overflow:scroll">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px;">文章设置</div>

            </div>

            <m-scrollbar style="height: 650px;width:900px;">
                <div style="width:80%;position: absolute;left: 50%;    transform: translateX(-50%  );" class="mdui-table-fluid">
                    <table class="mdui-table">
                        <thead>
                            <tr>
                                <th>文章ID</th>
                                <th>标题</th>
                                <th>时间</th>
                                <th>所属分类ID</th>
                                <th class="mdui-table-col-numeric"> </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $table_name = "rapidcmspage";

                            $json_string = file_get_contents('../../install/sql-config/sql.json');
                            $data = json_decode($json_string, true);
                            $conn = mysqli_connect($data['server'], $data['dbusername'], $data['dbpassword'], $data['dbname']);
                            $sql = 'select * from `' . $table_name . '`';
                            $res = mysqli_query($conn, $sql);
                            $colums = mysqli_num_fields($res);
                            while ($row = mysqli_fetch_row($res)) {
                                echo "<tr>";
                                echo "</tr>";
                                echo "<td>$row[0]</td>";
                                echo "<td>".urldecode($row[1])."</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo '<td><a href="article-edit.php?id='.$row[0].'&name='.urlencode($row[1]).'"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a>';
                                echo '<a  href="article-chat.php?id='.$row[0].'"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">chat</i></button></a>';
                        
                                echo '<a onclick="return confirmAct();" href="article-del.php?id='.$row[0].'"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe872;</i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                            
                                echo "</td>";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </m-scrollbar>

        </div>

    </div>

    <script src="../../../../../../resource/js/mtu.min.js"></script>
    <script src="../../../../../../resource/js/mdui.min.js"></script>
</body>

</html>