

<!DOCTYPE html>
<html>
    <?php require_once '../MainHead/head.php'; ?>
    <title>Consulta</title>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        
        <?php require_once '../MainHeader/header.php'; ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once '../MainNav/nav.php'; ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-3">
                    <div class="bg-secondary rounded h-20 p-1">
                    <div class="row vh-20 bg-secondary rounded align-items-center justify-content-center mx-0">
                        <div class="col-md-5 text-center">
                            <h5 class="mb-3" style="margin: 13px;">Home / Consulta Ticket</h5>
                        </div>
                    </div>
                    </div>
                    <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Lista Tickets</h6>
                    <div class="table-responsive">
                        <table class="table table-dark" id="ticket_data">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Num.Serie</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Vencimiento</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Lugar donde se muestra información de tickets -->
                            </tbody>
                        </table>
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
    <script type="text/JavaScript" src="consultaT.js"></script>
</body>

</html>
