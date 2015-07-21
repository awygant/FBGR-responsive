<?php

if(!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["msg"])) {
    header("Location: contact.php?fail");
}
else{

    $to = "admin@flashfotoinc.com";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    $headers = "From: " . $email . "\r\n";

    $subject = "New Mail from Flashfotoinc!";

    if(mail($to, $subject, $msg, $headers))
        header("Location: contact.php?success");
    else
        header("Location: contact.php?fail");

}
