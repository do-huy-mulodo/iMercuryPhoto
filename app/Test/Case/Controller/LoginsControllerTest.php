<?php
App::uses('LoginsController', 'Controller');

class LoginsControllerTest extends ControllerTestCase {
	//public $fixtures = array('app.login');
	
	public function setUp() {
		parent::setUp();
		$LoginsController = new LoginsController();
	}
	
	public function testIndexInDataOK() {
		$data = array('email' => 'lai.thinh@mulodo.com',
						'password' => '12345678',			
				);
				
		$result = $this->testAction(
				'/logins/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	public function testIndexInDataNotExist() {
		$data = array('email' => 'nguyen.khoi@mulodo.com',
				'password' => '12345678',
		);
	
		$result = $this->testAction(
				'/logins/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	public function testIndexInDataInvalid() {
		$data = array('email' => 'nguyen.khoimulodo.com',
				'password' => '12345678',
		);
	
		$result = $this->testAction(
				'/logins/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	public function testIndexInDataWrong() {
		$data = array('email' => 'nguyen.khoi@mulodo.com',
				'password' => '123456789',
		);
	
		$result = $this->testAction(
				'/logins/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
}