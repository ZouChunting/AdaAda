<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends Controller {

	public function lst(){
		//用户分页显示
		$class=D('class');
		$count=$class->count();
		$Page=new\Think\Page($count,15);
		$show=$Page->show();
		$list=$class->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);


		$this->display();
	}
	
	public function add(){
		$class=D('class');
		
		$data['class_name']=$_GET['class_name'];
		
		if($class->create($data))
		{
			if($class->add()){
				$this->success('添加分类成功',U(lst));
			}else{
				$this->error('添加分类失败');
			}
		}
		else{
			$this->error($class->getError());
		}
	}

	public function edit(){
		$class=D('class');
		if(IS_POST){
			$data['class_id']=I('class_id');
			$data['class_name']=I('class_name');
			

			if($class->create($data))
			{
				if($class->save()){
					$this->success('分类信息修改成功',U(lst));
				}else{
					$this->error('分类信息修改失败');
				}
			}
			else{
				$this->error($class->getError());
			}
			return;

		}
		$classid=I('id');
		$classs=$class->find($classid);
		$this->assign('classs',$classs);

		$this->display();
	}

	public function del(){
		$class=D('class');
		if($class->delete(I('id'))){
			$this->success('删除分类成功。',U(lst));
		}
		else{
			$this->error('删除分类失败。');
		}
	}
}