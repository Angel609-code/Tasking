<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    
    <?php include 'layouts/headerStyle.php'; ?>

</head>

<body>
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20">Registro gratuito</h5>
                            <p class="text-white-50">Obtén tu cuenta gratis en Tasking ahora.</p>
                            <a href="index.php" class="logo logo-admin">
                                <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" height="24" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="p-3">
                            <form class=" mt-4" id="rgt">

                                <div class="mb-3 mt-5">
                                    <label class="form-label" for="useremail">Correo</label>
                                    <input type="email" class="form-control" id="useremail" placeholder="Ingresar correo">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="username">Nombre de usuario</label>
                                    <input type="text" class="form-control" id="username" placeholder="Ingresar usuario">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Cotraseña</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Ingresar contraseña">
                                </div>

                                <div class="mb-3 row mt-5">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Registrarse</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p>¿Ya tienes una cuenta? <a href="index.php" class="fw-medium text-primary"> Iniciar sesión</a> </p>
                    <p>© <script>document.write(new Date().getFullYear())</script> Tasking. <i class="mdi mdi-heart text-danger"></i> by Angel609</p>
                </div>


            </div>
        </div>
    </div>
</div>

<?php include 'layouts/footerScript.php'; ?>
<?php include "layouts/content-end.php"; ?>

<script type="text/javascript">
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
                    alert("No deje campos vacios");
                }
            }else{
                alert("No deje campos vacios");
            }
        }else{
            alert("No deje campos vacios");
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
</script>