<?php
namespace Admin\Controller;
use Think\Controller;
class GameController extends Controller {

	public function lst(){
		
		$game=D('game');
		$count=$game->count();
		$Page=new\Think\Page($count,5);
		$show=$Page->show();
		$list=$game->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		
		$this->display();
	}


	public function add(){
		$game=D('game');
		if(IS_POST){
			$data['game_name']=I('game_name');
			$data['game_reco']=I('game_reco');
			$data['game_des']=I('game_des');

			//上传图片
			if ($_FILES['game_pic']['tmp_name']!='') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

				$upload->savePath  =     './Uploads/Picture/'; // 设置附件上传（子）目录
				$upload->rootPath  =     './'; // 设置附件上传根目录

				$info=$upload->uploadOne($_FILES['game_pic']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
					$data['game_pic']=$info['savepath'].$info['savename'];//game_pic 为数据库字段


				}
			}

			//dump($data);die();
			
			//上传游戏安装包
			if ($_FILES['game_package']['tmp_name']!='') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('exe', 'zip', 'rar', 'iso');// 设置附件上传类型
			
				$upload->savePath  =     './Uploads/Package/'; // 设置附件上传（子）目录
				$upload->rootPath  =     './'; // 设置附件上传根目录
			
				$info=$upload->uploadOne($_FILES['game_package']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
					$data['game_package']=$info['savepath'].$info['savename'];//game_pic 为数据库字段
			
			
				}
			}



			if($game->create($data))
			{
				if($game->add()){
					$this->success('发布游戏成功',U(lst));
				}else{
					$this->error('发布游戏失败');
				}
			}
			else{
				$this->error($game->getError());
			}
			return;
		}
		$this->display();
	}




	public function edit(){
		$game=D('game');
		if(IS_POST){
			$data['game_id']=I('game_id');
			$data['game_name']=I('game_name');
			$data['game_reco']=I('game_reco');
			$data['game_state']=I('game_state');
			$data['game_des']=I('game_des');
			$data['developer_id']=I('developer_id'); //开发者
			$data['cid']=I('post.gameclass');
			$data['game_downloads']=I('game_downloads');

			//上传图片
			if ($_FILES['game_pic']['tmp_name']!='') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型

				$upload->savePath  =     './Uploads/Picture/'; // 设置附件上传（子）目录
				$upload->rootPath  =     './'; // 设置附件上传根目录

				$info=$upload->uploadOne($_FILES['game_pic']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
					$data['game_pic']=$info['savepath'].$info['savename'];//game_pic 为数据库字段


				}
			}

			//dump($data);die();
			
			//上传游戏安装包
			if ($_FILES['game_package']['tmp_name']!='') {
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('exe', 'zip', 'rar', 'iso');// 设置附件上传类型
					
				$upload->savePath  =     './Uploads/Package/'; // 设置附件上传（子）目录
				$upload->rootPath  =     './'; // 设置附件上传根目录
					
				$info=$upload->uploadOne($_FILES['game_package']);
				if(!$info) {// 上传错误提示错误信息
					$this->error($upload->getError());
				}else{// 上传成功
					$data['game_package']=$info['savepath'].$info['savename'];//game_pic 为数据库字段
						
						
				}
			}



			if($game->create($data))
			{
				if($game->save()){
					$this->success('修改游戏成功',U(lst));
				}else{
					$this->error('修改游戏失败');
				}
			}
			else{
				$this->error($game->getError());
			}
			return;
		}

		$gameid=I('id');
		$games=$game->find($gameid);
		$this->assign('games',$games);
		
		
		$this->gameclass();
		$this->display();
	}


	public function del(){
		$game=D('game');
		if($game->delete(I('id'))){
			$this->success('删除游戏成功。',U(lst));
		}
		else{
			$this->error('删除游戏失败。');
		}
	}
	
	public function gameclass(){
		$class = M("class");
		$cell = $class->select();
		//var_dump($cell);
		$this->assign('cell',$cell);
	}


}