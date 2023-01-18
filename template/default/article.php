<?php include("head-menu.php") ?>
<div class="mdui-container" style="margin:auto;">


    <div class="mdui-text-color-black  ">
        <br>
        <div id="page-question" class="mdui-container">
        <div class="mc-nav" onclick="window.history.go(-1);"><button class="back mdui-btn mdui-color-theme mdui-ripple"><i class="mdui-icon mdui-icon-left material-icons">arrow_back</i>返回</button></div>
        <?php include("get-sql-article.php") ?>   
        </div>

    </div>
    <?php include("login-logon-onload.php") ?>