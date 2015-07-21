<?php
session_start();
include_once("../config.php");
include_once('../flashfoto.php');

if(empty($partner_username) || empty($partner_apikey) || empty($api_base_url)) {
    $err = 'Please configure your settings in config.inc.php';
}

if(isset($_POST["ffid"])){
    $ffid = $_POST["ffid"];
}

if(isset($_GET["ffid"])){
    $ffid = $_GET["ffid"];
}

if(!isset($ffid)){
    echo "No ffid received.";
    exit;
}

$FlashFotoAPI = new FlashFoto($partner_username, $partner_apikey, $api_base_url);
$iniResult = $FlashFotoAPI->mugshot($ffid);
$status = null;
while(1) {
    sleep(1);
    $status = $FlashFotoAPI->mugshot_status($ffid);
    if($status['mugshot_status'] == 'failed' || $status['mugshot_status'] == 'finished') {
        break;
    }
}
if($status['mugshot_status'] == 'finished')
    echo "1";
else
    echo "0";

?>