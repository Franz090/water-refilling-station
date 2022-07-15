<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Products extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('products');
		$this->assets = [
			'curr_page' => 'Products',
			'css_path' => [
				CSS_PATH.'products.min.css',
			],
			'el_class' => 'mbtn5',
			'js_path' => [JS_PATH.'products.js']
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();
		$this->list();
	}
	public function list()
	{
		$this->view('template/header',$this->assets);
		$this->view('products/list','l_active');
		$this->view('template/footer',$this->assets);
	}
	public function add()
	{
		$this->checkIfAdminLogin();
		$this->view('template/header',$this->assets);
		$this->view('products/adding-form','a_active');
		$this->view('template/footer',$this->assets);
	}
	public function fetch()
	{
		$result = $this->model->fetch();
		$this->view('products/product-list',$result);
	}
	public function addNewProduct()
	{
		$result = $this->model->addNewProduct($this->args);
	}
	public function remove()
	{
		$this->model->remove($this->args);
	}
}

ob_end_flush();