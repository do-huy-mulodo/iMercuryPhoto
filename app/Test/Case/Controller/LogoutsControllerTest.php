<?php

class LogoutsControllerTest extends ControllerTestCase {

	public function testIndexPostData() {

		//Case normal,send valid argument
		$data = array(

				'id' => '1',
				'token' => '444'

			);

		//Case error,send invalid argument
		$data = array(

				'id' => 'sd',
				'token' => '444'

			);
		//Case error,send wrong token
		$data = array(

				'id' => '1',
				'token' => 'sdfsd'

			);
		$this->testAction(
			'/logouts/index',
			array('data' => $data, 'method' => 'post','return' => 'contents')
			);
		//debug($result);
	}
}
?>