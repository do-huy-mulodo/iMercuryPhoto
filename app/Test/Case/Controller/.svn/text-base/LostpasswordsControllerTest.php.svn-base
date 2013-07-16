<?php
App::uses('LostpasswordsController', 'Controller');

class LostpasswordsControllerTest extends ControllerTestCase {
	//public $fixtures = array('app.login');

	public function setUp() {
		parent::setUp();
		$LostpasswordsController = new LostpasswordsController();
	}

	public function testIndexInDataOK() {
		$data = array('email' => 'lai.huy.thinh@gmail.com',
		);

		$result = $this->testAction(
				'/lostpasswords/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
// 	public function testIndexInDataNotExist() {
// 		$data = array('email' => 'ahgdwhgdhawgdjh@gmail.com',
// 		);
	
// 		$result = $this->testAction(
// 				'/lostpasswords/index',
// 				array('data' => $data, 'method' => 'post')
// 		);
// 		debug($result);
// 	}
	
// 	public function testIndexInDataInvalid() {
// 		$data = array('email' => 'adwadwdahgdhawgdh',
// 		);
	
// 		$result = $this->testAction(
// 				'/lostpasswords/index',
// 				array('data' => $data, 'method' => 'post')
// 		);
// 		debug($result);
// 	}
}