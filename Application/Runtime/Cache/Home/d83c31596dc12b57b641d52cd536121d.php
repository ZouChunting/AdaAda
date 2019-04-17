<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>前台开发者登录</title>
    <link href="/AdaAda/Public/Home/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap" style="margin-top: 50px;">
    <h1>AdaAda</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="developer">用户名：</label>
                        <input type="text" name="developer_name" placeholder="用户名" id="developer" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="developer_pwd"  placeholder="密码" id="pwd" size="35" class="admin_input_style" />
                    </li>

                    <li>
                        <label for="pwd">验证码：</label>
                        <input type="text" name="code" placeholder="验证码" id="pwd" size="35" class="admin_input_style" />
                        <img src="/AdaAda/index.php/Home/Login/verify" onclick="this.src='/AdaAda/index.php/Home/Login/verify/'+Math.random();" style="cursor: pointer;width: 150px;" />
                    </li>


                    <li>
                        <input type="submit" tabindex="3" value="登录" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>