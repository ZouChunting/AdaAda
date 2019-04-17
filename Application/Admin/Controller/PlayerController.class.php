<?php
namespace Admin\Controller;
use Think\Controller;
class PlayerController extends Controller {

	public function lst(){
		//用户分页显示
		$user=D('user');
		$count=$user->count();
		$Page=new\Think\Page($count,5);
		$show=$Page->show();
		$list=$user->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		
		
		$this->display();
	}
	
	public function edit(){
		$user=D('user');
		if(IS_POST){
			$data['user_id']=I('user_id');
			$data['user_name']=I('user_name');
			$data['user_pwd']=I('user_pwd');
			$data['user_sex']=I('user_sex');
			
			if($user->create($data))
			{
				if($user->save()){
					$this->success('用户信息修改成功',U(lst));
				}else{
					$this->error('用户信息修改失败');
				}
			}
			else{
				$this->error($user->getError());
			}
			return;
			
		}
		$userid=I('id');
		$users=$user->find($userid);
		$this->assign('users',$users);
		
		$this->display();
	}
	
	public function del(){
		$user=D('user');
		if($user->delete(I('id'))){
			$this->success('删除用户成功。',U(lst));
		}
		else{
			$this->error('删除用户失败。');
		}
	}
}