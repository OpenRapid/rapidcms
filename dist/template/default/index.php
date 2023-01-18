<?php
include("resource/variable.php");
include("head-menu.php") ?>
<style>
    * {
        font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>
<div class="medium" style=" text-align:center;display: flex;gap: 47px;">
    <img style="Border-radius:10px" width="200px" src="../../../<? echo $data_header["icon"]; ?>">
    <div>
        <div style="color:black;font-size: 20px;" class="mdui-typo">
            <h1 style="font-weight: bold;"><? echo $data_header["title"]; ?></h1>
        </div>
        <div style="color:black;font-size: 10px;" class="mdui-typo">
            <h1><? echo $data_header["introduce"]; ?></h1>
        </div>
    </div>
</div>
<?php include("login-logon-onload.php") ?>