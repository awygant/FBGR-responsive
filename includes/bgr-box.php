<div class = "text-center">
    <div id = "uploader">
        <!--button onclick = "startCenterAd()">Test center ad</button-->
        <?php include_once("flashfoto/uploader/upload.php"); ?>
        <?php include_once("includes/centerAd.php"); ?>
    </div>
    <div id = "backgroundRemovalResult">
        <h4>Your Results:</h4>
    </div>
    <p></p>
    <?php include "includes/share.php";?>
    <p></p>

    <div id = "dynamicAd">
        <a href = "https://warrantizor.refersion.com/c/b3308" target = "_blank"><img src = "img/ads/warrantizor.png"/></a>
        <div id = "dynamicUnderlay"></div>
    </div>
</div>



<script src = "flashfoto/backgroundremoval/js/backgroundremoval.js"></script>
<script type = "text/javascript">
    type = "";
    api_base_url = "<?php echo $api_base_url; ?>";
    setUploadCallback(function(ffid){
        changeStatus("Removing Background");
        backgroundremoval(ffid, showResult, type);
    });
    function showResult(ffid, type, errorMsg){
        errorMsg = errorMsg || "";
        var version;
        switch(type){
            case "body":
                version = "MugshotMasked";
                break;
            case "facehair":
                version = "HardMasked";
                break;
            default:
                version = "UniformBackgroundMasked";
                break;
        }
        if(ffid > 0){
            var maskedImageURL = api_base_url + "get/" + ffid + "?version=" + version;
            $(".downloadButton").removeAttr("disabled");
            var img = new Image();
            img.onload = function(){
                resetForm();
                $("#backgroundRemovalResult").append(buildResult(this, ffid, version)).show();
                if(!($("#centerAd").is(":visible"))){
                    jump("backgroundRemovalResult");
                }
                $("#resultScroll").click();
            };
            img.src = maskedImageURL;
        }
        else{
            resetForm(errorMsg);
        }
    }

    function buildResult(img, ffid, version){
        var resultDiv = $("<div>");
        resultDiv.addClass("result");
        resultDiv.append(img);
        resultDiv.append("<div class = 'actions'>" +
        "<div class = 'action view' onclick = 'view(" + ffid + ", \"" + version + "\")'></div>" +
        "<div class = 'action download' onclick = 'download(this);' data-ffid = '" + ffid + "' data-version = '" + version + "'></div>" +
        "<div class = 'action share' onclick = 'share(this)'></div>" +
        "<div class = 'shareOptions'>" +
        "<button class = 'facebookShare' onclick = 'shareToFacebook(" + ffid + ", \"" + version + "\")'>Facebook</button>" +
        "<button class = 'twitterShare' onclick = 'shareToTwitter(" + ffid + ", \"" + version + "\")'>Twitter</button>" +
        "</div>" +
        "</div>");
        return resultDiv;
    }

    function download(elem){
        var ffid = $(elem).data('ffid');
        var version = $(elem).data('version');
        var ffurl = api_base_url + "get/" + ffid + "?version=" + version;
        window.location.href = "download.php?filename=" + ffid + ".png&url=" + ffurl;
    }

    function view(ffid, version){
        var ffurl = api_base_url + "get/" + ffid + "?version=" + version;
        $("#fullViewImg").attr("src", ffurl);
        $("#fullViewActionBox").html("<div class = 'action download' onclick = 'download(this);' data-ffid = '" + ffid + "' data-version = '" + version + "'></div>" +
        "<div class = 'action share' onclick = 'share(this)'></div>" +
        "<div class = 'shareOptions'>" +
        "<button class = 'facebookShare' onclick = 'shareToFacebook(" + ffid + ", \"" + version + "\")'>Facebook</button>" +
        "<button class = 'twitterShare' onclick = 'shareToTwitter(" + ffid + ", \"" + version + "\")'>Twitter</button>" +
        "</div>");
        $("#fullView").show();
        jump('fullView');
    }

    $("#fileInput").change(function(){
        startCenterAd();
        if (this.files && this.files[0]) {
            file = this.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                createAd(e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    document.body.addEventListener("drop", function(evt){
        evt.stopPropagation();
        evt.preventDefault();
        startCenterAd();
        var files = evt.dataTransfer.files;
        if(files.length > 0){
            var reader = new FileReader();
            reader.onload = function (e) {
                createAd(e.target.result);
            };
            reader.readAsDataURL(files[0]);
        }
    }, false);

    function createAd(imgData){
        $("#dynamicUnderlay").css("background-image", "url('" + imgData + "')");
    }

    function startCenterAd(){
        $("#centerAd").css({
            "z-index": "0",
            "opacity": "1"
        });
        jump("centerAd");
        var timer = 7;
        var interval = window.setInterval(function(){
            timer--;
            $("#centerAdTimer").html(timer);
            if(timer == 0){
                clearInterval(interval);
                $("#centerAdMessage").hide();
                $("#centerAdWorking").hide();
            }
        }, 1000);
        window.setTimeout(function(){
            $("#centerAdCloseButton").show();
        }, 7000);
    }

    function closeCenterAd(){
        $("#centerAd").css({
            "z-index": "-1",
            "opacity": "0"
        });
        $("#centerAdTimer").html("7");
        $("#centerAdMessage").show();
        $("#centerAdWorking").show();
        $("#centerAdCloseButton").hide();
        if((($("#backgroundRemovalResult").is(":visible")))){
            jump('backgroundRemovalResult');
        }
    }

    function jump(element){
        var url = location.href;
        location.href = location.href + "#" + element;
        history.replaceState(null,null,url);
    }

    function hideResult(){
        $("#backgroundRemovalResult").html("").hide();
    }

    function setType(option, elem){
        $(".typeToggle").removeClass("activeButton");
        type = option;
        $(elem).addClass("activeButton");
        setUploadCallback(function(ffid){
            changeStatus("Removing Background");
            backgroundremoval(ffid, showResult, type);
        });
    }

    <?php

     if(isset($_GET["ffid"])){
        $data = explode("_", $_GET["ffid"]);
        $ffid = $data[0];
        $version = $data[1];
        echo "view(" . $ffid . ", '" . $version . "');";
     }

     ?>

</script>
