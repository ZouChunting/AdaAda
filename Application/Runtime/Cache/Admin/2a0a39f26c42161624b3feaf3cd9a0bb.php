<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Admin/css/main.css"/>
    <script type="text/javascript" src="/AdaAda/Public/Admin/js/libs/modernizr.min.js"></script>
    <style>
    .b-page {
    background: #fff;
    box-shadow: 0px 1px 2px 0px #E2E2E2;
      }
      .page {
          width: 95%;
          padding: 30px 15px;
          background: #FFF;
          text-align: right;
          overflow: hidden;
      }
        .page .first,
        .page .prev,
        .page .current,
        .page .num,
        .page .current,
        .page .next,
        .page .end {
            padding: 8px 16px;
            margin: 0px 5px;
            display: inline-block;
            color: #008CBA;
            border: 1px solid #F2F2F2;
            border-radius: 5px;
        }
        .page .first:hover,
        .page .prev:hover,
        .page .current:hover,
        .page .num:hover,
        .page .current:hover,
        .page .next:hover,
        .page .end:hover {
            text-decoration: none;
            background: #F8F5F5;
        }
        .page .current {
            background-color: #008CBA;
            color: #FFF;
            border-radius: 5px;
            border: 1px solid #008CBA;
        }
        .page .current:hover {
            text-decoration: none;
            background: #008CBA;
        }
        .page .not-allowed {
            cursor: not-allowed;
        }
    </style>

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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">评论管理</span></div>
        </div>
             
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">               
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>

                            <th>ID</th>
                            <th>用户编号</th>
                            <th>游戏编号</th> 
                            <th>评论内容</th>   
                            <th>时间</th>
                            <th>操作</th>                       
                        </tr>


                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                                <td><?php echo ($vo["comment_id"]); ?></td>
                                <td><?php echo ($vo["user_id"]); ?></td>
                                <td><?php echo ($vo["game_id"]); ?></td>
                                <td><?php echo ($vo["comment_content"]); ?></td> 
                                <td><?php echo ($vo["comment_time"]); ?></td>                                                                                                                                              
                                
                                <td>
                                    <a class="link-del" href="/AdaAda/index.php/Admin/Comment/del/id/<?php echo ($vo["comment_id"]); ?>" onclick="return confirm('你要删除这条评论吗?');">删除</a>

                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    
                  <div class="list page b-page">
                        <?php echo ($page); ?>
                  </div>

                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</body>
</html>