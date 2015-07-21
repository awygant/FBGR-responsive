function backgroundremoval(ffid, callback, type){
    type = type || "product"; // Defaults to Product Removal
    var destination = "flashfoto/backgroundremoval/";
    switch(type){
        case "body":
            destination += "mugshot.php";
            break;
        case "facehair":
            destination += "face-and-hair.php";
            break;
        default:
            destination += "product.php";
            break;
    }
    $.ajax({
        url: destination + "?ffid=" + ffid + "&type=" + type,
        tryCount: 0,
        retryLimit: 3,
        success: function (status) {
            console.log(status);
            if(status == "1")
                callback(ffid, type);
            else{
                callback(-1, type, "Sorry, we can't remove the background on this photo. Please try another image!");
            }
        },
        error: function (request, textStatus, errorThrown) {
            console.log('ERROR on request', request.responseText);
            console.log('text', textStatus);
            console.log('error', errorThrown);
            if (errorThrown == 'Internal Server Error') {
                this.tryCount++;
                if (this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                }
                else{
                    callback(-1, type, "Sorry, we seem to be having problems at the moment. Please try again later!");
                }
            }
            if (errorThrown == 'timeout') {
                callback(-1, type, "Sorry, the application timed out. Try using a smaller photo.")
            }
        },
        timeout: 45000
    });
}
