<?php
App::uses('GetUserInfosController', 'Controller');

class GetUserInfosControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$GetUserInfosController = new GetUserInfosController();
	}

	/**
	 * Test action "index" - success
	 */
	public function testIndexSuccess() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'user_id' => '2',
				
		);

		$result = $this->testAction(
				'/getUserInfos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" -  invalid argument
	 */
	public function testIndexInvalidArgument() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'user_id' => '',
		);

		$result = $this->testAction(
				'/getUserInfos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" - token is not match
	 */
	public function testIndexTokenNotMatch() {
		$data = array('id' => '1',
				'token' => 'tokenwrong',
				'user_id' => '2',
		);

		$result = $this->testAction(
				'/getUserInfos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	/**
	 * Test action "index" - user_id is not exist
	 */
	public function testIndexUserIsNotExist() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'user_id' => '50000',
		);
	
		$result = $this->testAction(
				'/getUserInfos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

}