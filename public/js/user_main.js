$(document).ready(function() {
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
    }else if(localStorage.getItem('useremail') && localStorage.getItem('userpass').length > 0){
        let settings = {
            "url": "index.php",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(res){
            setTimeout(function(){
                window.location.href = "calendar.php"; 
            }, 1000);
        });  
    }
});