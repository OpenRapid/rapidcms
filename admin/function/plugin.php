<?php
include("../header.php");

?>
<script type="text/javascript" language="javascript">
    function confirmAct() {
        if (confirm('确定要删除插件吗?')) {
            return true;
        }
        return false;
    }

    function confirmAct1() {
        if (confirm('确定要禁用插件吗?')) {
            return true;
        }
        return false;
    }

    function confirmAct2() {
        if (confirm('确定要启用插件吗?')) {
            return true;
        }
        return false;
    }
</script>
<div style="    position: absolute;left: 60%;top:10%;text-align:center;    transform: translateX(-50%  );">

    <div class="mdui-card" style="overflow:scroll">

        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title" style="font-size:30px;">插件设置</div>

        </div>
        <div class="mdui-divider"></div> <br>
        <m-scrollbar style="height: 650px;width:900px;">

            <form method="get" action="download-plugin.php" style="text-align:left;padding:0 0 0 250px">
                <div style="  display: flex;gap: 47px;">

                    <div>输入Key加载插件：<input style="width:300px" class="mdui-textfield-input" name="name" type="text" value="" required=""> </div>
                    <div><button type="submit" name="sub" class="mdui-btn mdui-btn-raised mdui-color-theme action-btn">确认</button><br><br>
                    </div>




                </div>
            </form>
            <br>
            <div class="mdui-divider"></div> <br>
            <div style="width:90%;position: absolute;left: 50%;    transform: translateX(-50%  );" class="mdui-table-fluid">

                <table class="mdui-table">
                    <thead>
                        <tr>
                            <th>ID-Key</th>
                            <th>名称</th>
                            <th>版本</th>
                            <th>作者</th>
                            <th>状态</th>
                            <th class="mdui-table-col-numeric"> </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php




                        $file = scandir("../../plugin");

                        for ($i = 2; $i < count($file); $i++) {
                            if ($file[$i] == ".gitkeep") {
                            } else {
                                $json_string = file_get_contents('../../plugin/' . $file[$i] . "/version.json");
                                $row = json_decode($json_string, true);
                                echo "<tr>";
                                echo "</tr>";
                                echo "<td>" . $row["key"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["version"] . "</td>";
                                echo "<td>" . $row["author"] . "</td>";
                                if ($row["use"] == true) {
                                    echo "<td style='color:green'><strong>启用</strong></td>";
                                    echo '<td><a target="_blank" href="' . '../../plugin/' . $file[$i] . "/setting.php" . '"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a>';
                                    echo '<a onclick="return confirmAct1();" href="plugin-move.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe644;</i></button></a>';
                                } else {
                                    echo "<td style='color:red'><strong>禁用</strong></td>";
                                    echo '<td><a target="_blank" href="' . '../../plugin/' . $file[$i] . "/setting.php" . '"><button class="mdui-btn mdui-btn-icon mdui-ripple">   <i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe3c9;</i></button></a>';
                                    echo '<a onclick="return confirmAct2();" href="plugin-move.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe86c;</i></button></a>';
                                }


                                echo '<a onclick="return confirmAct();" href="plugin-del.php?id=' . $file[$i] . '"><button class="mdui-btn mdui-btn-icon mdui-ripple"><i style="color:#6E6E6E" class="mdui-icon material-icons">&#xe872;</i></button></a>&nbsp;';

                                echo "</td>";
                            }
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