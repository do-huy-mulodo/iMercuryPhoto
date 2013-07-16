<?php
App::uses('ValidateData','Utils');
App::uses('Response','Model/Api');
App::uses('AppController', 'Controller');
class UploadphotosController extends AppController {
	var $uses = array("Photo");
	var $components = array("RequestHandler");

	/**
	 * API change setting to response data from device
	 */
	function index() {
		// Get data from request
		$data = $this->request->data;
		// Validate data
		$error = ValidateData::validate($data,UPLOAD_PHOTO_API);
		$_data = null;
		// Check error
		if($error->status == STATUS_NORMAL){
			$_data = $this->Photo->uploadPhoto($data,$error);
		}
		// Init response by error and data
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}
}
?>
