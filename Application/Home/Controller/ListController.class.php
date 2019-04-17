<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
	public function searchlist(){
		
		$game=D('game');//数据表名称
		
		$key=I('key');
		//echo "<script> alert('{$key}') </script>";
		$where['game_name']=array('like',"%$key%");
		$where2['game_state']=1;
		//$count=$game->where($where)->where($where2)->count();// 查询满足要求的总记录数
		//$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
		//$show=$Page->show();// 分页显示输出
		$list=$game->where($where)->where($where2)->order('game_date DESC')->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->assign('list',$list);// 赋值数据集
		//$this->assign('page',$show);// 赋值分页输出		
		
		$this->display();
	}
	
	public function classlist(){
		$game=D('game');//数据表名称
		$where['cid']=I('post.gameclass');
		$where2['game_state']=1;
		
		//$count=$game->where($where)->where($where2)->count();// 查询满足要求的总记录数
		//$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
		//$show=$Page->show();// 分页显示输出
		$list=$game->where($where)->where($where2)->order('game_date DESC')->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$this->assign('list',$list);// 赋值数据集
		//$this->assign('page',$show);// 赋值分页输出
		
		$this->gameclass();
		$this->display();
	}
	
	public function gameclass(){
		$class = M("class");
		$cell = $class->select();
		//var_dump($cell);
		$this->assign('cell',$cell);
	}

}