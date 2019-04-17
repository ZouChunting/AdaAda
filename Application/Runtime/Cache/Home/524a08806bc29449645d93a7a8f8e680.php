<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>注册</title>
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
                        <label for="user">用户名：</label>
                        <input type="text" name="user_name" placeholder="用户名" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="user_pwd"  placeholder="密码" id="pwd" size="35" class="admin_input_style" />
                    </li>

                    <li>
                        <label for="sex">性别：</label>
                        <select style="width:100%;height:30px;border-style:none;color:#767676;" id="user_sex" name="user_sex">                             
                            <option value="男">男</option> 
                            <option value="女">女</option>                                   
                        </select>
                    </li>


                    <li>
                        <input type="submit" tabindex="3" value="注册" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>