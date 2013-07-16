<?php
App::uses('RegistersController', 'Controller');

class RegistersControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$RegistersController = new RegistersController();
	}

	/**
	 * Test action "index" - success
	 */
	public function testIndexSuccess() {
		$data = array('email' => 'test_boo@mulodo.com',
				'password' => '12345678',
				'username' => 'test_boo',
		);

		$result = $this->testAction(
				'/registers/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" -  invalid argument
	 */
	public function testIndexInvalidArgument() {
		$data = array('email' => 'ABC',
				'password' => 'AAAAAAA',
				'username' => 'AAAA',
		);

		$result = $this->testAction(
				'/registers/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" - email is exist
	 */
	public function testIndexEmailIsExist() {
		$data = array('email' => 'lai.thinh@mulodo.com',
				'password' => 'huythinh',
				'username' => 'Huy Thinh',
		);

		$result = $this->testAction(
				'/registers/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

}