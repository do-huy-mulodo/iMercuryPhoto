<?php

class LikesControllerTest extends ControllerTestCase {

	public function testIndexPostData() {

		//Case normal,send valid argument
		$data = array(

			'id' => '1',
			'token' => '444',
			'photo_id' => '3'

			);

		//Case error,send photo id not in database
		$data = array(

			'id' => '1',
			'token' => '444',
			'photo_id' => '2'

			);

		//Case error,send wrong token
		$data = array(

			'id' => '1',
			'token' => 'asfasc',
			'photo_id' => '2'

			);
		//Case error,send invalid argument
		$data = array(

			'id' => 'sd',
			'token' => 'asfasc',
			'photo_id' => '45'

			);


		$this->testAction(
			'/likes/index',
			array('data' => $data, 'method' => 'post','return' => 'contents')
			);
		//debug($result);
	}
}
?>