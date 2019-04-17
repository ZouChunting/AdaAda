<?php
namespace Home\Controller;
use Think\Controller;
class BaseController2 extends Controller {
	public function _initialize()
	{
		if (isset($_SESSION['developer_name'])) {
			//已登录，不做任何操作
		}else{
			$this->redirect('Login2/login2');
		}
		 
	}

}