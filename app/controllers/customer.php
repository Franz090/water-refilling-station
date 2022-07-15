<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Customer extends Controller
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('customer');
	}
	public function index()
	{
		if(isset($_SESSION['account_info'])){
			if($_SESSION['account_info']['accountType'] == 'customer'){
				header('location: '.URL.'customer/order-form');
				exit();
			}
		}

		$assets = [
			'curr_page' => 'Home',
			'css_path' => [CSS_PATH.'customer.min.css'],
			'js_path' => [JS_PATH.'customer.js',JS_PATH.'modal.js']
		];

		$this->view('customer/template/header',$assets);
		$this->view('customer/home/index');
		$this->view('customer/template/footer',$assets);
	}
	public function signUp()
	{
		if(isset($_SESSION['account_info'])){
			if($_SESSION['account_info']['accountType'] == 'customer'){
				header('location: '.URL.'customer/order-form');
				exit();
			}
		}

		$assets = [
			'curr_page' => 'Sign Up',
			'css_path' => [CSS_PATH.'login.min.css'],
			'el_class' => 'a_sign_up',
			'js_path' => [JS_PATH.'customer.js']
		];

		$this->view('account/header',$assets);
		$this->view('account/sign-up');
		$this->view('account/footer',$assets);
	}
	public function signIn()
	{
		if(isset($_SESSION['account_info'])){
			if($_SESSION['account_info']['accountType'] == 'customer'){
				header('location: '.URL.'customer/order-form');
				exit();
			}
		}

		$assets = [
			'curr_page' => 'Sign In',
			'css_path' => [CSS_PATH.'login.min.css'],
			'el_class' => 'a_sign_in',
			'js_path' => [JS_PATH.'customer.js']
		];

		$this->view('account/header',$assets);
		$this->view('account/sign-in');
		$this->view('account/footer',$assets);
	}
	public function orderForm()
	{
		$this->checkIfCustomerLogin();

		$assets = [
			'curr_page' => 'Account',
			'el_class' => 'of_active',
			'css_path' => [CSS_PATH.'customer.min.css'],
			'js_path' => [JS_PATH.'customer.js']
		];

		$this->view('customer/template/header',$assets);
		$this->view('customer/account/index',$assets);
		$this->view('customer/template/footer',$assets);
	}
	public function transactionHistory()
	{
		$this->checkIfCustomerLogin();

		$assets = [
			'curr_page' => 'Transaction History',
			'el_class' => 'th_active',
			'css_path' => [CSS_PATH.'customer.min.css'],
			'js_path' => [JS_PATH.'customer.js'],
			'txns_history' => $this->model->transactionHistory()
		];

		$this->view('customer/template/header',$assets);
		$this->view('customer/account/transaction-history', $assets);
		$this->view('customer/template/footer',$assets);
	}
	public function settings()
	{
		$this->checkIfCustomerLogin();

		$assets = [
			'curr_page' => 'Account Settings',
			'el_class' => 'as_active',
			'css_path' => [CSS_PATH.'customer.min.css'],
			'js_path' => [JS_PATH.'customer.js']
		];

		$this->view('customer/template/header',$assets);
		$this->view('customer/account/settings',$assets);
		$this->view('customer/template/footer',$assets);
	}
	public function deliveryDetails()
	{
		$this->view('customer/forms/delivery');
	}
	public function reservationDetails()
	{
		$this->view('customer/forms/reservation');
	}
	public function createOrder()
	{
		$this->model->createOrder($this->args,$this->validate);
		Response::output(5);
	}
	public function productList()
	{
		$result = $this->model->productList();
		$this->view('customer/forms/products',$result);
	}
	public function signOut()
	{
		unset($_SESSION['customer_account_info']);
		session_destroy();
		header('Location: '.URL.'customer/sign-in');	
	}
}

ob_end_flush();