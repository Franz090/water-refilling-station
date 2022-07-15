<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Account extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('account');

		$this->styles = [
			CSS_PATH.'settings.min.css'
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();
		$this->settings();
	}
	public function fetch()
	{
		$result = $this->model->fetch();
		$this->view('settings/form',$result);
	}
	public function settings()
	{
		$this->checkIfAdminLogin();

		$assets = [
			'curr_page' => 'Account Settings',
			'css_path' => [CSS_PATH.'settings.min.css'],
			'el_class' => 'mbtn6',
			'js_path' => [JS_PATH.'settings.js']
		];

		$this->view('template/header',$assets);
		$this->view('settings/index');
		$this->view('template/footer',$assets);
	}
	public function signUp()
	{
		if(isset($_SESSION['account_info'])){
			header('location: '.URL.'deliveries');
			exit();
		}

		$assets = [
			'curr_page' => 'Sign Up',
			'css_path' => [CSS_PATH.'login.min.css'],
			'el_class' => 'a_sign_up',
			'js_path' => [JS_PATH.'account.js']
		];

		$this->view('account/header',$assets);
		$this->view('account/sign-up');
		$this->view('account/footer',$assets);
	}
	public function signIn()
	{
		if(isset($_SESSION['account_info'])){
			header('location: '.URL.'deliveries');
			exit();
		}

		$assets = [
			'curr_page' => 'Sign In',
			'css_path' => [CSS_PATH.'login.min.css'],
			'el_class' => 'a_sign_in',
			'js_path' => [JS_PATH.'account.js']
		];

		$this->view('account/header',$assets);
		$this->view('account/sign-in');
		$this->view('account/footer',$assets);
	}
	public function create()
	{
		$id = $this->model->create($this->args,$this->validate);
		Response::output(2.1);
	}
	public function login()
	{
		$result = $this->model->signInUser($this->args,$this->validate);

		if(count($result) > 0)
		{
			$_SESSION['account_info'] = $result[0];
			Response::output(4.1);
		}else{
			Response::output(4.2);
		}
	}
	public function updateAccountInfo()
	{
		$this->model->updateAccountInfo($this->args,$this->validate);
		Response::output(3.2);
	}
	public function signOut()
	{
		unset($_SESSION['account_info']);
		session_destroy();
		header('Location: '.URL.'account/sign-in');	
	}
}

ob_end_flush();