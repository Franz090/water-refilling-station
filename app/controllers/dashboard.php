<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Dashboard extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('dashboard');
		$this->styles = [
			CSS_PATH.'dashboard.min.css',
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();

		$updateReservation = $this->model('reservations');
		$updateReservation->updateStatus();

		$assets = [
			'curr_page' => 'Dashboard',
			'css_path' => $this->styles,
			'el_class' => 'mbtn1',
			'js_path' => [JS_PATH.'dashboard.js']
		];

		$this->view('template/header',$assets);
		$this->view('dashboard/index');
		$this->view('template/footer',$assets);
	}
	public function fetch()
	{
		$model = $this->model('deliveries');
		$result = $model->fetch($this->args);
		$this->view('dashboard/table',$result);
	}
	public function countDeliveries()
	{
		$result = $this->model->countDeliveries($this->args);
		exit($result);
	}
	public function countReservations()
	{
		$result = $this->model->countReservations($this->args);
		exit($result);
	}
}

ob_end_flush();