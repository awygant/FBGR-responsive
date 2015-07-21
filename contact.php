<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fotam | Contact</title>

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
            <div class = "row">
                <div class = "col-sm-8 col-xs-12">
                    <div class = "grey-panel">
                        <?php
                        if(isset($_GET["success"])){
                            echo "<span class = 'text-success'>Thanks! We'll get back to you soon.</span>";
                        }
                        else if (isset($_GET["fail"])){
                            echo "<span class = 'text-danger'>Sorry, we encountered a problem. Please make sure everything is filled out.</span>";
                        }
                        ?>
                        <h2>Send Us an Email:</h2>
                        <form role="form" action = "mail.php" method = "post">
                            <div class="form-group">
                                <label for="name">Your Name:</label>
                                <input type="text" class="form-control" id = "name" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email:</label>
                                <input type="email" class="form-control" id = "email" name="email"/>
                            </div>
                            <div class = "form-group">
                                <label for = "msg">Message:</label>
                                <textarea class = "form-control" id = "msg" name = "msg"></textarea>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class = "col-sm-4 col-xs-12">
                    <div class = "grey-panel">
                        <h2>MORE INFO:</h2>
                        <h4>Physical Address:</h4>
                        <p>
                            Flashfoto, Inc.<br/>
                            50 University Ave, Suite 354<br/>
                            Los Gatos, CA<br/>
                            95030
                        </p>
                        <h4>Phone:</h4>
                        <p><a href = "tel:+14083542600">1 (408) 354 2600</a></p>
                    </div>
                </div>
            </div>
            <div class = "row">
                <div class = "col-sm-8 col-xs-12">
                    <div class = "grey-panel">
                        <h2>Suggested Topics:</h2>
                        <p>Can't think of what to say? Gosh, hate when that happens. Our expert creative team has come up with some suggestions in case you're stumped.</p>
                        <ul>
                            <li>Ask us about bulk background removal processing for your business.</li>
                            <li>Inquire about sponsorship opportunities for <a href = "http://events.fotam.com">Fotam Events,</a> or about building your own event hub.</li>
                            <li>Ask questions about <a href = "http://www.flashfotoapi.com" target = "blank">our API</a> and pricing.</li>
                            <li>Tell us how pretty we look today.</li>
                        </ul>
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