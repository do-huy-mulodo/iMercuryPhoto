<?php

/**
 * Class Error
 * @author laihuythinh
 *
 */
class Error
{
	public $status = '200';
	public $message = '';	
	

	public function setValue($_status,$_message){
		$this->status = $_status;
		$this->message = $_message;
	}

	public function setStatus($_status){
		$this->status = $_status;
	}

	public function setMessage($_message){
		$this->message = $_message;
	}
	
	/**
	 * Init Error object
	 * @param unknown $_status
	 * @param unknown $_message
	 */
	function Error($_status,$_message) {
        $this->status = $_status;
        $this->message = $_message;
    }
}