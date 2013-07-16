<?php

class Photo extends AppModel
{
	var $useTable = "photo";
	var $name = "Photo";
	var $primaryKey = 'id';
	

	// Check validate data when update information user
	function checkDataUploadPhoto($data){
		$error = null;

		if(trim($data['id']) == ""){
			$error['id'] = "Id is empty";
		}

		if(trim($data['token']) == ""){
			$error['token'] = "Token is empty";
		}

		return $error;
	}

	// Insert new photo to DB
	function insertNewPhoto($data){
		$data = $this->save(array(
				'comment' => $data['comment'],
				'photo_path' => $data['photo_path'],
				'user_id' => $data['id'],
				'upload_date' => date("Y-m-d H:i:s"),
				'thumnail_path' => $data['thumnail_path']
		));
		return $data;
	}

	// check id exist inDB
	function checkPhotoIdExist($id){
		$error = null;
		$data = $this->find("first", array('conditions' => array('id' => $id)));
		if($data != NULL){
			return true;
		}
		return false;
	}

	// get photo info
	function getPhotoInfo($id, $userId){
		$sql = "SELECT photo.id as id, photo.comment as comment, photo.photo_path as photo_path, photo.user_id as user_id, user.username as username,user.avatar as avatar, photo.upload_date as upload_date, photo.total_like as total_like, (SELECT count(`like`.id) FROM `like` WHERE `like`.user_id = ".$userId." and `like`.photo_id =  ".$id.")  as isLiked FROM photo LEFT JOIN user on photo.user_id = user.id WHERE photo.id =".$id;
		//$data = $this->find('first', array('conditions'=> array('id'=> $id)));
		$data = $this->query($sql);
		return $data;
	}
	
	//get user like
	function getLikedUser($photo_id){
		$query_sql = "SELECT `user`.id as user_id,`user`.email as email,`user`.username as username, `like`.liked_date as liked_date from `like` LEFT JOIN `user` on `like`.user_id = `user`.id where `like`.photo_id = ".$photo_id;
		$data = $this->query($query_sql);
		return  $data;
	}

	function updateTotalLike($photo_id,$type){
		$param = array(
			'conditions' => array('Photo.id'=>$photo_id)
			);
		$photo = $this->find('first',$param);
		$like = (int)$photo['Photo']['total_like'];
		if($type == 'like'){
			$like++;
		}
		else if($type == 'unlike'){
			$like--;
		}
		$this->id = $photo_id;
		$this->saveField('total_like',$like);
		//debug($like);
	}

	function getPhotoList($data,&$error){
		$id_need = $data['id_need'];
		$type = $data['type'];
		$count = $data['count'];
		$offset = $data['offset'];

		return $this->_getphoto($id_need,$count,$type,$offset);

	}
	
	function _getSum($id_need){
		$param = array(
				'conditions' => array('Photo.user_id'=>$id_need),
		);
		return $this->find('count', $param);
	}

	function _getphoto($id_need,$count,$type,$offset){
		switch ($type) {
			case 'user':
				{
					$param = array(
							'fields' => array('Photo.id','Photo.comment','Photo.photo_path','Photo.user_id','Photo.upload_date','Photo.total_like','Photo.thumnail_path'),
							'conditions' => array('Photo.user_id'=>$id_need),
							'order' => array('Photo.upload_date DESC'),
							'limit' => $count,
							'offset' => $offset
					);

				}
				break;
			case 'excluded':
				{
					$param = array(
							'fields' => array('Photo.id','Photo.comment','Photo.photo_path','Photo.user_id','Photo.upload_date','Photo.total_like','Photo.thumnail_path'),
							'conditions' => array('Photo.user_id !='=>$id_need),
							'order' => array('Photo.upload_date DESC'),
							'limit' => $count,
							'offset' => $offset
					);
				}
				break;
			case 'mixed':
				{
					$param = array(
							'order' => array('Photo.upload_date DESC'),
							'limit' => $count
					);
				}
				break;
		}

		$result = $this->find('all',$param);

		if($type == 'user'){
			$sum = array('sum' => $this->_getSum($id_need));
			$result = array('photo_list' => $result,'sum' => $sum['sum']);
		}
		
		return $result;
	}
}

?>