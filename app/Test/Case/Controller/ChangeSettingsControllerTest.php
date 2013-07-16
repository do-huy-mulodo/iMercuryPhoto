<?php
App::uses('ChangeSettingsController', 'Controller');

class ChangeSettingsControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$ChangeSettingsController = new ChangeSettingsController();
	}

	/**
	 * Test action "index" - success
	 */
	public function testIndexSuccess() {
		$data = array('id' => '1',
				'username' => 'Huy Thinh',
				'old_pwd' => '12345678',
				'new_pwd' => '12345678',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
		);

		$result = $this->testAction(
				'/changeSettings/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" -  invalid argument
	 */
	public function testIndexInvalidArgument() {
		$data = array('id' => '1',
				'username' => 'Huy Thinh',
				'old_pwd' => '12345678',
				'new_pwd' => '',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
		);

		$result = $this->testAction(
				'/changeSettings/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" - token is not match
	 */
	public function testIndexTokenNotMatch() {
		$data = array('id' => '1',
				'username' => 'Huy Thinh',
				'old_pwd' => '12345678',
				'new_pwd' => '12345678',
				'token' => 'boobooboo',
		);

		$result = $this->testAction(
				'/changeSettings/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	/**
	 * Test action "index" - wrong old password
	 */
	public function testIndexWrongOldPassword() {
		$data = array('id' => '1',
				'username' => 'Huy Thinh',
				'old_pwd' => '87654321',
				'new_pwd' => '12345678',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
		);
	
		$result = $this->testAction(
				'/changeSettings/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

}