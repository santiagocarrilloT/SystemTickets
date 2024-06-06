<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['nombre_emp'])) {
    header('Location: ../Home/index.php');
    exit;
}

$user = $_SESSION['nombre_emp'];
?>
<header class="site-header">
<div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-secondary navbar-dark" method="post">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>TickFast</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        
                            <div class="position-relative">
                                <a href="../informacionUsuario/infoEmpleado.php">
                                <img class="rounded-circle" src="../../public/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                                </a>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0">
                                    <?php echo htmlspecialchars($user);?>
                                </h6>
                                <span>Admin</span>
                            </div>
                        
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="../Home/" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                        <a href="../NuevoTicket/" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Nuevo Ticket</a>
                        <a href="../ConsultaTickets/" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Consultar Tickets</a>
                        <a href="../ControlCuentas/controlCuentas.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Control Cuentas</a>
                    </div>
                </nav>        
            </div>
            <!-- Sidebar End -->
</header>