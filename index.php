<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
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
                            <h5 class="text-white font-size-20">¡Bienvenido de nuevo!</h5>
                            <p class="text-white-50">Incia sesión para usar Tasking.</p>
                            <a href="index.php" class="logo logo-admin">
                                <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" height="24" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="p-3">
                            <form class="mt-4" id="lgn">

                                <div class="mb-3 mt-5">
                                    <label class="form-label" for="useremail">Correo</label>
                                    <input type="text" class="form-control" id="useremail" placeholder="Ingresar correo">
                                </div>

                                <div class="mb-3 mt-4">
                                    <label class="form-label" for="userpassword">Contraseña</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Ingresar contraseña">
                                </div>

                                <button class="btn btn-primary w-100 waves-effect waves-light mt-4" type="submit">Iniciar Sesión</button>

                                <div class="mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="pages-recoverpw.php"><i class="mdi mdi-lock"></i> ¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p>¿No tienes una cuenta? <a href="pages-register.php" class="fw-medium text-primary"> Registrate ahora </a> </p>
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Tasking <i class="mdi mdi-heart text-danger"></i> by Angel609</p>
                </div>


            </div>
        </div>
    </div>
</div>
<?php include 'layouts/footerScript.php'; ?>
<?php include "layouts/content-end.php"; ?>

<!-- laoder layout -->
<?php include "layouts/loader.php"; ?>

<script type="text/javascript">
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
</script>