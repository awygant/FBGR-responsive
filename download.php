<?php

/*
if(!isset($_POST["filename"]))
    exit;
if(!isset($_POST["url"]))
    exit;

*/
//file_put_contents($_POST["filename"] . ".png", file_get_contents($_POST["url"]));

if(!isset($_GET["filename"]))
    exit;
if(!isset($_GET["url"]))
    exit;


header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $_GET["filename"]);
ob_clean();
flush();
readfile($_GET["url"]);

exit;

/*
 * header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $file_name);
ob_clean();
flush();
readfile($file);
exit;

 */


?>