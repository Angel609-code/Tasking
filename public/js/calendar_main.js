var MyObject = {
    foo: function (uplaodCont) {
        console.log('calling foo');
        console.log('uplaodCont:');
        console.log(uplaodCont);
        $('#callbackmsg').html('Call MyObject.foo() function at:' + new Date())
    }
};

$(document).ready(function() {
    UnoDropZone.init();
    
    if(localStorage.getItem("lock") == "true"){
        let settings = {
            "url": "calendar.php",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(res){
            setTimeout(function(){
                window.location.href = "pages-lock-screen.php"; 
            }, 1000);
        });
    }else{
        if(localStorage.getItem('useremail') && localStorage.getItem('userpass').length > 0){
            let useremail = localStorage.getItem("useremail");

            let settings = {
                "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                let res = JSON.parse(response);
                if(res[0].photo && res[0].photo.length > 0){
                    $(".rounded-circle.header-profile-user")[0].setAttribute("src", res[0].photo);
                    $("#avatar-letter").hide();
                    $(".custom-drop-zone")[0].style.setProperty("background-image", "url(" + res[0].photo + ")");
                    $(".custom-drop-zone")[0].style.setProperty("background-size", "cover");
                    $(".custom-drop-zone")[0].style.setProperty("background-position", "center");
                    $(".custom-drop-zone")[0].style.setProperty("background-repeat", "no-repeat");
                }else{
                    $("#avatar-letter").show();
                    $("#avatar-letter").html(localStorage.getItem("username").substring(0,1).toUpperCase()); 
                }
            });
        }else{
            let settings = {
                "url": "calendar.php",
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function(res){
                setTimeout(function(){
                    window.location.href = "index.php"; 
                }, 1000);
            });
        }
    }
});