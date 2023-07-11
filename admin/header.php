<? include("check.php"); ?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>RapidCMS管理后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon"" href=" ../../../resource/img/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../../../../resource/css/mdui.min.css" />
    <link rel="stylesheet" href="../../../resource/css/mtu.min.css">
    <link rel="stylesheet" href="../../../resource/css/style.css">
    <link rel="stylesheet" href="../../../template/default/theme.css">
    
</head>

<body class=" mdui-appbar-with-toolbar mdui-theme-accent-deep-purple mdui-theme-primary-deep-purple mdui-text-color-white mdui-drawer-body-left" style="--color-primary:79, 55, 139; --color-accent: 79, 55, 139;">
    <div class="mdui-toolbar mdui-color-theme mdui-text-color-white mdui-appbar mdui-appbar-fixed mdui-headroom">
        <button class="drawer mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></button>
        <span class="mdui-typo-title">RapidCMS 管理后台</span>
    </div>

    <? include("../drawer.php"); ?>
    <style>
        * {
            font-family: "MiSans", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>