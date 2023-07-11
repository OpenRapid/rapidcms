<?php
include("../header.php");

?>

    <div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

        <div class="mdui-card" style="overflow:scroll">

            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title" style="font-size:30px;">用户设置</div>
            </div>
           
                <m-scrollbar style="height: 650px;width:900px;">
                    <div style="width:80%;position: absolute;left: 50%;    transform: translateX(-50%  );"  class="mdui-table-fluid">
                        <table class="mdui-table">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>用户状态</th>
                                    <th  class="mdui-table-col-numeric"> </th>
                                </tr>
                            </thead>
                            <tbody>

                    <?php
                    $table_name = "rapidcmsuser";
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
                        echo "<td>$row[2]</td>";
                        echo '<td ><a href="user-del.php?username='.$row[0].'"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe872;</i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '<a href="user-move.php?username='.$row[0].'"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a></td>';
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