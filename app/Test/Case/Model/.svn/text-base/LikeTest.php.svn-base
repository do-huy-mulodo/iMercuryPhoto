<?php
App::uses('Like', 'Model');
class LikeTest extends CakeTestCase{
	public function setUp() {
		parent::setUp();
		$this->Like = ClassRegistry::init('Like');
	}

	/**
	 * Test function checkExists
	 */
	public function testcheckExists() {
		$result = $this->Like->checkExists(1,4);
		debug($result);
		// Login success
		$expected = true;

		$this->assertEquals($expected, $result);
	}

	/**
	 * Test function getLikeID
	 */
	public function testgetLikeID() {
		$result = $this->Like->getLikeID(1,4);
		debug($result);
		// Login success
		$expected = 5;

		$this->assertEquals($expected, $result);
	}

	/**
	 * Test function getDataFromPhotoId
	 */
	public function testgetDataFromPhotoId() {
		$result = $this->Like->getDataFromPhotoId(4);
		debug($result);
		// Login success
		$expected = array(0 => array('Like' => array('id' => '5','user_id' => '1','photo_id' => '4','liked_date' => '2013-06-13 14:06:01')));

		$this->assertEquals($expected, $result);
	}
}
?>