<?php
require_once '../Utils/utils.php';
App::uses('AppController', 'Controller');
class LoginsController extends AppController {

	public $uses = array('User');
	public $helpers = array ('Html','Form','Js');
	public $components = array('Session','RequestHandler');


	function index(){

		$this -> layout = null;

		//if ($this->request->is('post')){
		$email = '';
		$password = '';
			
			
		if (isset($this -> request->data['email'])){
			$email = $this -> request->data['email'];
		}
		if (isset($this -> request->data['password'])){
			$password = $this -> request->data['password'];
				
		}

		if($email != "" &&  $password != "") {
			// remove white space
			$email = trim($email);
			$password = trim($password);
				
			// check account login
			$result =  $this->User->checkLogin($email,$password);

			if($result != null){
				//Success
				// Check token is null or not
				if($result['User']['token'] == ""){
					// Create new token
					$hash=sha1($email.rand(0,100)); // Hask token
					//Update new token to DB
					$this->User->createToken($result['User']['id'],$hash);
				}else{
					// Token is exist - Use this token to check authorized
					$hash = $result['User']['token']; // Genarate new token
				}
						
				$json = Utils::initResponseData(CONSTANT_CODE_NORMAL, CONSTANT_MESSAGE_NORMAL,array('token'=>$hash,'user_id'=>$result['User']['id'],'email'=>$result['User']['email'],'username'=>$result['User']['username'],'created_date'=>$result['User']['created_date'],'avatar'=>$result['User']['avatar']));
				$result_json = json_encode($json);
				echo $result_json;
			} else {
				//$json = json_encode(array('response'=> array('error'=> array('status'=>'402','message'=>'invalid username or password'))));
				$json = Utils::initResponseData(CONSTANT_CODE_INVALID_ARGUMENT, CONSTANT_MESSAGE_INVALID_ARGUMENT, null);
				$result_json = json_encode($json);
				echo $result_json;
			}
				
		} else {
			$json = Utils::initResponseData(CONSTANT_CODE_MISSING_MAIL_OR_PASSWORD, CONSTANT_MESSAGE_MISSING_MAIL_OR_PASSWORD, null);
			$result_json = json_encode($json);
			echo $result_json;
		}
		//echo $result_json;
		//}
	}
}

