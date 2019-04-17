<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/AdaAda/Public/Admin/js/libs/modernizr.min.js"></script>
</head>
<body>

<!-- 应用头部文件 -->
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li>AdaAda</li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>管理员:<?php echo $_SESSION['manager_name'];?></li>
                <li><a href="/AdaAda/index.php/Admin/Login/edit/id/<?php echo $_SESSION['manager_id'];?>">修改密码</a></li>
                <li><a href="/AdaAda/index.php/Admin/Login/logout">注销</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container clearfix">

    <!-- 应用左边栏文件 -->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                <a href="/AdaAda/index.php/Admin/Index/index"><i class="icon-font">&#xe011;</i>返回首页</a>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="/AdaAda/index.php/Admin/Player/lst"><i class="icon-font">&#xe003;</i>普通用户管理</a></li>
                        <li><a href="/AdaAda/index.php/Admin/Dev/lst"><i class="icon-font">&#xe014;</i>开发者管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe009;</i>内容管理</a>
                    <ul class="sub-menu">
                        <li><a href="/AdaAda/index.php/Admin/Game/lst"><i class="icon-font">&#xe007;</i>游戏管理</a></li>                    
                        
                        
                        <li><a href="/AdaAda/index.php/Admin/Comment/lst"><i class="icon-font">&#xe002;</i>评论管理</a></li>
                        <li><a href="/AdaAda/index.php/Admin/Class/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
    
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>后台管理<span></span></span></div>
        </div>
        

        
        <!-- 应用脚部文件 -->
        <div class="result-wrap">
            <div class="result-title">
                <h1>使用帮助</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">联系人</label><span class="res-info">邹纯婷</span>
                        <label class="res-lab">地址</label><span class="res-info">常熟理工学院</span>
                        <label class="res-lab">邮箱</label><span class="res-info">836439205@qq.com</span>
                    </li>

                </ul>
            </div>
        </div>
        
    </div>
    <!--/main-->
</div>
</body>
</html>