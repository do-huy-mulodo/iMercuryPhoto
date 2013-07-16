<?php
/**
 *
 */
App::uses('ValidateData','Utils');
App::uses('AppController', 'Controller');
App::uses('Response','Model/Api');
class LogoutsController extends AppController
{
	var $uses = array("User");
	var $components = array("RequestHandler","Util");

	function index(){

		$data = $this->request->data;
		$error = ValidateData::validate($data,'logouts');
		$_data = null;
		if($error->status == '200'){
			$_data = $this->User->logOut($data,$error);
		}
		debug($data);
		$response = new Response($error, $_data);
		echo $response->toJSON();
	}
}
?>
