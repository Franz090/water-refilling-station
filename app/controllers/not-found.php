<?php

class NotFound extends Controller
{
	public function index(){
		$this->view('errors/404');
	}
}