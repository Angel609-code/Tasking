$(document).ready(function(){
    if(localStorage.getItem("lock") != "true"){
        let settings = {
            "url": "pages-lock-screen.php",
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function(res){
            setTimeout(function(){
                window.location.href = "index.php";
            }, 1500);
        });
    }
    document.querySelector("#lblOne").innerHTML = "Hola " + localStorage.getItem("username") +", ingresa tu contraseña para desbloquear la pantalla!";
    document.querySelector("#lblTwo").innerHTML = localStorage.getItem("useremail");

    let useremail = localStorage.getItem("useremail");

    let settings = {
        "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail,
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        let res = JSON.parse(response);
        if(res[0].photo && res[0].photo.length > 0){
            $("#avatar-letter").hide();
            $("#avatarimg")[0].setAttribute("src", res[0].photo);
        }else{
            $("#avatar-letter").show();
            $("#avatar-letter").html(localStorage.getItem("username").substring(0,1).toUpperCase()); 
        }
    });
});