<!--p class = "text-center"><span class = "shareCount">0</span> Shares.</p> <span class = "fbLikeCount">0</span> Likes. <span class = "viewCount">0</span> Views.<!-- TODO: Grab reporting data -->

<script type = "text/javascript">
     var login_base_url = "<?php echo $GLOBALS['login_base_url'];?>";
     var base_url = "<?php echo $base_url;?>";

     function share(elem){
         $(elem).next(".shareOptions").toggle();
     }
     function shareToFacebook(ffid, version){
         ffid = ffid || "";
         version = version || "";
         var shareURL = base_url + "index.php";
         if(ffid > 0)
            shareURL += "?ffid=" + ffid + '_' + version;
         //window.location.href = login_base_url + "/shares/share?network=Facebook&url=" + shareURL;
         console.log(login_base_url + "/shares/share?network=Facebook&url=" + shareURL);

     }
     function shareToTwitter(ffid, version){
         ffid = ffid || "";
         version = version || "";
         var shareURL = base_url + "index.php";
         if(ffid > 0)
             shareURL += "?ffid=" + ffid + '_' + version;
         window.location.href = login_base_url + "/shares/share?network=Twitter&url=" + shareURL;
     }


     /*function shareReporting(){
         var reportURL = "<?php echo $GLOBALS["fotam_share_reporting_url"]; ?>" + location.href;
         $.getJSON(
             reportURL,
             function(data){
                 console.log(data);
                 if(data.FacebookShares){
                     $(".shareCount").html(data.FacebookShares);
                 }
                 if(data.FacebookLikes){
                     $(".fbLikeCount").html(data.FacebookLikes);
                 }
                 if(data.PageViews){
                     $(".viewCount").html(data.PageViews);
                 }
             }
         )
     }
    $(document).ready(function(){
       shareReporting();
    });*/
</script>