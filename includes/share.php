<button onclick = "share()">Share</button>
<div class = "shareOptions">
    <button class = "facebookShare" onclick = "shareToFacebook()">Facebook</button>
    <button class = "twitterShare" onclick = "shareToTwitter()">Twitter</button>
</div>
<!--p class = "text-center"><span class = "shareCount">0</span> Shares.</p> <span class = "fbLikeCount">0</span> Likes. <span class = "viewCount">0</span> Views.<!-- TODO: Grab reporting data -->

<script type = "text/javascript">
     var login_base_url = "<?php echo $GLOBALS['login_base_url'];?>";
     var base_url = "<?php echo $base_url;?>";

     function share(){
         $(".shareOptions").toggle();
     }
     function shareToFacebook(ffid){
         ffid = ffid || "";
         var shareURL = base_url + "/view.php";
         if(ffid.length > 0)
            shareURL += "?ffid=" + ffid;
         window.location.href = login_base_url + "/shares/share?network=Facebook&url=" + shareURL;

     }
     function shareToTwitter(ffid){
         ffid = ffid || "";
         var shareURL = base_url + "/view.php";
         if(ffid.length > 0)
             shareURL += "?ffid=" + ffid;
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