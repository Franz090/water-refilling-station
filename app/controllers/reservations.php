<?php
ob_start();
error_reporting(E_ALL);
session_start();

class Reservations extends Controller implements AppInterface
{
	function __construct()
	{
		$this->args = $_REQUEST;
		$this->validate = $this->libs('validation');
		$this->model = $this->model('reservations');
		$this->styles = [
			CSS_PATH.'reservations.min.css',
		];
	}
	public function index()
	{
		$this->checkIfAdminLogin();

		$updateReservation = $this->model('reservations');
		$updateReservation->updateStatus();

		$assets = [
			'curr_page' => 'Reservations',
			'css_path' => $this->styles,
			'el_class' => 'mbtn3',
			'js_path' => [JS_PATH.'reservations.js']
		];

		$this->view('template/header',$assets);
		$this->view('reservations/index');
		$this->view('template/footer',$assets);
	}
	public function fetch()
	{
		$result = $this->model->fetch($this->args);
		$this->view('reservations/table',$result);
	}
}

ob_end_flush();