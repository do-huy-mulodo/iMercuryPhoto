<?php
require_once '../Utils/utils.php';
App::uses('AppController', 'Controller');
class LostpasswordsController extends AppController {

	public $uses = array('User');
	public $helpers = array ('Html','Form','Js');
	public $components = array('Session','RequestHandler','Email');

	function index(){
		$this->layout = null;

		$email = '';
		//get parameter
		if (isset($this->request->data['email'])){
			$email = $this->request->data['email'];
		}
			
		if ($email != ''){
			$data['email'] = $email;
			$error = $this->User->checkInputData($data);
			if(isset($error['email'])){
				$json = json_encode(Utils::initResponseData('402',$error_email['email'], null));
			} else {
				//check exist email
				$result = $this->User->checkEmailExist($email);
				if(isset($result)){
					$new_password = $this->rand_string(8);
					if ($new_password != '' ) {
						//save new password to DB
						$result_data = $this->User->getDataFromEmail($email);
						$data['id'] = $result_data['User']['id'];
						$data['password'] = $new_password;

						// Send mail
						
						$this->Email->from = 'IMERCURY PHOTO <nguyenkhoi1405@gmail.com>';
						$this->Email->to = $email;
						$this->Email->subject = 'Get your new password';
						$this->Email->smtpOptions = array(
								'host' => 'ssl://smtp.gmail.com',
								'port' => 465,
								'timeout' => 30,
								'username' => 'nguyenkhoi1405@gmail.com',
								'password' => 'ngnh00'
						);

						$this->Email->delivery = 'smtp';
						if($this->Email->Send($new_password)) {
							$this->User->updatePassword($data);
							$json = json_encode(Utils::initResponseData(CONSTANT_CODE_NORMAL,CONSTANT_MESSAGE_NORMAL,null));
						} else {
							$json = json_encode(Utils::initResponseData(CONSTANT_CODE_INTERNAL_SERVER_ERROR,CONSTANT_MESSAGE_INTERNAL_SERVER_ERROR,null));
						}
					} else {
						$json = json_encode(Utils::initResponseData(CONSTANT_CODE_INTERNAL_SERVER_ERROR,CONSTANT_MESSAGE_INTERNAL_SERVER_ERROR,null));
					}
		
				}else {
					$json = json_encode(Utils::initResponseData("400","EMAIL NOT EXIST",null));
				}
			}
		}else {
			$json = json_encode(Utils::initResponseData(CONSTANT_CODE_MISSING_MAIL_OR_PASSWORD,CONSTANT_MESSAGE_MISSING_MAIL_OR_PASSWORD,null));
		}
			
		echo $json;

	}

	function rand_string($length){
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$size = strlen($chars);
		$str = '';
		for ($i=0;$i<$length;$i++){
			$str .= $chars[rand(0, $size-1)];
		}
		return $str;
	}

}