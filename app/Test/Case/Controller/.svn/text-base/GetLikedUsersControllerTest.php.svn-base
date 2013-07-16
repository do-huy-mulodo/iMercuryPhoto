<?php
App::uses('GetLikedUsersController', 'Controller');

class GetLikedUsersControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$GetLikedUsersController = new GetLikedUsersController();
	}

		public function testIndexInDataOK() {
			$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>4
			);

			$result = $this->testAction(
					'/getlikedusers/index',
					array('data' => $data, 'method' => 'post', 'return'=> 'contents')
			);
			debug($result);
		}

	public function testIndexInDataNotExist() {
		$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>3
		);

		$result = $this->testAction(
				'/getlikedusers/index',
				array('data' => $data, 'method' => 'post','return'=> 'contents')
		);
		debug($result);
	}

		public function testIndexInDataInvalid() {
			$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>'ssb'
			);

			$result = $this->testAction(
					'/getlikedusers/index',
					array('data' => $data, 'method' => 'post')
			);
			debug($result);
		}
}