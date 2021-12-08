$("#logout").on('click', function(e){
    localStorage.removeItem('useremail');
    localStorage.removeItem('userpass');
    
    let settings = {
        "url": "calendar.php",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function(res){
        setTimeout(function(){
            window.location.reload();
        }, 1500);
    });
});

$("#lockscreen").on('click', function(){
    let settings = {
        "url": "calendar.php",
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function(res){
        setTimeout(function(){
            localStorage.setItem("lock", true);
            window.location.href = "pages-lock-screen.php";
        }, 1000);
    });
});

$("#recoverpw").on('submit', function(evt){
    evt.preventDefault();
    let email = document.querySelector("#useremail").value;
    var settings = {
        "url": "https://angel609.es/testproyects/Data/users.php?email=" + email,
        "method": "GET",
        "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
        if(JSON.parse(response).length == 0){
            alert("No hay ningún usuario con el correo especificado.");
        }else{
            let user = JSON.parse(response);
            sendMessage(user[0].email, user[0].name, user[0].password);
        }
    });
    
});

$('#lgn').on('submit', function (evt) {
    evt.preventDefault();
    let useremail = document.querySelector("#useremail").value.toLowerCase();
    let userpass = document.querySelector("#userpassword").value.toLowerCase();
    let settings = {
        "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail + "&password=" + userpass,
        "method": "GET",
        "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
        if(JSON.parse(response).length == 0){
            alert("El usuario o contraseña no coninciden");
        }else{
            localStorage.setItem('useremail', useremail);
            localStorage.setItem('username', JSON.parse(response)[0].name);
            localStorage.setItem('userpass', userpass);
            setTimeout(function(){
                window.location.href = "calendar.php";
            }, 1000);
        }
    });
});

$('#rgt').on('submit', function (evt) {
    evt.preventDefault();

    if(document.querySelector("#username") && document.querySelector("#username").value.toLowerCase().length != 0){
        if(document.querySelector("#useremail") && document.querySelector("#useremail").value.toLowerCase().length != 0){
            if(document.querySelector("#userpassword").value.toLowerCase() && document.querySelector("#userpassword").value.toLowerCase().length != 0){
                if(document.querySelector("#userpassword").value.toLowerCase().length >= 6){
                    register();
                }else{
                    alert("La contraseña debe tener al menos 6 caracteres");
                }
            }else{
                alert("No deje campos vacíos");
            }
        }else{
            alert("No deje campos vacíos");
        }
    }else{
        alert("No deje campos vacíos");
    }
});

function register(){
    let username = document.querySelector("#username").value.toLowerCase();
    
    let settings = {
        "url": "https://angel609.es/testproyects/Data/users.php?name=" + username,
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        if(JSON.parse(response).length == 0){
            let useremail = document.querySelector("#useremail").value.toLowerCase();
    
            let settings = {
                "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail,
                "method": "GET",
                "timeout": 0,
            };

            $.ajax(settings).done(function (response) {
                if(JSON.parse(response).length == 0){
                    let form = new FormData();
                    form.append("name", document.querySelector("#username").value.toLowerCase());
                    form.append("email", document.querySelector("#useremail").value.toLowerCase());
                    form.append("password", document.querySelector("#userpassword").value.toLowerCase());

                    let settings = {
                        "url": "https://angel609.es/testproyects/Data/users.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": form
                    };

                    $.ajax(settings).done(function (response) {
                        if(response == "data inserted"){
                            localStorage.setItem('useremail', document.querySelector("#useremail").value.toLowerCase());
                            localStorage.setItem('userpass', document.querySelector("#userpassword").value.toLowerCase());
                            
                            localStorage.setItem('username', document.querySelector("#username").value.toLowerCase());
                            
                            window.location.href = "calendar.php";
                        }
                    });
                }else{
                    alert("El correo ya ha sido tomado");
                }
            });
        }else{
            alert("El nombre de usuario ya ha sido tomado");
        }
    });
}

function sendMessage(email, username, password){
    Email.send({
        Host: "smtp.gmail.com",
        Username: "angelguerrerojose609@gmail.com",
        Password: "edetdhrikztmygxi",
        To : email,
        From : "angelguerrerojose609@gmail.com",
        Subject : "Recuperación de contraseña",
        Body : "Hola " + username.substring(0,1).toUpperCase() + username.substring(1, username.length) +", te compartimos su contraseña de Tasking, esperamos siga disfruntando de nuestro servicio. \n"+
            "Contraseña: " + password
    }).then(
        message => alert(message)
    );
}

$("#unlock").on('submit', function(evt){
    evt.preventDefault();
    let useremail = localStorage.getItem("useremail");
    let userpass = document.querySelector("#userpassword").value.toLowerCase();
    let settings = {
        "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail + "&password=" + userpass,
        "method": "GET",
        "timeout": 0,
    };
    
    $.ajax(settings).done(function (response) {
        if(JSON.parse(response).length == 0){
            alert("Contraseña incorrecta");
        }else{
            localStorage.setItem('useremail', useremail);
            localStorage.setItem('username', JSON.parse(response)[0].name);
            localStorage.setItem('userpass', userpass);
            setTimeout(function(){
                localStorage.setItem("lock", false);
                window.location.href = "calendar.php";
            }, 1000);
        }
    });
});

$("#save-image").on('click', function(e){
    let inputfile = $(".filethumbnail img");

    if(inputfile.length == 0) alert("No hay ninguna imagen subida");
    else{
        let useremail = localStorage.getItem("useremail");

        let settings = {
            "url": "https://angel609.es/testproyects/Data/users.php?email=" + useremail,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settings).done(function (response) {
            let res = JSON.parse(response);
            var form = new FormData();
            form.append("id", res[0].id);
            form.append("photo", inputfile[0].getAttribute("src"));

            var settings = {
                "url": "https://angel609.es/testproyects/Data/users.php",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form
                };

            $.ajax(settings).done(function (response) {
                window.location.reload();
            });
        });
    }
});

// function sendMessage(email, username, password){
//     $.ajax({
//         type: "POST",
//         url: "https://mandrillapp.com/api/1.0/messages/send.json",
//         data: {
//             key: "oeyT6SPABK07tOoXVyUIUA",
//             message: {
//                 from_email: "angelguerrerojose609@gmail.com",
//                 to: [
//                     {
//                         email: email,
//                         name: username.substring(0,1).toUpperCase() + username.substring(1, username.length),
//                         type: "to"
//                     }
//                 ],
//                 autotext: true,
//                 subject: "Recuperar contraseña",
//                 html: "Hola buenas, le compartimos su contraseña de Tasking, esperamos siga disfruntando de nuestro servicio. \n"+
//                 "Contraseña: " + password
//           }
//         }
//     }).done(function(response) {
//         console.log(response); // if you're into that sorta thing
//     });
// }