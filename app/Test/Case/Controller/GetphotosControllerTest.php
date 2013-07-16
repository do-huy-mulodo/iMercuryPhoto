<?php

class GetphotosControllerTest extends ControllerTestCase{
	public function testIndexPostData() {

		//Case normal,send valid argument
		$data = array(

			'id' => '1',
			'token' => '444',
			'count' => '20',
			'type'  => 'excluded',
			'id_need' => '1'

			);

		//Case normal,send only 3 argument
		$data = array(
			
			'id' => '1',
			'token' => '444',
			'count' => '20',
			'id_need' => '1'

			);

		//Case error,send wrong token
		$data = array(

			'id' => '1',
			'token' => 'adfasd',
			'count' => '20',
			'id_need' => '1'

			);

		//Case error,send invalid argument
		$data = array(

			'id' => '1',
			'token' => 'adfasd',
			'count' => 'fd',
			'id_need' => '1'

			);

		$this->testAction(
			'/getphotos/index',
			array('data' => $data, 'method' => 'post','return' => 'contents')
			);
		//debug($result);
	}
} 
?>