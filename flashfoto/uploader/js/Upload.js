// Attach our CSS to the head
var fileref=document.createElement("link");
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", "flashfoto/css/flashfoto.css");
document.getElementsByTagName("head")[0].appendChild(fileref);
$(document).ready(function(){
    var dropbox = document.body;
    dropbox.addEventListener("dragenter", dragEnter, false);
    dropbox.addEventListener("dragexit", dragExit, false);
    dropbox.addEventListener("dragover", dragOver, false);

    function dragEnter(evt){
        evt.stopPropagation();
        evt.preventDefault();
    }

    function dragExit(evt){
        evt.stopPropagation();
        evt.preventDefault();
        $("body").css("opacity","1");
    }

    function dragOver(evt){
        evt.stopPropagation();
        evt.preventDefault();
        $("body").css("opacity","0.5");
    }

});



// External functions
function displayUpload(input){
    $("#imgPreviewWrapper").slideDown();
    if (input.files && input.files[0]) {
        file = input.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgPreview').attr('src', e.target.result);
            $("#uploadPhoto").submit();
        };
        reader.readAsDataURL(input.files[0]);
    }
}


function setUploadCallback(callback){
    uploadForm = $("#uploadPhoto");
    uploadForm.unbind('submit');
    uploadSuccessContainer = $("#uploadSuccessContainer");
    fileInput = document.getElementById("fileInput");
    uploadForm.submit(function(e){
        e.preventDefault();
        var file;
        if(fileInput.files.length > 0)
            file = fileInput.files[0];
        masterUploader(file, callback);
    });
    document.body.addEventListener("drop", function(evt){
        evt.stopPropagation();
        evt.preventDefault();
        $("body").css("opacity","1");

        var files = evt.dataTransfer.files;
        var count = files.length;

        if (count > 0){
            masterUploader(files[0], callback);
        }
    }, true);
}


function masterUploader(file, callback){
    var formdata = new FormData();
    if (formdata)
        formdata.append("image", file);
    $("#imgPreview").hide();
    $("#uploadLoading").show();
    $.ajax({
        url: "flashfoto/uploader/ffapi_add.php",
        type: "POST",
        data: formdata,
        processData: false,
        contentType: false,
        success: function (ffid) {
            uploadForm.hide();
            uploadSuccessContainer.html("<p class = \"success\">Upload Successful!</p><img src = \"" + window.api_base_url + "get/" + ffid + "\"/>");
            callback(ffid);
        },
        error: function (request, textStatus, errorThrown) {
            console.log('ERROR on request', request.responseText);
            console.log('text', textStatus);
            console.log('error', errorThrown);
            if (errorThrown == 'Internal Server Error') {
                resetForm("Sorry, we seem to be having problems at the moment. Please try again later!");
            }
            if (errorThrown == 'timeout') {
                resetForm("Sorry, the application timed out. You need a better connection!")
            }
            else{
                resetForm("Sorry, an error occurred. Please refresh and try again!")
            }
        },
        timeout: 60000
    });
    return false;
}


function changeStatus(statusMsg){
    $("#uploadPhoto").show();
    $("#imgPreviewWrapper").show();
    $("#uploadLoading").show();
    $("#loadingStatus").html("[ " + statusMsg + " ]");
}



function resetForm(errorMsg){
    uploadForm = $("#uploadPhoto");
    errorMsg = errorMsg || "";
    $("#imgPreviewWrapper").hide();
    $("#imgPreview").show();
    $("#uploadLoading").hide();
    uploadForm.trigger("reset").show();
    if(errorMsg.length > 0)
        uploadSuccessContainer.html("<p class = \"warning\">" + errorMsg + "</p>").show();
    else
        uploadSuccessContainer.html("");
}
