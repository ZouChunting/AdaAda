<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	
    	//游戏分页显示
    	$game=D('game');//数据表名称
    	$where2['game_state']=1;
    	$count=$game->where($where2)->count();// 查询满足要求的总记录数
    	$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
    	$show=$Page->show();// 分页显示输出    	
    	$list=$game->where($where2)->order('game_date DESC')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	
    	$this->pop();
        $this->display();
    }
    
    public function game(){
 
        //连接数据表
    	$game=D('game');
    	$developer=D('developer');
    	$class=D('class');
    	
    	//获取游戏内容
    	$gameid=I('id');
    	$games=$game->find($gameid);
    	$this->assign('games',$games);
    	
    	//获取开发者名字
    	$where['game_id']=$gameid;
    	$did=$game->where($where)->getField('developer_id');
    	$dev=$developer->find($did);
    	$this->assign('dev',$dev);
    	
    	//获取分类名
    	$where['game_id']=$gameid;
    	$cid=$game->where($where)->getField('cid');
    	$cla=$class->find($cid);
    	$this->assign('cla',$cla);
    
    	$this->pop();
    	$this->display();
    }
    
    public function pop(){
    	$game=D('game');
    	$where['game_reco']=1;//用where来查找game_reco为1则为推荐
    	$greco=$game->where($where)->order('game_date DESC')->limit(10)->select();//limit代表限制显示几个推荐游戏
    	$this->assign('greco',$greco);
    }
    
    public function download(){
    	if (isset($_SESSION['user_name'])) {
    		
    		$uploadpath='./Uploads/Package/';//设置文件上传路径
        	$id=$_GET['game_id'];
        	$user_id=$_GET['user_id'];
        	if($id==''){//如果id为空
        		$this->error('下载失败！','',1);
        	}else{
        		$game=M('game');
    	    	$where['game_id']=$id;
    	    	//$result= $game->find($id);//根据id查询到文件信息
    		
    	    	$result=$game->where($where)->getField('game_package');
    	    	if($result==false) //如果查询不到文件信息
    	    	{
    		    	$this->error('下载失败！', '', 1);
    	    	}else{
    	    		
    	    		//记录下载量
    	    		$game_download=$game->where($where)->getField('game_downloads');
    	    		$game_downloads=$game_download+1;
    	    		$data['game_id']=$id;
    	    		$data['game_downloads']=$game_downloads;
    	    		
    	    		$game->create($data);
    	    		$game->save();  	    		
    	    		
    	    		//新增下载记录
    	    		$downloadinfo = M('download');
    	    		$downAdd=array(    	    		
    	    				'game_id'=>$id, 	    		
    	    				'user_id'=>$user_id,
    	    		);
    	    		
    	    		$rst = $downloadinfo->add($downAdd);//$rst 接收插入结果 成功返回插入记录的表ID
    	    		
    	    		dump($rst);
    	    		
    	    		
    	    		$http = new \Org\Net\Http();
    	    		$http->download($result);
    	    	}
         	}
        }else{
        	// $this->redirect('Login/login');
        	$this->error('请先登录!',U('Login/login'));
        }    	
    }
    
    public function collect(){
    	if (isset($_SESSION['user_name'])) {
    		$collection=D('collection');
    		
    		if(IS_POST){
    			$data['game_id']=I('game_id');
    			$data['user_id']=I('user_id');
    			$game_id==I('game_id');
    			
    			if($collection->create($data))
    			{
    				if($collection->add()){
    					$this->success('收藏成功',U('index'));
    				}else{
    					$this->error('收藏失败');
    				}
    			}
    			else{
    				$this->error($collection->getError());
    			}
    		}
  
    	}else{
    		// $this->redirect('Login/login');
    		$this->error('请先登录!',U('Login/login'));
    	}
    }
    
    public function rank(){
    	//游戏分页显示
    	$game=D('game');//数据表名称
    	$where2['game_state']=1;
    	$count=$game->where($where2)->count();// 查询满足要求的总记录数
    	$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
    	$show=$Page->show();// 分页显示输出    	
    	$list=$game->where($where2)->order('game_downloads DESC')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	
    	$this->pop();
        $this->display();
    }
    
    public function comment(){
    	//新增评论记录
    	if (isset($_SESSION['user_name'])) {
    		$cominfo = M('comment');
        	$content=$_GET['content'];
        	$id=$_GET['game_id'];
        	$user_id=$_GET['user_id'];
        	$comAdd=array(
    			'user_id'=>$user_id,
    			'game_id'=>$id,  
    			'comment_content'=>$content,
        	);
    	 
        	$rst = $cominfo->add($comAdd);//$rst 接收插入结果 成功返回插入记录的表ID

        	$this->success(评论成功。);

    	}else{
    		$this->error('请先登录!',U('Login/login'));
    	}
    	
    }
    
    public function commentlist(){
    	//游戏分页显示
    	$comment=D('comment');//数据表名称
    	$where2['game_id']=I('id');
    	//echo "<script> alert('{I('id')}') </script>";
    	$count=$comment->where($where2)->count();// 查询满足要求的总记录数
    	$Page=new\Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
    	$show=$Page->show();// 分页显示输出
    	$list=$comment->where($where2)->order('comment_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	 
    	$this->pop();
    	$this->display();
    }
    
    public function search(){
    	 
    	//游戏分页显示
    	$game=D('game');//数据表名称
    	$where2['game_state']=1;
    	$count=$game->where($where2)->count();// 查询满足要求的总记录数
    	$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
    	$show=$Page->show();// 分页显示输出
    	$list=$game->where($where2)->order('game_date DESC')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	 
    	$this->display();
    }
    
    public function classview(){
    	//游戏分页显示
    	$game=D('game');//数据表名称
    	$where2['game_state']=1;
    	$count=$game->where($where2)->count();// 查询满足要求的总记录数
    	$Page=new\Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(2)，2代表一页显示2篇文章
    	$show=$Page->show();// 分页显示输出
    	$list=$game->where($where2)->order('game_date DESC')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	
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