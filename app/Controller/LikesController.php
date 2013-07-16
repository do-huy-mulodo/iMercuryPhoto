<?php
/**
 *
 */
require_once '../Utils/utils.php';
App::uses('AppController', 'Controller');
App::uses('ValidateData','Utils');
App::uses('Response','Model/Api');

class LikesController extends AppController
{
	var $uses = array("User","Photo","Like");
	var $components = array("RequestHandler");

	function index(){

		$data = $this->request->query;
		debug($data);
		$error = ValidateData::validate($data,'likes');
		$_data = null;
		if($error->status == '200'){
			$_data = $this->Like->likePhoto($data,$error);
		}
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}
}
?>