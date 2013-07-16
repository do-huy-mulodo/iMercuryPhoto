<?php
App::uses('UploadPhotosController', 'Controller');

class UploadPhotosControllerTest extends ControllerTestCase {

	public function setUp() {
		parent::setUp();
		$UploadPhotosController = new UploadPhotosController();
	}

	/**
	 * Test action "index" - success
	 */
	public function testIndexSuccess() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'comment' => 'Nice Picture',
				'image' => array('name' => 'button_appstore.png','tmp_name' =>'/button_appstore.png'),
		);

		$result = $this->testAction(
				'/uploadPhotos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" -  invalid argument
	 */
	public function testIndexInvalidArgument() {
		$data = array('id' => '1',
				'token' => '',
				'comment' => 'Nice Picture',
				'image' => array('name' => 'button_appstore.png','tmp_name' =>'/button_appstore.png'),
		);

		$result = $this->testAction(
				'/uploadPhotos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	/**
	 * Test action "index" -  not input image
	 */
	public function testIndexNotInputImage() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'comment' => 'Nice Picture',
		);
	
		$result = $this->testAction(
				'/uploadPhotos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

	/**
	 * Test action "index" - token is not match
	 */
	public function testIndexTokenNotMatch() {
		$data = array('id' => '1',
				'token' => 'wrongtoken',
				'comment' => 'Nice Picture',
				'image' => array('name' => 'button_appstore.png','tmp_name' =>'/button_appstore.png'),
		);

		$result = $this->testAction(
				'/uploadPhotos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}
	
	/**
	 * Test action "index" - File extension of image is not valid
	 */
	public function testIndexWrongExtension() {
		$data = array('id' => '1',
				'token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e',
				'comment' => 'Nice Picture',
				'image' => array('name' => 'button_appstore.apk','tmp_name' =>'/button_appstore.apk'),
		);
	
		$result = $this->testAction(
				'/uploadPhotos/index',
				array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

}