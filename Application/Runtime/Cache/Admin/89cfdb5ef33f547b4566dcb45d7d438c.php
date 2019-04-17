<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/AdaAda/Public/Admin/js/libs/modernizr.min.js"></script>


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
<div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="icon-font">&#xe008;</i>（取消）栏目管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe001;</i>（取消）游戏推荐管理</a></li>
                        <li><a href="/AdaAda/index.php/Admin/Player/lst"><i class="icon-font">&#xe003;</i>普通用户管理</a></li>
                        <li><a href="/AdaAda/index.php/Admin/Dev/lst"><i class="icon-font">&#xe014;</i>0开发者管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe009;</i>内容管理</a>
                    <ul class="sub-menu">
                        <li><a href="/AdaAda/index.php/Admin/Game/lst"><i class="icon-font">&#xe007;</i>0游戏管理</a></li>                    
                        <li><a href="#"><i class="icon-font">&#xe038;</i>（取消）话题管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe012;</i>（取消）回复管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe002;</i>0评论管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe006;</i>0分类管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe010;</i>测试图标</a></li>
                        <li><a href="#"><i class="icon-font">&#xe017;</i>测试图标</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>


    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">用户管理</a><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">



                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <input type="hidden" name="developer_id" value="<?php echo ($developers["developer_id"]); ?>">
                <input type="hidden" name="developer_name" value="<?php echo ($developers["developer_name"]); ?>">
                    <table class="insert-tab" width="100%">
                        <tbody>


                            <tr>
                                <th>用户名：</th>
                                <td>
                                    <?php echo ($developers["developer_name"]); ?>                                   
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>密码：</th>
                                <td>
                                    <input class="common-text required" id="title" name="developer_pwd" size="50" value="<?php echo ($developers["developer_pwd"]); ?>" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>邮箱：</th>
                                <td>
                                    <input class="common-text required" id="title" name="developer_email" size="50" value="<?php echo ($developers["developer_email"]); ?>" type="text">
                                </td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>地址：</th>
                                <td>
                                    <input class="common-text required" id="title" name="developer_address" size="50" value="<?php echo ($developers["developer_address"]); ?>" type="text">
                                </td>
                            </tr>
                         
                         
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>




            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>