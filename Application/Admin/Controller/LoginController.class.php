<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

     public function login()
    {
        if (isset($_SESSION['manager_name'])) {
            //已登录
            $this->redirect('Index/index');
        }else{
                //未登录
            if (IS_POST) {
                //提交登陆数据
                $data['manager_name']=I('post.manager_name');
                $data['manager_pwd']=I('post.manager_pwd');


                $code= I('code');                //这是提取页面上打字输入的code即验证码
                if(check_verify($code) == false){       //给function.php中定义的函数check_code，然后它返回真假
                    $this->error('验证码错误');
                }else{
                    $manager=M('manager')->where($data)->find();
                    if ($manager==null) {
                        //用户不存在或密码错误
                        $this->error('用户不存在或密码错误');
                    }else{
                        $_SESSION=$manager;
                        $this->redirect('Index/index');
                    }
                }

            }else{
                //普通访问
                $this->display();
            } 

        }      
    }



    public function edit(){
        $manager=D('manager');

        if (IS_POST) {
            $data['manager_id']=I('manager_id');
            $data['manager_name']=I('manager_name');
            $data['oldpassword']=I('oldpassword');
            $data['manager_pwd']=I('manager_pwd');
            $data['cnewpassword']=I('cnewpassword');
            // dump($data);die();


             //c=查找数据库中用户
             $where['manager_name']=I('manager_name');
             $managerdata=M('manager')->where($where)->find();
             

             //开始验证密码

             //原密码等于数据库中密码
             if ($data['oldpassword']==$managerdata['manager_pwd']) {
                //新密码=确认新密码
                if ($data['manager_pwd']==$data['cnewpassword']) {
                    //修改数据库中密码
                    if ($manager->create($data)) {
                        if ($manager->save()) {
                          $this->success('修改密码成功',U('Index/index'));
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

         $managerid=I('id');
         $managers=$manager->find($managerid);


         $this->assign('managers',$managers);
         $this->display();
    }



    //验证码
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->length = 4;
        $Verify->entry();

    }


      //退出
    public function logout(){
        session_destroy();
        $this->success('注销成功，并跳转至前台。',U('Home/Index/index'));

    }



}//尾巴