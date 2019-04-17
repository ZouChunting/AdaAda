<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {

	public function lst(){

		$comment=D('comment');
		$count=$comment->count();
		$Page=new\Think\Page($count,5);
		$show=$Page->show();
		$list=$comment->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);

		$this->display();
	}
	
	public function del(){
		$comment=D('comment');
		if($comment->delete(I('id'))){
			$this->success('删除评论成功。',U(lst));
		}
		else{
			$this->error('删除评论失败。');
		}
	}
}