<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>lock Screen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    
    <?php include 'layouts/headerStyle.php'; ?>

    <style>
        #avatar-letter {
            left: 50%;
            transform: translate(-50%,-50%);
            font-size: 2.5rem;
            font-weight: 500;
            width: 86px;
            height: 86px;
            background-color: #fff;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            line-height: 5.5rem;
        }
    </style>
</head>

<body>

<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary">
                        <div class="text-primary text-center p-4">
                            <h5 class="text-white font-size-20">Bloqueado</h5>
                            <p class="text-white-50" id="lblOne">Hola user name, ingresa tu contraseña para desbloquear la pantalla!</p>
                            <a href="index.html" class="logo logo-admin">
                                <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" height="24" alt="logo">
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="p-3">
                            <form class="mt-4" id="unlock">

                                <div class="pt-3 text-center">
                                    <div style="position: relative;">
                                        <img id="avatarimg" class="rounded-circle img-thumbnail avatar-lg">
                                        <div id="avatar-letter"></div>
                                    </div>
                                    <h6 class="font-size-16 mt-3" id="lblTwo">User email</h6>
                                </div>

                                <div class="mb-3 mt-5">
                                    <label class="form-label" for="userpassword">Contraseña</label>
                                    <input type="password" class="form-control" id="userpassword" placeholder="Ingresar contraseña">
                                </div>

                                <div class="row mb-0 mt-4">
                                    <div class="col-12 text-end">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Desbloquear</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <p>¿No eres tú ? regresa <a href="index.php" class="fw-medium text-primary"> Iniciar sesión </a> </p>
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

<script src="public/js/lockscreen_main.js"></script>