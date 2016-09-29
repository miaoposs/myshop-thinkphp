<?php
namespace Common\Common;
use Think\Controller;
class BaseController extends Controller
{
	public function _empty()
	{
		$this->display("Admin@Public:404");
	}

	public function isLogin()
	{
		/*如果加上七天免登陆的话，只有使用cookie么？*/
		if(!isset($_SESSION['username'])){
			$this->error('您还未登录，需要先登录本系统才能进行相关操作哦',__MODULE__.'/Login/login');
		}
	}
}