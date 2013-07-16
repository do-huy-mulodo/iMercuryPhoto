<?php
App::uses('User', 'Model');

class UserTest extends CakeTestCase {
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	/**
	 * Test function checkLogin OK
	 */
	public function testCheckLoginOK() {
		$result = $this->User->checkLogin('lai.thinh@mulodo.com', '12345678');
		debug($result);
		// Login success
		$expected = array('User' => array('id' => '1','email' => 'lai.thinh@mulodo.com','username' => 'Huy Thinh','token' => 'fa23fd259aed3306efdaed12816e7a62ac345d8e'));

		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function checkLogin NG
	 */
	public function testCheckLoginNG() {
		$result = $this->User->checkLogin('lai.thinh@mulodo.com', '');
		debug($result);
		// Login fail
		$expected = array();
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function getDataFromEmail OK
	 */
	public function testGetDataFromEmailOK() {
		$result = $this->User->getDataFromEmail('lai.thinh@mulodo.com');
		debug($result);
		// Get data success
		$expected = array('User' => array('id' => '1'));
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function getDataFromEmail NG
	 */
	public function testGetDataFromEmailNG() {
		$result = $this->User->getDataFromEmail('foo@mulodo.com');
		debug($result);
		// Get data fail
		$expected = array();
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function createToken OK
	 */
	public function testCreateTokenOK() {
		$result = $this->User->createToken('2','abcdefghijklmnopqrstvuwxyz');
		debug($result);
		
		// Check token after update
		$result_token = $this->User->checkToken('2','abcdefghijklmnopqrstvuwxyz');
		debug($result_token);
		
		// Create token success
		$expected = null;
	
		$this->assertEquals($expected, $result_token);
	}
	
	/**
	 * Test function checkIdExist OK - ID is not exist
	 */
	public function testCheckIdExistOK() {
		$result = $this->User->checkIdExist('1000');
		debug($result);
		// Check ID success
		$expected = null;
		if(!isset($result['id'])){
			$result['id'] = null;
		}
		$this->assertEquals($expected, $result['id']);
	}
	/**
	 * Test function checkIdExist NG - ID is exist
	 */
	public function testCheckIdExistNG() {
		$result = $this->User->checkIdExist('1');
		debug($result);
		// Check ID fail
		$expected = CONSTANT_MESSAGE_ID_EXIST;
	
		$this->assertEquals($expected, $result['id']);
	}
	
	/**
	 * Test function checkEmailExist OK - Email is not exist
	 */
	public function testCheckEmailExistOK() {
		$result = $this->User->checkEmailExist('foo@mulodo.com');
		debug($result);
		// Check Email success
		$expected = null;
		if(!isset($result['email'])){
			$result['email'] = null;
		}
		$this->assertEquals($expected, $result['email']);
	}
	/**
	 * Test function checkEmailExist NG - Email is exist
	 */
	public function testCheckEmailExistNG() {
		$result = $this->User->checkEmailExist('lai.thinh@mulodo.com');
		debug($result);
		// Check Email fail
		$expected = CONSTANT_MESSAGE_MAIL_EXIST;
	
		$this->assertEquals($expected, $result['email']);
	}
	
	/**
	 * Test function checkToken OK - Token is not exist
	 */
	public function testCheckTokenOK() {
		$result = $this->User->checkToken('2','abcdefghijklmnopqrstvuwxyz');
		debug($result);
		// Check Token success
		$expected = null;
		if(!isset($result['token'])){
			$result['token'] = null;
		}
		$this->assertEquals($expected, $result['token']);
	}
	/**
	 * Test function checkToken NG - Token is exist
	 */
	public function testCheckTokenNG() {
		$result = $this->User->checkToken('2','abcdefghijklmnopqrsssstvuwxyzaaaftstf');
		debug($result);
		// Check Token fail
		$expected = CONSTANT_MESSAGE_TOKEN_NOT_MATCH;
	
		$this->assertEquals($expected, $result['token']);
	}
	
	/**
	 * Test function insertNewUser OK
	 */
	public function testInsertNewUserOK() {
		$data['email'] = 'boo@mulodo.com';
		$data['password'] = '25d55ad283aa400af464c76d713c07ad';
		$data['username'] = 'Boo';
		
		$result = $this->User->insertNewUser($data);
		debug($result);
		// Insert New User success
		if($result['User'] != null){
			$result_status = "OK";
		}else{
			$result_status = "NG";
		}
		$expected = "OK";

		$this->assertEquals($expected, $result_status);
	}
	
	/**
	 * Test function updatePassword OK
	 */
	public function testUpdatePasswordOK() {
		$data['id'] = '2';
		$data['password'] = '25d55ad283aa400af464c76d713c07ad';
	
		$result = $this->User->updatePassword($data);
		debug($result);
		// Update Password success
		if($result['User'] != null){
			$result_status = "OK";
		}else{
			$result_status = "NG";
		}
		$expected = "OK";
	
		$this->assertEquals($expected, $result_status);
	}
	
	/**
	 * Test function updateUsername OK
	 */
	public function testUpdateUsernameOK() {
		$data['id'] = '3';
		$data['username'] = 'Mr Boo';
	
		$result = $this->User->updateUsername($data);
		debug($result);
		// Update Username success
		if($result['User'] != null){
			$result_status = "OK";
		}else{
			$result_status = "NG";
		}
		$expected = "OK";
	
		$this->assertEquals($expected, $result_status);
	}
	
	/**
	 * Test function checkPassword OK
	 */
	public function testCheckPasswordOK() {
		$result = $this->User->checkPassword('1','12345678');
		debug($result);
		// Password is correct
		$expected = array('User' => array('id' => '1'));
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function checkPassword NG
	 */
	public function testCheckPasswordNG() {
		$result = $this->User->checkPassword('1','abcdefgh'); //Wrong password
		debug($result);
		// Password is not correct
		$expected = array();
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function getUserFromId OK
	 */
	public function testGetUserFromIdOK() {
		$result = $this->User->getUserFromId('1');
		debug($result);
		// GetUserFromId is success
		$expected = array('User' => array('id' => '1','email' => 'lai.thinh@mulodo.com','username' => 'Huy Thinh'));
	
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * Test function getUserFromId NG
	 */
	public function testGetUserFromIdNG() {
		$result = $this->User->getUserFromId('1234567'); //Wrong id
		debug($result);
		// GetUserFromId is fail
		$expected = array();
	
		$this->assertEquals($expected, $result);
	}
	
}