<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
public function _initialize()
    {
        if (isset($_SESSION['manager_name'])) {
            //已登录，不做任何操作
        }else{
            // $this->redirect('Login/login');
            $this->error('请先登录!',U('Login/login'));
        }
    	
    }
	
}