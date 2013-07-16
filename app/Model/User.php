<?php
App::uses('Response','Model/Api');
App::uses('Error','Model/Api');
class User extends AppModel{
	var $useTable = "user";
	var $name = "User";
	var $primaryKey = 'id';
	
	/**
	 * Handle register screen
	 * @param unknown $data
	 * @return string
	 */
	function registerUser($data,&$error){
		// Insert new user
		$_data = $this->insertNewUser($data);
		if($_data == null){
			// Error - Set status an
			$error->status= STATUS_INTERNAL_SERVER_ERROR;
			$error->message= MESSAGE_INTERNAL_SERVER_ERROR;
		}
		return $_data;
	}
	
	function checkLogin($email, $pass) {
		$result = $this->find("first", array('fields' => array('id','email','username','token','created_date','avatar'),'conditions' => array('email' => $email, 'password' => md5($pass))));
		return $result;
	}

	//get id from email
	function getDataFromEmail($email) {
		$data = $this->find("first", array('fields' => array('id'),'conditions' => array('email' => $email)));
		return $data;
			
	}

	// Update token for user when login
	function createToken($id,$token) {
		$this->id = $id;
		$this->set('token', $token);
		$this->set('edited_date', date("Y-m-d H:i:s"));
		if($this->save()){
			return true;
		}

		return false;
	}
	// check id is exist in DB
	function checkIdExist($id){
		$error = null;
		$data = $this->find("first", array('conditions' => array('id' => $id)));
		if($data != NULL){
			$error['id'] = CONSTANT_MESSAGE_ID_EXIST;
		}
		//$error['id'] = $data['User']['id'];
		return $error;
	}

	// Check email is exist in DB
	function checkEmailExist($email) {
		$error = null;
		$data = $this->find("first", array('conditions' => array('email' => $email)));
		if($data != NULL){
			return true;
		}
		return false;
	}

	// Check token of user is valid
	function checkToken($id,$token) {
		$error = null;
		$result = $this->find("count", array('conditions' => array('id' => $id, 'token' => $token)));
		if($result <= 0){
			return false;
		}
		return true;
	}

	// Insert new user when register
	function insertNewUser($user) {
		$data = $this->save(array(
				'email' => $user['email'],
				'password' => md5($user['password']),
				'username' => $user['username'],
				'created_date' => date("Y-m-d H:i:s"),
				'edited_date' => date("Y-m-d H:i:s"),
				'avatar' => '',
				'token' => ''
		));
		return $data;
	}

	// Update user when edit
	function updatePassword($user) {
		$data = $this->save(array(
				'id' => $user['id'],
				'password' => md5($user['password']),
				'edited_date' => date("Y-m-d H:i:s"),
		));

		return $data;
	}

	// Update user when edit
	function updateUsername($user) {
		if(isset($user['new_pwd']) && $user['new_pwd'] != ""){
			// Check have avatar
			if($user['avatar'] != ""){
				// Have avatar
				$data = $this->save(array(
						'id' => $user['id'],
						'username' => $user['username'],
						'password' => md5($user['new_pwd']),
						'avatar' => $user['avatar'],
						'edited_date' => date("Y-m-d H:i:s"),
				));
			}else{
				// not avatar
				$data = $this->save(array(
						'id' => $user['id'],
						'username' => $user['username'],
						'password' => md5($user['new_pwd']),
						'edited_date' => date("Y-m-d H:i:s"),
				));
			}

		}else{
			// Check have avatar
			if($user['avatar'] != ""){
				$data = $this->save(array(
						'id' => $user['id'],
						'username' => $user['username'],
						'avatar' => $user['avatar'],
						'edited_date' => date("Y-m-d H:i:s"),
				));
			}else{
				// not avatar
				$data = $this->save(array(
						'id' => $user['id'],
						'username' => $user['username'],
						'edited_date' => date("Y-m-d H:i:s"),
				));
			}
		}
		return $data;
	}

	// Check validate data when insert or update
	function checkInputData($data){
		$error = null;
		if(!isset($data['email']) || (isset($data['email']) && trim($data['email']) == "")){
			$error['email'] = "Email is empty";
		}else{
			if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email']) == 0){
				$error['email'] = "Email is not valid";
			}
		}

		if(!isset($data['username']) ||  (isset($data['username']) && trim($data['username']) == "")){
			$error['username'] = "User name is empty";
		}

		if(!isset($data['password']) ||  (isset($data['password']) && trim($data['password']) == "")){
			$error['password'] = "Password is empty";
		}
		else{
			if(strlen($data['password']) < 8){
				$error['password'] = "Less 8 character";
			}
		}

		return $error;
	}

	// Check validate data when update information user
	function checkInputUpdateUser($data){
		$error = null;

		if(trim($data['token']) == ""){
			$error['token'] = "Token is empty";
		}

		if(trim($data['id']) == ""){
			$error['id'] = "Error id ";
		}

		if(trim($data['username']) == ""){
			$error['username'] = "Username is empty";

		}

		if(trim($data['old_pwd']) != ""){
			if(trim($data['new_pwd']) == ""){
				$error['new_pwd'] = "New password is empty";
			}else{
				if(strlen($data['new_pwd']) < 8){
					$error['new_pwd'] = "New password is less 8 character";
				}
			}
		}

		return $error;
	}

	// Check password is correct
	function checkPassword($id, $pass) {
		$result = $this->find("first", array('fields' => array('id'), 'conditions' => array('id' => $id, 'password' => md5($pass))));
		return $result;
	}

	// Get user from Id
	function getUserFromId($id){
		$data = $this->find("first", array('fields' => array('id','email','username'),'conditions' => array('id' => $id)));
		return $data;
	}
	
	// Get user from Id
	function getAvatarFromId($id){
		$data = $this->find("first", array('fields' => array('avatar'),'conditions' => array('id' => $id)));
		return $data;
	}

	//logout
	function logOut($data,&$error){
		$this->id=$data['id'];
		if(!$this->saveField('token',null)){
			$error->setValue('999','unknown error');
		}
		return null;
	}
}

?>