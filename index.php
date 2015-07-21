<?php
include_once "flashfoto/config.php";
include_once "includes/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Free Background Removal</title>

    <?php include_once("includes/meta.php");?>
    <?php include_once("includes/resources.php"); ?>

    <script src="https://hammerjs.github.io/dist/hammer.js"></script>

</head>
<body>

<?php include "includes/nav.php"; ?>

<div id = "container">
    <div class = "mainImgWrap text-center">
        <?php include "includes/bgrcta.php"; ?>
    </div>

    <div id = "wrap" class = "text-center">

        <div id = "main">
            <h5>Drag and drop anywhere on this page to begin. Or, use the form below.</h5>

            <div class = "row">
                <div class = "col-lg-3 col-md-4 col-sm-6">
                    <div class = "grey-panel structuredHeight">
                        <h4>Choose your mode:</h4>
                        <button class = "typeToggle activeButton" onclick = "setType('product', this);">Product</button>
                        <button class = "typeToggle" onclick = "setType('body', this);">Body</button>
                        <button class = "typeToggle" onclick = "setType('facehair', this);">Face & Hair</button>
                    </div>
                </div>
                <div class = "col-lg-6 col-md-4 col-sm-6">
                    <div class = "grey-panel text-left">
                        <h4>Choose photo:</h4>
                        <?php include "includes/bgr-box.php"; ?>
                    </div>
                </div>
                <div class = "col-lg-3 col-md-4 col-sm-12">
                    <div class = "grey-panel structuredHeight">
                        <h4>Tips for Success:</h4>
                        <h5>DO use pictures with:</h5>
                        <ul class = "darkUl positive">
                            <li>Your object in the center of the shot.</li>
                            <li>A smooth or simple background.</li>
                            <li>A background that contrasts with the product.</li>
                        </ul>
                        <h5>DON'T use pictures with:</h5>
                        <ul class = "darkUl negative">
                            <li>A textured or busy background.</li>
                            <li>Extreme shadows or highlights.</li>
                            <li>Your object near the edge or cut off.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class = "col-sm-6 col-xs-12">
                    <div class = "grey-panel">
                        <?php include "includes/facebookComments.php"; ?>
                    </div>
                </div>
                <div class = "col-sm-6 col-xs-12">
                    <div class = "grey-panel">
                        <?php include "includes/twitterFeed.php"; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <?php include_once "includes/footer.php"; ?>
</div>

<script src = "js/hammerTimeMenu.js"></script>

</body>
</html>