<?php

if(isset($_SESSION["email"])){
    $loggedIn = True;
    // Sets the display name to Full Name. Falls back to username, then email address.
    $displayName = (isset($_SESSION["full_name"]) && $_SESSION["full_name"] != "n/a" ? $_SESSION["full_name"] : (isset($_SESSION["username"]) && $_SESSION["username"] != "n/a" ? $_SESSION["username"] : $_SESSION["email"]));
    echo "<button class = \"loginButton\" onclick = \"window.location.href = '" . $GLOBALS["fotam_logout_url"] . "'\">Logout</button>";
}
else{
    $loggedIn = false;
    echo "<button class = \"loginButton\" onclick = \"window.location.href = 'flashfoto/fotam-auth/fotam-test.php'\">Login</button>";
}

?>
<div id = "menuButton"></div>
<div id = "blinkingArrowContainer">
    <div class = "blinkingArrow"></div>
    <div class = "blinkingArrow"></div>
    <div class = "blinkingArrow"></div>
</div>
<div id = "menu">
    <div id = "menuLeftBar"></div>
    <div id = "menuInnerWrap">
        <a href = "index.php"><img class = "menuLogo" src = "img/logos/fotam-horiz.svg" onerror = "this.src='img/logos/fotam-horiz.png';this.onError=null;" alt = "Welcome to FOTAM"/></a>
        <ul>
            <li><a href = "index.php">Home</a></li>
            <li><a href = "http://events.fotam.com" target = "_blank">Fotam Events</a></li>
            <li><a href = "http://demo.fotam.com" target = "_blank">Fotam Rewards</a></li>
            <li><a href = "http://www.backgroundremoval.com" target = "_blank">Background Removal</a></li>
            <li><a href = "index.php">Free Background Removal</a></li>
            <li><a href = "http://www.flashfotoinc.com/fotamads.php" target = "_blank">Next Level Advertising</a></li>
            <li><a href = "about.php">About</a></li>
            <li><a href = "contact.php">Contact</a></li>
            <?php
            if($loggedIn){
                echo "<p><span class = \"username\">" . $displayName . "</span></p>";
                echo "<button onclick = \"window.location.href = '" . $GLOBALS["fotam_logout_url"] . "'\">Logout</button>";
            }
            else
                echo "<button onclick = \"window.location.href = 'flashfoto/fotam-auth/fotam-test.php'\">Login</button>";
            ?>
        </ul>
    </div>
</div>