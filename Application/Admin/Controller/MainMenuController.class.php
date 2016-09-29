<?php
namespace Admin\Controller;
use Common\Common\BaseController;
class MainMenuController extends BaseController
{
	public function _empty()
	{
		$this->display("Public:404");
	}

	
	/**
	 * 显示admin的主页面
	 */
	public function index()
	{
		if(!isset($_SESSION['username'])){
			$this->error('您还未登录本系统哦',__MODULE__.'/Login/login',3);
		}
		$this->display();
	}


	/**
	 * 加载index.html中的frame请求的html页面
	 * @param $name    请求的页面名称
	 */
	public function loadFrameContent($name)
	{
		if($name == 'top'){
			$this->display('MainMenu:top');
		}else if($name == 'menu'){
			$this->display('MainMenu:menu');
		}else if($name == 'main' ){
			$this->display('MainMenu:main');
		}else{
			$this->display('MainMenu:drag');
		}
	}

	

	public function clearCache()
	{

	}

	/**
     * 退出系统
     */
    public function logout()
    {
    	session_destroy();
		$this->redirect('Login/login');
    }

    
}
