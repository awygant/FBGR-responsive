<?php
$partner_username = "anna";
$partner_apikey = "N68NiThCGapPK0YCceYloq5Ua2jUdzQS";
$api_base_url = "http://www.flashfotoapi.com/api/";

define('ROOT_DIRECTORY', '/');
//define('ROOT_DIRECTORY', '/~Anna/2015FBGR/');
global $server_name, $auth_callback_url; // used in fotam-test.php and for navigation logout button
$server_name = 'http://'.$_SERVER['HTTP_HOST'].ROOT_DIRECTORY;
$base_url = $server_name; //need to consolidate this
$auth_callback_url = $server_name . 'flashfoto/fotam-auth/fotam-test.php';

/***** FOTAM LOGIN SETTINGS ******/
global $login_base_url;
/*** PRODUCTION ***/
$login_base_url = 'http://www.fotam.com';
/*** DEV ***/
//$login_base_url = 'http://staging.onzra.com/FlashFoto/AuthModule/trunk';
//$login_base_url = 'http://flashfoto-staging-authmodule-1.hollywood.onzra.com';

global $fotam_request_token_url, $fotam_login_url, $fotam_access_token_url, $fotam_info_url, $fotam_logout_url, $fotam_settings_url;
$fotam_request_token_url = $login_base_url.'/users/request_token';
$fotam_login_url = $login_base_url.'/users/login';
$fotam_access_token_url = $login_base_url.'/users/access_token';
$fotam_info_url = $login_base_url.'/users/api_info';
$fotam_logout_url = $login_base_url.'/users/logout?callback_url='.$server_name.'logout.php';
$fotam_settings_url = $login_base_url.'/users/settings';
//echo 'Config:'.$GLOBALS['fotam_request_token_url'].'<br>'.$GLOBALS['fotam_login_url'].'<br>'.$GLOBALS['fotam_access_token_url'].'<br>'.$GLOBALS['fotam_info_url'].'<br>'.$GLOBALS['auth_callback_url'];

global $admins;
$admins = array(65,89,101); //these are staging.onzra.com ID's
$admins = array(1,4); //these are login.fotam.com ID's

/***** END FOTAM LOGIN SETTINGS ******/

?>
