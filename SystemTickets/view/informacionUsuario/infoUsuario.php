<?php
    session_start();
    $nombre = $_SESSION["nombre_user"];
    $apellido = $_SESSION["apellido_user"];
    $dni = $_SESSION["DNI_user"];
    $correo = $_SESSION["email_user"];
    $telefono = $_SESSION["phone_user"];
?>

<!DOCTYPE html>
<html>
    <?php require_once '../MainHead/head.php'; ?>
    <title>NuevoTicket</title>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        
        <?php require_once '../MainHeaderCliente/header.php'; ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once '../MainNavCliente/nav.php'; ?>
            <!-- Navbar End -->


            <!-- admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Informacion del cliente</h6>
                            <table class="table text-start align-middle table-bordered table-hover table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Datos</th>
                                        <th scope="col">Valores</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Nombre</th>
                                        <td><?php echo htmlspecialchars($nombre);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Apellido</th>
                                        <td><?php echo htmlspecialchars($apellido);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">DNI</th>
                                        <td><?php echo htmlspecialchars($dni);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Correo</th>
                                        <td><?php echo htmlspecialchars($correo);?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Número Telefonico</th>
                                        <td><?php echo htmlspecialchars($telefono);?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
            </div>
            <!-- admin End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php require_once '../MainJs/js.php'; ?>
    <script type="text/JavaScript" src="nuevoTicket.js"></script>
</body>
</html>