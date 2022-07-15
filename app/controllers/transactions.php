<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Transactions extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('transactions');
		$this->styles = [
			CSS_PATH.'transactions.min.css',
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();

		$assets = [
			'curr_page' => 'Transactions',
			'css_path' => $this->styles,
			'el_class' => 'mbtn4',
			'js_path' => [JS_PATH.'transactions.js']
		];

		$this->view('template/header',$assets);
		$this->view('transactions/index');
		$this->view('template/footer',$assets);
	}
	public function fetch()
	{
		$result = $this->model->fetch($this->args);
		$this->view('transactions/table',$result);
	}
}

ob_end_flush();