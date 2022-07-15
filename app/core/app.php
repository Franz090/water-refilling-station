<?php

class App
{
	private $_url 			= null;
	private $controller 	= null;
	private $controllerPath = 'app/controllers/';
	private $modelPath 		= 'app/models/';
	private $errorFile 		= 'not-found.php';
	private $defaultFile	= 'account.php';

	public function _init()
	{
		$this->_getUrl();

		if(empty($this->_url[0]))
		{
			$this->_loadDefaultController();
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();
	}
	public function setControllerPath($path)
	{
		$this->controllerPath = trim($path, '/') . '/';
	}
	public function setModelPath($path)
	{
		$this->modelPath = trim($path, '/') . '/';
	}
	public function setErrorFile($path)
	{
		$this->errorFile = trim($path, '/');
	}
	public function setDefaultFile($path)
	{
		$this->defaultFile = trim($path, '/');
	}
	private function _getUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL); //to sanitize the url.
		$this->_url = explode('/', $url);
	}
	private function _loadDefaultController()
	{
		$file = $this->controllerPath . $this->defaultFile;
		require_once $file;
		$login = new Account;
		$this->controller = $login->signIn();
	}
	private function _loadExistingController()
	{
		$file = $this->controllerPath . $this->_url[0] . '.php';

		if(file_exists($file))
		{
			require_once $file;
			$new_url = str_replace('-', '', $this->_url[0]);
			$this->controller = new $new_url;
		}
		else
		{
			$this->_error();
			return false;
		}
	}

	/**
	 * If a method is passed in the GET url parameter
	 * This will explain how below codes are running
	 * http://localhost/controller/method/(param)/(param)/(param)
	 * url[0] = Controller name
	 * url[1] = Method
	 * url[2] = Param
	 * url[3] = Param
	 * url[4] = Param
	 */
	private function _callControllerMethod()
	{
		$url_replace = str_replace('-', '', $this->_url);//real
		$length = count($url_replace);
	
		// make sure the method we are calling exists
		if($length > 1){
			if(!method_exists($this->controller, $url_replace[1])){
				$this->_error();
			}
		}

		// Determine what to load
		switch ($length) 
		{
			case '5':
				$this->controller->{$url_replace[1]}($url_replace[2], $url_replace[3], $url_replace[4]);
				break;

			case '4':
				$this->controller->{$url_replace[1]}($url_replace[2], $url_replace[3]);
				break;

			case '3':
				$this->controller->{$url_replace[1]}($url_replace[2]);
				break;

			case '2':
				$this->controller->{$url_replace[1]}();
				break;
			
			default:
				$this->controller->index();
				break;
		}
	}

	private function _error()
	{
		$error_file = $this->controllerPath . $this->errorFile;
		require_once $error_file;
		$errfile = new NotFound;
		$this->controller = $errfile->index();
		exit;
	}
}