<?php
namespace Admin\Controller;
use Common\Common\BaseController;
class LoginController extends BaseController 
{
	/**
	 * 显示登录界面
	 */
    public function login()
    {
		$this->display();
		
    }

    /**
     * 显示以及切换验证码，并将当前有效验证码存放在session中，以供后续验证
     */
    public function captcha()
    {
    	$verify = new \Think\Verify();
    	$verify->fontSize = 15;	
    	$verify->length = 4;
    	$verify->imageW = 145;
    	$verify->imageH = 30;
    	$verify->entry(1);
    }

    /**
     * 登录验证模块，并设置是否记录登录信息以及session过期时间
     */
    public function checkIn()
    {
    	$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? md5($_POST['password']) : '';
		$captcha = isset($_POST['captcha'])  ? $_POST['captcha'] : '';

		//用户勾选了记住登录信息，该信息将在一小时后过期
		if (isset($_POST['remember'])) {
			setcookie('username',$username,time()+60*60);
		}

		if(empty($username) || empty($password) || empty($captcha))
		{
			$this->redirect('Login/login',array(),3,'用户名、密码、验证码均不能为空');
		}else
		{
			$verify = new \Think\Verify();
			//验证验证码是否正确
			if (md5(strtolower($captcha)) == $_SESSION['verify_code']) {
				$this->redirect('Login/login',array(),3,'验证码错误,即将跳转到登录界面...');
			}

			//检查用户名、密码是否正确
			$admin = M('admin');
			if($admin->where("username='{$username}' and password='{$password}'")->find()){
				$_SESSION['username'] = $username;
				$this->success('登录成功！','../MainMenu/index');
			}else{
				$this->redirect('Login/login',array(),3,'页面跳转中...');
			}
		}
    }

    

}