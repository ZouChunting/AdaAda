<?php
namespace Home\Controller;
use Think\Controller;
class DevController extends BaseController2 {
	public function developer(){
		$game=D('game');
		if(IS_POST){
			$data['game_name']=I('game_name');  //游戏名称
			$data['developer_id']=I('developer_id'); //开发者
			$data['game_des']=I('game_des');
			$data['cid']=I('post.gameclass');

			//$hello=I('game_name');
			//echo "<script> alert('{$hello}') </script>";
			//上传图片
			if ($_FILES['game_pic']['tmp_name']!='') {
				//$hello = 'hello , php';
				//echo "<script> alert('{$hello}') </script>";
				
				$upload = new \Think\Upload();// 实例化上传类
				$upload->maxSize   =     3145728 ;// 设置附件上传大小
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		
				$upload->savePath  =     './Uploads/Picture/'; // 设置附件上传（子）目录
				$upload->rootPath  =     './'; // 设置附件上传根目录
		
				
				$info=$upload->uploadOne($_FILES['game_pic']);
				//echo "<script> alert('{$info}') </script>";
				
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
					$this->success('发布游戏成功',U(developer));
				}else{
					$this->error('发布游戏失败');
				}
			}
			else{
				$this->error($game->getError());
			}
			return;
		}
		
		
		$this->dev();
		$this->gameclass();
		$this->display();
		
	}
	
	public function dev(){
		$game2=D('game');
    	$where['developer_id']=$_SESSION['developer_id'];//用where来查找game_reco为1则为推荐
    	$devlist=$game2->where($where)->order('game_date DESC')->limit(5)->select();//limit代表限制显示几个推荐游戏
    	$this->assign('devlist',$devlist);
	}
	
	public function gameclass(){
		$class = M("class");
		$cell = $class->select();
		//var_dump($cell);
		$this->assign('cell',$cell);
	}
	
	
	
	
}