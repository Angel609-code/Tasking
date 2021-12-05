<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Recoverpw | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/images/favicon.ico">
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
                                    <h5 class="text-white font-size-20 p-2">Reiniciar contraseña</h5>
                                    <a href="index.php" class="logo logo-admin">
                                        <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>
    
                            <div class="card-body p-4">
                                
                                <div class="p-3">

                                    <div class="alert alert-success mt-5" role="alert">
                                        ¡Ingresa tu correo y sigue las instrucciones que seran enviadas a tu correo!
                                    </div>


                                    <form class=" mt-4" action="index.php">
    
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">Correo</label>
                                            <input type="email" class="form-control" id="useremail" placeholder="Ingresar correo">
                                        </div>
                
                                        <div class="row mt-5 mb-0">
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reiniciar</button>
                                            </div>
                                        </div>
    
                                    </form>
    
                                </div>
                            </div>
    
                        </div>
    
                        <div class="mt-5 text-center">
                            <p>¿Recordaste? <a href="index.php" class="fw-medium text-primary"> Inicia sesión aquí </a> </p>
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Tasking <i class="mdi mdi-heart text-danger"></i> by Angel609</p>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

    <?php include 'layouts/footerScript.php'; ?>
    <?php include "layouts/content-end.php"; ?>