<?php
namespace Admin\Controller;
use Think\Controller;
class DevController extends Controller {

	public function lst(){
		//用户分页显示
		$developer=D('developer');
		$count=$developer->count();
		$Page=new\Think\Page($count,5);
		$show=$Page->show();
		$list=$developer->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);


		$this->display();
	}

	public function edit(){
		$developer=D('developer');
		if(IS_POST){
			$data['developer_id']=I('developer_id');
			$data['developer_name']=I('developer_name');
			$data['developer_pwd']=I('developer_pwd');
			$data['developer_address']=I('developer_address');
			$data['developer_email']=I('developer_email');
				
			if($developer->create($data))
			{
				if($developer->save()){
					$this->success('开发者信息修改成功',U(lst));
				}else{
					$this->error('开发者信息修改失败');
				}
			}
			else{
				$this->error($user->getError());
			}
			return;
				
		}
		$developerid=I('id');
		$developers=$developer->find($developerid);
		$this->assign('developers',$developers);

		$this->display();
	}
	
	public function add(){
		$developer=D('developer');
	
		$data['developer_name']=$_GET['developer_name'];
		$data['developer_pwd']=$_GET['developer_pwd'];
		$data['developer_email']=$_GET['developer_email'];
		$data['developer_address']=$_GET['developer_address'];
	
		if($developer->create($data))
		{
			if($developer->add()){
				$this->success('添加开发者成功',U(lst));
			}else{
				$this->error('添加开发者失败');
			}
		}
		else{
			$this->error($developer->getError());
		}
	}

	public function del(){
		$developer=D('developer');
		if($developer->delete(I('id'))){
			$this->success('删除开发者成功。',U(lst));
		}
		else{
			$this->error('删除开发者失败。');
		}
	}
}