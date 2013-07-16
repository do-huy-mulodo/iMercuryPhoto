<?php
App::uses('Photo', 'Model');

class PhotoTest extends CakeTestCase {
	public function setUp() {
		parent::setUp();
		$this->Photo = ClassRegistry::init('Photo');
	}
	
	/*
	 * test function checkDataUploadPhoto
	 */
	 public function testCheckDataUploadPhotoOK() {
		$result = $this->Photo->checkDataUploadPhoto(1,'cd25ec73fafbbb603fe30d22ccbbb0e3949dab4a');
		debug($result);
		//Upload successful
		$expected = array('id'=>'Id is empty','token'=>'Token is empty');
		
		$this->assertEqual($result, $expected);
	}
	
	/*
	 * test function insertNewPhoto
	 */
	public function testInsertNewPhotoOK() {
		$data = array('comment'=>'test comment blad blad....', 'photo_path'=>'shdfsfkjsfjksgfhgsdfsdfgsjdfgjsg','id'=> 2,'upload_date'=> date('Y/m/d H:i:s'));
		
		$result = $this->Photo->insertNewPhoto($data);
		debug($result);
		// Insert New User success
		if($result['Photo'] != null){
			$result_status = "OK";
		}else{
			$result_status = "NG";
		}
		$expected = "OK";
		
		$this->assertEqual($result_status,$expected);
		
	}
	
	/*
	 * test function checkPhotoIdExist
	 */
	public function testCheckPhotoIdExist (){
		$id = 3;
		$result = $this->Photo->checkPhotoIdExist($id);
		debug($result);
		if ($result != null){
			$result_status = "OK";
		} else {
			$result_status = "NG";
		}
		$expected = "OK";
		$this->assertEqual($result_status, $expected);
	}
	
	/*
	 * test function getPhotoInfo
	 */
	public function testGetPhotoInfo(){
		$id = 3;
		//$sql = "select * from photo where id = 3";
		//$result_sql = $this->Photo->query($sql);
		//debug($result_sql);
		$result = $this->Photo->getPhotoInfo($id);
		debug($result);
		if ($result != null){
			$result_status = "OK";
		}else {
			$result_status = 'NG';
		}
		$expected = 'OK';
		$this->assertEqual($result_status, $expected);
	}
}