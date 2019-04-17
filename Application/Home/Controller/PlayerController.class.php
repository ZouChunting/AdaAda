<?php
namespace Home\Controller;
use Think\Controller;
class PlayerController extends BaseController{
	public function user(){
		$this->comment();
		$this->download();
		$this->collection();
		$this->display();
	}
	
	public function comment(){
		$comment=D('comment');
		$where['user_id']=$_SESSION['user_id'];
		$comlist=$comment->where($where)->order('comment_time DESC')->limit(5)->select();
		$this->assign('comlist',$comlist);
	}
	
	public function collection(){
		$where['user_id']=$_SESSION['user_id'];
		$collection = D('collection');
		$colist = $collection->where($where)->Distinct(true)->field('game_id')->order('collection_time DESC')->limit(10)->select();
		//->Distinct(true)->field('descriprion')
		$this->assign('colist',$colist);
	}
	
	public function download(){
		$where['user_id']=$_SESSION['user_id'];		
		$download = D('download');
		$downlist = $download->where($where)->order('download_time DESC')->limit(5)->select();
		
		$this->assign('downlist',$downlist);
	}
}