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

<!-- laoder layout -->
<?php include "layouts/loader.php"; ?>
