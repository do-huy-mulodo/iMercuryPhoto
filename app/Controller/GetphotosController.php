<?php
/**
 *
 */
require_once '../Utils/utils.php';
App::uses('AppController', 'Controller');
App::uses('ValidateData','Utils');
App::uses('Response','Model/Api');
class GetphotosController extends AppController
{
	var $uses = array("User","Photo");
	var $components = array("RequestHandler");

	function index(){

		$data = $this->request->data;
		$error = ValidateData::validate($data,GET_PHOTO_API);
		$_data = null;
		if($error->status == '200'){
			$_data = $this->Photo->getPhotoList($data,$error);
		}
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}
}
?>