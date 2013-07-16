<?php
App::uses('AppController', 'Controller');
App::uses('ValidateData','Utils');
App::uses('Response','Model/Api');
class GetuserinfosController extends AppController {
	var $uses = array("User");
	var $components = array("RequestHandler");

	/**
	 * Get User info API
	 */
	function index() {
		// Get data from request
		$data = $this->request->data;
		// Validate data
		$error = ValidateData::validate($data,GET_USER_INFO_API);
		$_data = null;
		// Check error
		if($error->status == STATUS_NORMAL){
			$_data = $this->User->getUserInfo($data,$error);
		}
		// Init response by error and data
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}
}
?>