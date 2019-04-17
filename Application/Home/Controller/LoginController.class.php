<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

	public function login()
	{
		if (isset($_SESSION['user_name'])) {
			//已登录
			echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"您已登录!\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            exit;
		}else{
			//未登录
			if (IS_POST) {
				//提交登录数据
				$data['user_name']=I('post.user_name');
				$data['user_password']=I('post.user_password');
		
				$code= I('code');                //这是提取页面上打字输入的code即验证码
				if(check_verify($code) == false){       //给function.php中定义的函数check_code，然后它返回真假
					$this->error('验证码错误');
				}else{
					$user=M('user')->where($data)->find();
					if ($user==null) {
						//用户不存在或密码错误
						$this->error('用户不存在或密码错误');
					}else{
						$_SESSION=$user;
						$this->redirect('Index/index');
					}
				}
		
		
		
		
			}else{
				//普通访问
				$this->display();
			}
		
		}
		
	}
	
    //验证码
    public function verify(){
    	$Verify = new \Think\Verify();
    	$Verify->length = 4;
    	$Verify->entry();
    
    }
    
    //修改密码
    public function edit(){
    	$user=D('user');
    
    	if (IS_POST) {
    		$data['user_id']=I('user_id');
    		$data['user_name']=I('user_name');
    		$data['oldpassword']=I('oldpassword');
    		$data['user_pwd']=I('user_pwd');
    		$data['cnewpassword']=I('cnewpassword');
    		// dump($data);die();
    
    
    		//c=查找数据库中用户
    		$where['user_name']=I('user_name');
    		$userdata=M('user')->where($where)->find();
    
    
    		//开始验证密码
    
    		//原密码等于数据库中密码
    		if ($data['oldpassword']==$userdata['user_pwd']) {
    			//新密码=确认新密码
    			if ($data['user_pwd']==$data['cnewpassword']) {
    				//修改数据库中密码
    				if ($user->create($data)) {
    					if ($user->save()) {
    						$this->success('修改密码成功',U('Player/user'));
    					}else{
    						$this->error('修改密码失败');
    					}
    				}else{
    					$this->error($user->getError());
    				}
    
    			}else{
    				$this->error('新密码不相同，请重新输入!');
    			}
    
    			// echo "密码匹配正确";
    		}else{
    			$this->error('原密码不正确，请重新输入原密码!');
    		}
    		return;
    
    	}
    
    	$userid=I('id');
    	$users=$user->find($userid);
    
    
    	$this->assign('users',$users);
    	$this->display();
    }
    
    //退出
    public function logout(){
    	session_destroy();
    	$this->success('注销成功，并跳转至首页。',U('Home/Index/index'));
    
    }
    
    public function register(){
    	
    	$user=D('user');
    	if (IS_POST) {
    		$data['user_name']=I('user_name');
        	$data['user_pwd']=I('user_pwd');
        	$data['user_sex']=I('user_sex');
    	
        	if($user->create($data))
        	{
        		if($user->add()){
    	    		$this->success('注册成功',U('Home/Index/index'));
    	    	}else{
    	    		$this->error('注册失败');
    	    	}
        	}
        	else{
        		$this->error($user->getError());
        	}
    	}else{
    		$this->display();
    	}
    	
    	
    	
    }
    
    
	
}