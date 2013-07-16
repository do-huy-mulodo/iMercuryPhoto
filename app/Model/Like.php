<?php

class Like extends AppModel
{
	var $useTable = "like";
	var $name = "Like";

	function likePhoto($data,&$error){
		$user_id=$data['id'];
		$photo_id=$data['photo_id'];
		
		if(ClassRegistry::init('Photo')->checkPhotoIdExist($photo_id) == false){
			$error->setValue('402', 'Photo not found');
			return null;
		}

		$data_array = array(
			'user_id' => $user_id,
			'photo_id' => $photo_id,
			'error' => $error
			);
		if($this->checkExists($user_id,$photo_id)){
			$this->_setUnlike($data_array);
		}
		else{
			$this->_setLike($data_array);
		}
	}

	function _setUnlike($data_array){
		$user_id = $data_array['user_id'];
		$photo_id = $data_array['photo_id'];
		$error = $data_array['error'];

		if($this->delete($this->getLikeID($user_id,$photo_id))){
			ClassRegistry::init('Photo')->updateTotalLike($photo_id,'unlike');
			$error->setMessage('Normal unlike');
		}
	}

	function _setLike($data_array){
		$user_id = $data_array['user_id'];
		$photo_id = $data_array['photo_id'];
		$error = $data_array['error'];

		$this->create();
		$newdata = array(
			'Like'=>array(
				'user_id'=>$user_id,
				'photo_id'=>$photo_id,
				'liked_date'=>date("Y-m-d H:i:s")
				),
			);
		if($this->save($newdata)){
			ClassRegistry::init('Photo')->updateTotalLike($photo_id,'like');
			$error->setMessage('Normal like');
		}		
	}

	function checkExists($user_id,$photo_id) {
		$this->user_id=$user_id;
		$this->photo_id=$photo_id;
		$param = array(
			'conditions' => array(
				'Like.user_id'=>$user_id,
				'Like.photo_id'=>$photo_id
				)
			);
		if($this->find('count',$param)>0){
			return true;
		}
		return false;
	}

	function getLikeID($user_id,$photo_id){
		$param = array(
			'conditions' => array(
				'Like.user_id'=>$user_id,
				'Like.photo_id'=>$photo_id
				)
			);
		$result=$this->find('first',$param);
		return $result['Like']['id'];
	}
	
	//get data from photo_id
	function getDataFromPhotoId($photo_id){
		$this->photo_id = $photo_id;
		$data = $this->find("all", array('conditions' => array('photo_id' => $photo_id)));
		return  $data;
	}

}

?>