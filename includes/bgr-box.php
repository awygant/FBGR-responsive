<div class = "text-center">
    <div id = "uploader">
        <!--button onclick = "startCenterAd()">Test center ad</button-->
        <?php include_once("flashfoto/uploader/upload.php"); ?>
        <?php include_once("includes/centerAd.php"); ?>
    </div>
    <div id = "backgroundRemovalResult"></div>
    <p></p>
    <button onclick = "resetForm(); hideResult()">Start Over</button>
    <button onclick = "download();" class = "downloadButton" disabled>Download</button>
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
    currentFfid = "";
    currentImgUrl = "";
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
            currentImgUrl = maskedImageURL;
            currentFfid = ffid;
            $(".downloadButton").removeAttr("disabled");
            var img = new Image();
            img.onload = function(){
                $("#uploadPhoto").hide();
                $("#backgroundRemovalResult").append(this).show();
            };
            img.src = maskedImageURL;
        }
        else{
            resetForm(errorMsg);
        }
    }

    function download(){
        if(currentFfid.length < 1 || currentFfid.length < 1)
            return;
        window.location.href = "download.php?filename=" + currentFfid + ".png&url=" + currentImgUrl;
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

</script>