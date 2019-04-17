<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html  lang="zh-CN" prefix="og: http://ogp.me/ns#">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <link href='/AdaAda/Public/Home/style/style.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/AdaAda/Public/Home/style/font.css">
    <script type="text/javascript" src="/AdaAda/Public/Home/style/jquery-1.11.3.min.js"></script>




<title>AdaAda</title>


        <style type="text/css">
            img.wp-smiley,
            img.emoji {
                display: inline !important;
                border: none !important;
                box-shadow: none !important;
                height: 1em !important;
                width: 1em !important;
                margin: 0 .07em !important;
                vertical-align: -0.1em !important;
                background: none !important;
                padding: 0 !important;
            }
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

</head>

<body class="p-blog zh">

<!-- Desktop Header -->
<!-- 导航啦开始 -->
    <header>
        <div class="header">
            <div class="logo">
                <div class="title">

                </div>

            </div>
            <nav class="navbar" role="navigation">
                <ul class="nav">
                    <li><a class="active" href="/AdaAda/index.php/Home/index">主页</a></li>
                    <li><a href="/AdaAda/index.php/Home/Index/rank">排行榜</a></li>
                    <li><a href="/AdaAda/index.php/Home/Index/classview">分类查看</a></li>  
                    <li><a href="/AdaAda/index.php/Home/Index/search">搜索</a></li>            
                </ul>
            </nav>
        </div>
    </header>

    <div class="anchor-bar">
        <ul>
            <li><a href="/AdaAda/index.php/Home/Login/register">注册</a></li>
            <li><a href="/AdaAda/index.php/Home/Login/login">登录</a></li>
            <li><a href="/AdaAda/index.php/Home/Login/logout">注销</a></li>
            <li><a href="/AdaAda/index.php/Home/Player/user">玩家中心</a></li>
            <li><a href="<?php echo U('Admin/Login/login');?>">管理员入口</a></li> 
            <li><a href="/AdaAda/index.php/Home/Dev/developer">开发者入口</a></li>           
        </ul>
    </div>



<!-- 导航栏结束 -->




<div class="body">
<div class="wrapper cls">

    <div class="main">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list">
          <ul>
            <li>
                <h1 class="title"><?php echo ($vo["comment_content"]); ?></h1>
                <div class="info">
                    <span><?php echo ($vo["comment_time"]); ?></span>
                </div>               
            </li>

          </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
     <!-- 页码 -->
     <div class="list page b-page">
        <?php echo ($page); ?>
     </div>   
   
    </div>  

      <div class="sticky-content-spacer">
           <div id="sidebar" class="side">
           <!-- Desktop Sidebar -->

           <!-- 热门游戏 -->
<div class="pop">
    <div class="title">热门游戏</div>
    <ul>
    <?php if(is_array($greco)): $i = 0; $__LIST__ = $greco;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
           <div class="thumb"><a href="/AdaAda/index.php/Home/Index/game/id/<?php echo ($vo["game_id"]); ?>">
            <img width="1350" height="675" src="/AdaAda/<?php echo ($vo["game_pic"]); ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"/></a>
            </div>
            <h2 class="topic"><a href="/AdaAda/index.php/Home/index/game/id/<?php echo ($vo["game_id"]); ?>"><?php echo ($vo["game_name"]); ?></a></h2>
            <div class="clear"></div>
       </li><?php endforeach; endif; else: echo "" ;endif; ?>       
    </ul>
</div>
<!-- 热门游戏end -->



          </div>
      </div>
    </div>
<!-- body结束 -->
        <div class="clear"></div>
</div>
  
            

<footer>
    <div class = "footer">
        <div class="row">
            <dl>
                <dt>相关链接</dt>
                    <dd>
                       <a target="_blank" href="https://www.store.steampowered.com/">Steam</a>
                    </dd>
                        <dd>
                            <a target="_blank" href="https://www.battlenet.com.cn/zh/">暴雪/战网</a>
                        </dd>
                        <dd>
                            <a target="_blank" href="http://game.163.com/">网易游戏-游戏热爱者</a>
                        </dd>
                        <dd>
                            <a target="_blank" href="http://game.qq.com/" rel="nofollow">腾讯游戏-用心创造快乐</a>
                        </dd>
                    </dl>
                    <dl>
                        <dt>致谢</dt>
                        <dd>常熟理工学院</dd>
                        <dd>计算机科学与工程学院</dd>                    </dl>
                    <dl>
                        <dt>联系我们</dt>
                        <dd>
                            <a class="email-link" href="mailto:836439205@qq.com">836439205@qq.com</a>
                        </dd>
                        <dd>
                            <a>邹纯婷</a>
                        </dd>
                    </dl>
                </div>

                <div class="row">
                    <span class="copyright">©Copyright &nbsp; 2018 CSLG All rights reserved.  </span>
                </div>
            </div>
        </footer>

      <script>
        $(function($){
            $('[data-ga]').click(function() {
                var e = $(this).attr('data-ga').split('|');
                ga('send', 'event', e[0], e[1], e[2]);
            });


        });

        $(function() {
          'use strict';

          var $window = $(window);

          $window.scroll(checkAnchorBar);

          checkAnchorBar();

          function checkAnchorBar() {
            var $anchorBar = $('.anchor-bar');
            var scrollTop = $window.scrollTop();

            var $anchorStartElem = $('header');
            var attachedClass = 'attached';

            var threshold = $anchorStartElem.offset().top + $anchorStartElem.height();

            if (!$anchorBar.hasClass(attachedClass) && scrollTop >= threshold) {
              $anchorBar.addClass(attachedClass);
            } else if ($anchorBar.hasClass(attachedClass) && scrollTop < threshold) {
              $anchorBar.removeClass(attachedClass);
            }
          }
        });
    </script>


    <div id="fb-root"></div>


    </body>
</html>