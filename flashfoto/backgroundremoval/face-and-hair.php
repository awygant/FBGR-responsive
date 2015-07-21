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
$iniResult = $FlashFotoAPI->segment($ffid);
$status = null;
while(1) {
    sleep(1);
    $status = $FlashFotoAPI->segment_status($ffid);
    if($status['segmentation_status'] == 'failed' || $status['segmentation_status'] == 'finished') {
        break;
    }
}
if($status['segmentation_status'] == 'finished')
    echo "1";
else
    echo "0";
?>