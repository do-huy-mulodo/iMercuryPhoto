<?php
/*
 *
*/
require_once '../Utils/utils.php';
App::uses('AppController', 'Controller');
class GetphotoinfosController extends AppController {
	public $uses =  array('User','Photo','Like');
	public $helpers = array ('Html','Form','Js');
	public $components = array('Session','RequestHandler');

	function index(){
		$this->layout = null;

		$id = "";
		$token = "";
		$photo_id = "";
			
		// check miss parameter
		if (isset($this->request->data['photo_id'],$this->request->data['id'],$this->request->data['token'])){
			$photo_id = $this->request->data['photo_id'];
			$id = $this->request->data['id'];
			$token = $this->request->data['token'];
		}
			
		//check token, id = ''
		if ($token != "" && $id != "" && $photo_id != "") {
				
			//check token in DB
			$result_token= $this->User->checkToken($id,$token);
				
				
			if (!isset($result_token['token'])){
					
				//check id is numberic
				if (is_numeric($id) && (is_numeric($photo_id))){
					$data = $this->Photo->getPhotoInfo($photo_id, $id);
					if ($data != null){
						$json = json_encode(Utils::initResponseData(CONSTANT_CODE_NORMAL,CONSTANT_MESSAGE_NORMAL,$data));
					} else {
						$json = $json = json_encode(Utils::initResponseData(CONSTANT_CODE_INVALID_ID,CONSTANT_MESSAGE_INVALID_ID,null));
					}
						
				} else {
					$json = json_encode(Utils::initResponseData(CONSTANT_CODE_INVALID_ID,CONSTANT_MESSAGE_INVALID_ID,null));
				}
			}else {
				$json = json_encode(Utils::initResponseData('400',$result_token['token'],null));
			}
		}else {
			$json = json_encode(Utils::initResponseData(CONSTANT_CODE_TOKEN_OR_ID_OR_PHOTOID_MISSING,CONSTANT_MESSAGE_TOKEN_OR_ID_OR_PHOTOID_MISSING,null));
		}
		echo $json;

	}

}