<?php
App::uses('GetPhotoInfosController', 'Controller');

class GetPhotoInfosControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$GetPhotoInfosController = new GetPhotoInfosController();
	}

	public function testIndexInDataOK() {
		$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>3
		);

		$result = $this->testAction(
				'/getphotoinfos/index',
				array('data' => $data, 'method' => 'post', 'return'=> 'contents')
		);
		debug($result);
	}

	public function testIndexInDataNotExist() {
		$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>2
		);

		$result = $this->testAction(
				'/getphotoinfos/index',
				array('data' => $data, 'method' => 'post','return'=> 'contents')
		);
		debug($result);
	}

		public function testIndexInDataInvalid() {
			$data = array('id' => 1, 'token'=>'a7447c51c15cd8d6ff6c7b72d4cef866d2d29295','photo_id'=>20
			);

			$result = $this->testAction(
					'/getphotoinfos/index',
					array('data' => $data, 'method' => 'post')
			);
			debug($result);
		}
}