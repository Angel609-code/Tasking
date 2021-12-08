<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Calendario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- Plugin css -->
    <link href="public/libs/@fullcalendar/core/main.min.css" rel="stylesheet" type="text/css" />
    <link href="public/libs/@fullcalendar/daygrid/main.min.css" rel="stylesheet" type="text/css" />
    <link href="public/libs/@fullcalendar/bootstrap/main.min.css" rel="stylesheet" type="text/css" />
    <link href="public/libs/@fullcalendar/timegrid/main.min.css" rel="stylesheet" type="text/css" />

    <!-- drop zone -->
    <link rel="stylesheet" href="public/libs/DropZone/css/UnoDropZone.css">

    <?php include 'layouts/headerStyle.php'; ?>
    <style>
        .custom-drop-zone{
            width: 250px;
            height: 250px;
            border-style: dashed;
            border-color: gray;
            background: #e5e5e5e5;
            position: relative;
            left: 50%;
            transform: translate(-50%);
            position: relative;
        }

        .custom-drop-zone:hover .cartel{
            background-color: rgba(0,0,0,0.6);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
        }
    </style>
</head>

<?php include 'layouts/master.php'; echo setLayout();?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php include 'layouts/topbar.php'; ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Calendario</h6>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-grid">
                                    <button class="btn font-size-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Crear nuevo evento</button>
                                </div>

                                <div id="external-events" class="mt-2">
                                    <br>
                                    <p class="text-muted">Arrastra y suelta tu evento o has clic en el calendario</p>
                                    <div class="external-event fc-event bg-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Estudio
                                    </div>
                                    <div class="external-event fc-event bg-info" data-class="bg-info">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Reunión
                                    </div>
                                    <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Reportería
                                    </div>
                                    <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Entrega de proyecto
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div> 

                <div style='clear:both'></div>
                    
                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4">
                                <h5 class="modal-title">Evento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            <div class="modal-body p-4">
                                <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nombre del evento</label>
                                                <input class="form-control" placeholder="Insert Event Name"
                                                    type="text" name="title" id="event-title" required value="" />
                                                <div class="invalid-feedback">Proporcione un nombre de evento válido</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <select class="form-select" name="category"
                                                    id="event-category">
                                                    <option selected> --Seleccionar-- </option>
                                                    <option value="bg-success">Ligero</option>
                                                    <option value="bg-primary">Primario</option>
                                                    <option value="bg-info">Información</option>
                                                    <option value="bg-dark">Miedo</option>
                                                    <option value="bg-warning">Cuidado</option>
                                                    <option value="bg-danger">Critico</option>
                                                </select>
                                                <div class="invalid-feedback">Por favor seleccionar una categoría correcta.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Borrar</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->

                <!-- Adding modal to save photos -->
                <!-- Modal -->
                <div class="modal fade" id="photo" tabindex="-1" aria-labelledby="photoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="photoLabel">Foto de perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div class="file-upload custom-drop-zone" data-input-name="input" data-unodz-msg="Cambiar de foto de perfil"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="save-image">Guardar cambios</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer" style="box-shadow: 1px 0 8px rgba(0,0,0,0.2); left: 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © <script>document.write(new Date().getFullYear())</script> Tasking <span class="d-none d-sm-inline-block"><i class="mdi mdi-heart text-danger"></i> by Angel609.</span>
            </div>
        </div>
    </div>
</footer>

</div>
<?php include 'layouts/rightbar.php'; ?>

<?php include 'layouts/footerScript.php'; ?>

<!-- plugin js -->
<script src="public/libs/moment/min/moment.min.js"></script>
<script src="public/libs/jquery-ui/jquery-ui.min.js"></script>

<script src="public/libs/@fullcalendar/core/main.min.js"></script>
<script src="public/libs/@fullcalendar/bootstrap/main.min.js"></script>
<script src="public/libs/@fullcalendar/daygrid/main.min.js"></script>
<script src="public/libs/@fullcalendar/timegrid/main.min.js"></script>
<script src="public/libs/@fullcalendar/interaction/main.min.js"></script>

<!-- drop zone -->
<script src="public/libs/DropZone/js/UnoDropZone.js"></script>

<!-- Calendar init -->
<script src="public/js/pages/calendar.init.js"></script>

<?php include "layouts/content-end.php"; ?>

<!-- laoder layout -->
<?php include "layouts/loader.php"; ?>

<script>
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

                        $(".custom-drop-zone")[0].style.setProperty("background-image", "url(" + res[0].photo + ")");
                        $(".custom-drop-zone")[0].style.setProperty("background-size", "cover");
                        $(".custom-drop-zone")[0].style.setProperty("background-position", "center");
                        $(".custom-drop-zone")[0].style.setProperty("background-repeat", "no-repeat");
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
</script>