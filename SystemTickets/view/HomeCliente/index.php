<?php
session_start();
if (!isset($_SESSION['nombre_user'])) {
    header('Location: ../../indexCliente.php');
    exit();
}
$name_user = $_SESSION['nombre_user'];
?>

<!DOCTYPE html>
<html>
    <?php require_once '../MainHead/head.php'; ?>
    <title>Home</title>
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


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 d-flex justify-content-center">Tickets en Revisión</p>
                                <h6 class="mb-0 btn btn-outline-info m-2 d-flex justify-content-center" style="border-radius:12px; width: 190px;" id="revision_h">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 d-flex justify-content-center">Tickets en Progreso</p>
                                <h6 class="mb-0 btn btn-outline-info m-2 d-flex justify-content-center" style="border-radius:12px; width: 190px;" id="progreso_h">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 d-flex justify-content-center">Tickets Terminados</p>
                                <h6 class="mb-0 btn btn-outline-info m-2 d-flex justify-content-center" style="border-radius:12px; width: 190px;" id="terminado_h">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 d-flex justify-content-center">Tickets para Software</p>
                                <h6 class="mb-0 btn btn-outline-info m-2 d-flex justify-content-center" style="border-radius:12px; width: 190px;" id="software_h">-</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-12 d-flex justify-content-center">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-laptop fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2 d-flex justify-content-center">Tickets para Hardware</p>
                                <h6 class="mb-0 btn btn-outline-info m-2 d-flex justify-content-center" style="border-radius:12px; width: 190px;" id="hardware_h">-</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


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
    <script type="text/JavaScript" src="homeCliente.js"></script>
</body>

</html>
