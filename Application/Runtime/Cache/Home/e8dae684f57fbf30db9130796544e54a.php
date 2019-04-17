<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User : Home</title>
        <link rel="icon" type="image/icon" href="/AdaAda/Public/Home/assetsForDev/images/tabicon.ico">

        <link rel="stylesheet" type="text/css" href="">
        <link href="/AdaAda/Public/Home/assetsForDev/css/bootstrap.min.css" rel="stylesheet">
        <link href="/AdaAda/Public/Home/assetsForDev/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/AdaAda/Public/Home/assetsForDev/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,700,700i|Josefin+Sans:700" rel="stylesheet">
        <link href="/AdaAda/Public/Home/assetsForDev/css/main.css" rel="stylesheet">
        <link rel="icon" href="/AdaAda/Public/Home/assetsForDev/images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
   
    </head>


    <body>
        <div id="index">                                           <!-- Index starts here -->
            <div class="container main">
                <div class="row home">
                    <div id = "index_left" class="col-md-6 left">
                        <img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/home.jpg">
                    </div>
                    <div id = "index_right" class="col-md-6 text-center right">
                        <div class="logo">
                            <img src="/AdaAda/Public/Home/assetsForDev/images/logo.png">
                            <h4>个人信息Player</h4>
                        </div>
                        <p class="home-description">
                                                         用户名：<?php echo $_SESSION['user_name'];?><br>
                                                         性别：<?php echo $_SESSION['user_sex'];?><br>
                            <br>
                            Welcome!<br>欢迎！                           
                        </p>
                        <div class="btn-group-vertical custom_btn animated slideinright">
                            <div id="about" class="btn btn-rabbit">我的评论</div>
                            <div id="work" class="btn btn-rabbit">我的收藏</div>
                            <div id="contact" class="btn btn-rabbit">下载记录</div>
                            <a href="/AdaAda/index.php/Home/Login/edit/id/<?php echo $_SESSION['user_id'];?>" class="btn btn-rabbit">修改密码</a>
                            <a href="/AdaAda/index.php/Home/Index/index" class="btn btn-rabbit">返回主页</a>
                        </div>                                      
                    </div>
                </div>

                
            </div>
        </div>                                                      <!-- index ends here -->

        <div id="about_scroll" class="pages ">                      <!-- about strats here  -->
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 left" id="about_left">
                        <img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/about.jpg">
                    </div>

                    <div class="col-md-6 right" id="about_right">
                        <a href="#index" class="btn btn-rabbit back"> <i class="fa fa-angle-left" aria-hidden="true"></i> 返回 </a>
                        <div id="watermark">
                            <h2 class="page-title" text-center>我的评论</h2>
                            <div class="marker">评</div>
                        </div>                     
                        <?php if(is_array($comlist)): $i = 0; $__LIST__ = $comlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cl): $mod = ($i % 2 );++$i;?><div class="comlist">
                             <ul>
                                 <li>
                                     <p class='subtitle'><?php echo ($cl["comment_time"]); ?></p>
                                     <p class="info"><?php echo ($cl["comment_content"]); ?></p>
                                 </li>

                             </ul>
                           </div><?php endforeach; endif; else: echo "" ;endif; ?>  
                    </div>
                </div>
            </div>            
        </div>                                                                <!-- About ends here -->

        
        <div id="work_scroll" class="pages">                                  <!-- Work starts here -->
            <div class="container main">
                <div class="row">
                    <div class="col-md-6" id="work_left">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            <div class="item"><img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/work.jpg"></div>
                            <div class="item"><img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/home.jpg"></div>
                            <div class="item"><img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/contact.jpg"></div>
                        </div>
                    </div>

                    <div class="col-md-6" id="work_right">
                        <a href="#index" class="btn btn-rabbit back"> <i class="fa fa-angle-left" aria-hidden="true"></i> 返回 </a>
                        <div id="watermark">
                            <h2 class="page-title" text-center>我的收藏</h2>
                            <div class="marker">藏</div>
                        </div>
                       <?php if(is_array($colist)): $i = 0; $__LIST__ = $colist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$col): $mod = ($i % 2 );++$i;?><div class="colist">
                             <ul>
                                 <li>
                                     <p class='subtitle'><a href="/AdaAda/index.php/Home/Index/game/id/<?php echo ($col["game_id"]); ?>" ><?php echo ($col["game_id"]); ?></a></p>
                                 </li>

                             </ul>
                           </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    
                    </div>
                </div>
            </div>    
        </div>                                                                 <!-- Work ends here  -->

        <div id="contact_scroll" class="pages">                             <!-- Contact starts here -->
            <div class="container main">
                <div class="row">
                <div class="col-md-6 left" id="contact_left">
                        <img class="img-responsive img-rabbit" src="/AdaAda/Public/Home/assetsForDev/images/contact.jpg">
                    </div>

                    <div class="col-md-6 right" id="contact_right">
                        <a href="#index" class="btn btn-rabbit back"> <i class="fa fa-angle-left" aria-hidden="true"></i> 返回 </a>
                        <div id="watermark">
                            <h2 class="page-title" text-center>下载记录</h2>
                            <div class="marker">载</div>
                        </div>                       
                        <?php if(is_array($downlist)): $i = 0; $__LIST__ = $downlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dol): $mod = ($i % 2 );++$i;?><div class="downlist">
                             <ul>
                                 <li>
                                     <p class='subtitle'><a href="/AdaAda/index.php/Home/Index/game/id/<?php echo ($dol["game_id"]); ?>" ><?php echo ($dol["game_id"]); ?></a></p>
                                     <p class="info"><?php echo ($dol["download_time"]); ?></p>
                                 </li>

                             </ul>
                           </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                 </div>               
            </div>
            
        </div>                                                              <!-- Contact ends here -->
        
        <script src="/AdaAda/Public/Home/assetsForDev/js/jquery-3.1.0.min.js"></script>
        <script src="/AdaAda/Public/Home/assetsForDev/js/bootstrap.min.js"></script>
        <script src="/AdaAda/Public/Home/assetsForDev/js/script.js"></script>
    </body>
</html>