<?php
/**
 * Class Response object
 * @author laihuythinh
 *
 */
class Response
{
	public $error = null;
	public $data = null;

	/**
	 * Init Response object
	 * @param unknown $_error
	 * @param unknown $_data
	 */
	function Response($_error,$_data){
		$this->error = $_error;
		$this->data = $_data;
	}
	
	public function expose() {
		return get_object_vars($this);
	}
	
	/**
	 * Output json string
	 * @return string
	 */
	public function toJSON(){
		$json = array('response' => $this->expose());
		return json_encode($json);
	}
}