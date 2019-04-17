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
                        <li><a href="#"><i class="icon-font">&#xe008;</i>栏目管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe001;</i>游戏推荐管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe003;</i>普通用户管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe014;</i>开发者管理</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe009;</i>内容管理</a>
                    <ul class="sub-menu">
                        <li><a href="/AdaAda/index.php/Admin/Game/lst"><i class="icon-font">&#xe007;</i>游戏管理</a></li>                    
                        <li><a href="#"><i class="icon-font">&#xe038;</i>话题管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe012;</i>回复管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe002;</i>评论管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe006;</i>分类管理</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">游戏管理</a><span class="crumb-step">&gt;</span><span>新增首页</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">



                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                            <tr>
                                <th><i class="require-red">*</i>游戏名称：</th>
                                <td>
                                    <input class="common-text required" id="title" name="game_name" size="50" value="" type="text">
                                </td>
                            </tr>

                           <tr>
                                <th><i class="require-red">*</i>是否推荐：</th>
                                <td>
                                    <input class="common-text required" id="title" name="game_reco" size="50" value="1" type="checkbox">
                                </td>
                            </tr>

                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="game_pic" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            
                            <tr>
                                <th><i class="require-red">*</i>游戏安装包：</th>
                                <td><input name="game_package" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传游戏资源"/>--></td>
                            </tr>
                            
                            <tr>
                                <th>游戏简介：</th>
                                <td><textarea name="game_des" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10"></textarea></td>
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
</body>
</html>