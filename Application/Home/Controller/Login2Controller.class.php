<?php
namespace Home\Controller;
use Think\Controller;
class Login2Controller extends Controller {

	public function login2()
	{
		if (isset($_SESSION['developer_name'])) {
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
				$data['developer_name']=I('post.developer_name');
				$data['developer_password']=I('post.developer_password');

				$code= I('code');                //这是提取页面上打字输入的code即验证码
				if(check_verify($code) == false){       //给function.php中定义的函数check_code，然后它返回真假
					$this->error('验证码错误');
				}else{
					$developer=M('developer')->where($data)->find();
					if ($developer==null) {
						//用户不存在或密码错误
						$this->error('用户不存在或密码错误');
					}else{
						$_SESSION=$developer;
						$this->redirect('Dev/developer');
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
	public function edit2(){
		$developer=D('developer');
	
		if (IS_POST) {
			$data['developer_id']=I('developer_id');
			$data['developer_name']=I('developer_name');
			$data['oldpassword']=I('oldpassword');
			$data['developer_pwd']=I('developer_pwd');
			$data['cnewpassword']=I('cnewpassword');
			// dump($data);die();
	
	
			//c=查找数据库中用户
			$where['developer_name']=I('developer_name');
			$developerdata=M('developer')->where($where)->find();
			 
	
			//开始验证密码
	
			//原密码等于数据库中密码
			if ($data['oldpassword']==$developerdata['developer_pwd']) {
				//新密码=确认新密码
				if ($data['developer_pwd']==$data['cnewpassword']) {
					//修改数据库中密码
					if ($developer->create($data)) {
						if ($developer->save()) {
							$this->success('修改密码成功',U('Dev/developer'));
						}else{
							$this->error('修改密码失败');
						}
					}else{
						$this->error($cate->getError());
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
	
		$developerid=I('id');
		$developers=$developer->find($developerid);
	
	
		$this->assign('developers',$developers);
		$this->display();
	}

	//退出
	public function logout(){
		session_destroy();
		$this->success('注销成功，并跳转至首页。',U('Home/Index/index'));

	}

}