<?php
App::uses('Error','Model/Api');
App::uses('User', 'Model');
class ValidateData {
	/**
	 * Validate data from Controller
	 * @param unknown $_data
	 * @param unknown $_controller
	 * @return Ambigous <Error, NULL>
	 */
	public static function validate(&$_data,$_controller){
		// Check controller name
		switch ($_controller) {
			case LOGIN_API:
				break;
			case REGISTER_API:
				return ValidateData::validateRegister($_data);
				break;
			case LOST_PASS_API:
				break;
			case CHANGE_SETTING_API:
				break;
			case GET_LIKED_USER_API:
				break;
			case GET_PHOTO_INFO_API:
				break;
			case GET_PHOTO_API:
				return ValidateData::validateGetPhotos($_data);
				break;
			case GET_USER_INFO_API:
				break;
			case LIKE_API:
				return ValidateData::validateLikes($_data);
				break;
			case LOGOUT_API:
				return ValidateData::validateLogouts($_data);
				break;
			case UPLOAD_PHOTO_API:
				break;
		}
	}
	
	/**
	 * Validate params before register new account
	 * @param unknown $data
	 * @return Error|NULL
	 */
	public static function validateRegister($_data){
		// Validate email
		if(ValidateData::validateEmail($_data)){
			return ValidateData::validateEmail($_data);
		}
		
		// Validate password
		if(ValidateData::validatePassword($_data)){
			return ValidateData::validatePassword($_data);
		}
		
		// Validate username
		if(ValidateData::validateUsername($_data)){
			return ValidateData::validateUsername($_data);
		}

		// Validate 
		if(ValidateData::validateEmailIsExist($_data)){
			return ValidateData::validateEmailIsExist($_data);
		}
		
		// No error
		$error = new Error('200', '');
		return $error;
	}

	public static function validateLogouts($_data){

		// Validate token
		if(ValidateData::validateToken($_data)){
			return ValidateData::validateToken($_data);
		}
		
		// No error
		$error = new Error('200', '');
		return $error;
	}

	public static function validateLikes($_data){

		// Validate Token
		if(ValidateData::validateToken($_data)){
			return ValidateData::validateToken($_data);
		}

		// Validate photo ID
		if(ValidateData::validatePhotoID($_data)){
			return ValidateData::validatePhotoID($_data);
		}
		
		// No error
		$error = new Error('200', '');
		return $error;
	}

	public static function validateGetPhotos(&$_data){

		// Validate Token
		if(ValidateData::validateToken($_data)){
			return ValidateData::validateToken($_data);
		}

		// Validate ID needed
		if(ValidateData::validateIDNeed($_data)){
			return ValidateData::validateIDNeed($_data);
		}

		// Validate Count
		if(ValidateData::validateCount($_data)){
			return ValidateData::validateCount($_data);
		}

		// Validate Type
		if(ValidateData::validateType($_data)){
			return ValidateData::validateType($_data);
		}
		
		// No error
		$error = new Error('200', '');
		return $error;
	}
	

	/**
	 * Validate Email
	 * @param unknown $data
	 * @return Error|NULL
	 */
	public static function validateEmail($data){
		if(!isset($data['email']) || (isset($data['email']) && trim($data['email']) == "")){
			$result = new Error('304', 'Email is empty');
			return $result;
		}else{
			if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $data['email']) == 0){
				$result = new Error('304', 'Email is not valid');
				return $result;
			}
		}
		return null;
	}
	
	/**
	 * Validate Password
	 * @param unknown $data
	 * @return Error|NULL
	 */
	public static function validatePassword($data){
		if(!isset($data['password']) ||  (isset($data['password']) && trim($data['password']) == "")){
			$result = new Error('304', 'Password is empty');
			return $result;
		}
		else{
			if(strlen($data['password']) < 8){
				$result = new Error('304', 'Less 8 character');
				return $result;
			}
		}
		return null;
	}
	
	/**
	 * Validate Username
	 * @param unknown $data
	 * @return Error|NULL
	 */
	public static function validateUsername($data){
		if(!isset($data['username']) ||  (isset($data['username']) && trim($data['username']) == "")){
			$result = new Error('304', 'User name is empty');
			return $result;	
		}
		return null;
	}
	
	/**
	 * Validate Email Is In DB
	 * @param unknown $data
	 * @return Error|NULL
	 */
	public static function validateEmailIsExist($data){
		$error_email = ClassRegistry::init('User')->checkEmailExist($data['email']) ;
		if($error_email == true){
			$result = new Error('401', 'EMAIL IS EXIST');
			return $result;
		}
 		return null;
	}

	public static function validateToken($data){
		if(!isset($data['id']) || !isset($data['token'])){
			$result = new Error('304', 'Missing Arguments');
			return $result;	
		}
		if(!is_numeric($data['id'])){
			$result = new Error('304', 'ID must be numeric');
			return $result;	
		}
		if(ClassRegistry::init('User')->checkToken($data['id'],$data['token']) == false){
			$result = new Error('402', 'Token is not match');
			return $result;
		}
 		return null;
	}

	public static function validatePhotoID($data){
		if(!isset($data['photo_id'])){
			$result = new Error('304', 'Missing Arguments');
			return $result;	
		}
		if(!is_numeric($data['photo_id'])){
			$result = new Error('304', 'Photo ID must be numeric');
			return $result;	
		}
 		return null;
	}

	public static function validateIDNeed($data){
		if(!isset($data['id_need'])){
			$result = new Error('304', 'Missing Arguments');
			return $result;	
		}
		if(!is_numeric($data['id_need'])){
			$result = new Error('304', 'ID Need must be numeric');
			return $result;	
		}
 		return null;
	}

	public static function validateCount($data){
		if(!isset($data['count'])){
			$result = new Error('304', 'Missing Arguments');
			return $result;	
		}
		if(!is_numeric($data['count'])){
			$result = new Error('304', 'Count must be numeric');
			return $result;	
		}
 		return null;
	}

	public static function validateType(&$data){
		$type_list=array('user','excluded','mixed');

		if(!isset($data['type'])){
			$replacement = array('type' => 'user');
			$data = array_replace($data, $replacement);
		}
		else if(!in_array($data['type'], $type_list)){
			$result = new Error('304', 'Invalid type');
			return $result;
		}

 		return null;
	}

	public static function validateOffset($data){
		if(!isset($data['offset'])){
			$result = new Error('304', 'Missing Arguments');
			return $result;	
		}
		if(!is_numeric($data['offset'])){
			$result = new Error('304', 'Offset must be numeric');
			return $result;	
		}
 		return null;
	}
	
	
	
}