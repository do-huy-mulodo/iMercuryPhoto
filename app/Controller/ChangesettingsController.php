<?php
App::uses('AppController', 'Controller');
App::uses('ValidateData','Utils');
App::uses('Response','Model/Api');
class ChangesettingsController extends AppController {
	var $uses = array("User");
	var $components = array("RequestHandler");

	/**
	 * API change setting to response data from device
	 */
	function index() {
		// Get data from request
		$data = $this->request->data;
		// Validate data
		$error = ValidateData::validate($data,CHANGE_SETTING_API);
		$_data = null;
		// Check error
		if($error->status == STATUS_NORMAL){
			$_data = $this->User->changeSettingUser($data,$error);
		}
		// Init response by error and data
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}

}