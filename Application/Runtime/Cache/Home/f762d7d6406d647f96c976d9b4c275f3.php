<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户修改密码</title>
    <link href="/AdaAda/Public/Home/css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap" style="margin-top: 50px;">
    <h1>AdaAda</h1>
    <div class="adming_login_border">
        <div class="admin_input">
        
            <form action="" method="post">
            <input type="hidden" name="user_id" value="<?php echo ($users["user_id"]); ?>" />
            <input type="hidden" name="user_name" value="<?php echo ($users["user_name"]); ?>">
            
                <ul class="admin_items">
                    <li>
                        <label for="oldpassword">原密码：</label>
                        <input type="password" name="oldpassword" placeholder="原密码" id="oldpassword" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">新密码：</label>
                        <input type="password" name="user_pwd"  placeholder="密码" id="pwd" size="35" class="admin_input_style" />
                    </li>

                    <li>
                        <label for="pwd">确认密码：</label>
                        <input type="password" name="cnewpassword" placeholder="确认密码" id="pwd" size="35" class="admin_input_style" />                        
                    </li>


                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                        <br>
                        <input type="button" onclick="history.go(-1)" tabindex="3" value="返回" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>