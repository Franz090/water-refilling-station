<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Deliveries extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('deliveries');
		$this->styles = [
			CSS_PATH.'deliveries.min.css',
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();
		
		$updateReservation = $this->model('reservations');
		$updateReservation->updateStatus();

		$assets = [
			'curr_page' => 'Deliveries',
			'css_path' => $this->styles,
			'el_class' => 'mbtn2',
			'js_path' => [JS_PATH.'deliveries.js']
		];

		$this->view('template/header',$assets);
		$this->view('deliveries/index');
		$this->view('template/footer',$assets);
	}
	public function fetch()
	{
		$result = $this->model->fetch($this->args);
		$this->view('deliveries/table',$result);
	}
	public function changeStatus()
	{
		$this->model->changeStatus($this->args,$this->validate);
	}
	public function updateOrderInfo()
	{
		$this->model->updateOrderInfo($this->args);
	}
}

ob_end_flush();