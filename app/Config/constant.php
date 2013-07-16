<?php

/**
 * STATUS CODE AND MESSEAGE ERROR
 * 
 * @var unknown
 */
define('STATUS_NORMAL', '200');
define('MESSAGE_NORMAL', '');

define('STATUS_INVALID_ARGUMENT', '304');
define('MESSAGE_INVALID_ARGUMENT', 'Invalid argument');
define('MESSAGE_INVALID_NEW_PASSWORD', 'Invalid new password');
define('MESSAGE_INVALID_PASSWORD', 'Invalid password');
define('MESSAGE_INVALID_EMAIL', 'Invalid email');
define('MESSAGE_INVALID_ID', 'ID must be numeric');

define('STATUS_MISSING_ARGUMENT', '305');
define('MESSAGE_MISSING_ARGUMENT', 'Missing argument');
define('MESSAGE_MISSING_NEW_PASSWORD', 'Missing new password');
define('MESSAGE_MISSING_PASSWORD', 'Missing password');
define('MESSAGE_MISSING_EMAIL', 'Missing email');


define('STATUS_INTERNAL_SERVER_ERROR', '500');
define('MESSAGE_INTERNAL_SERVER_ERROR', 'Internal server error');

define('STATUS_MAIL_EXIST', '401');
define('MESSAGE_MAIL_EXIST', 'Email is exist');

define('STATUS_EMAIL_IS_NOT_EXIST', '403');
define('MESSAGE_EMAIL_IS_NOT_EXIST', 'Email is not exist');
define('MESSAGE_USER_IS_NOT_EXIST', 'User is not exist');


define('STATUS_TOKEN_NOT_MATCH', '402');
define('MESSAGE_TOKEN_NOT_MATCH', 'Token is not match');


define('STATUS_WRONG_OLD_PASSWORD', '403');
define('MESSAGE_WRONG_OLD_PASSWORD', 'Old password is wrong');

define('STATUS_NOT_INPUT_FILE', '403');
define('MESSAGE_NOT_INPUT_FILE', 'Not input file');

define('STATUS_NOT_VALID_EXTENSION', '404');
define('MESSAGE_NOT_VALID_EXTENSION', 'File is not image type');

define('REGISTER_API', 'registers');
define('LOGIN_API', 'logins');
define('LOST_PASS_API', 'lostpasswords');
define('LOGOUT_API', 'logouts');
define('CHANGE_SETTING_API', 'changesettings');
define('GET_LIKED_USER_API', 'getlikedusers');
define('GET_PHOTO_INFO_API', 'getphotoinfos');
define('GET_PHOTO_API', 'getphotos');
define('GET_USER_INFO_API', 'getuserinfos');
define('LIKE_API', 'likes');
define('UPLOAD_PHOTO_API', 'uploadphotos');






