<style>
    body[data-sidebar=dark] .navbar-brand-box {
        background: #ececf1 !important;
    }
</style>
<header id="page-topbar">
    <div class="navbar-header" style="justify-content: space-between;">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="calendar.php" class="logo logo-light">
                <span class="logo-sm">
                    <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="https://i.ibb.co/TwTd6GQ/Grupo-5.png" alt="" height="18">
                </span>
            </a>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notificaciones (3) </h5>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="mdi mdi-cart-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Reunion en 30 min</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Aca iran las notas establecidas.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
            
                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                                            <i class="mdi mdi-message-text-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Mañana se entrega proyecto</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Aca iran las notas establecidas.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <span class="avatar-title bg-info rounded-circle font-size-16">
                                            <i class="mdi mdi-glass-cocktail"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Estas en clase</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Aca iran las notas establecidas.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                Ver todo
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: flex; justify-content: center; flex-direction: column;">
                    <img class="rounded-circle header-profile-user" >
                    <div id="avatar-letter"></div>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#photo"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Perfil</a>
                    <!-- <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Configuración<span class="badge bg-success ms-auto">11</span></a> -->
                    <a class="dropdown-item" href="#" id="lockscreen"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Bloquear pantalla</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="#" id="logout"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</header>