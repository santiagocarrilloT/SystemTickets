

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
        
        <?php require_once '../MainHeader/header.php'; ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once '../MainNav/nav.php'; ?>
            <!-- Navbar End -->


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="bg-secondary rounded h-20 p-1">
                        <div class="row vh-20 bg-secondary rounded align-items-center justify-content-center mx-0">
                            <div class="col-md-5 text-center">
                                <h5 class="mb-3">Home / Nuevo Ticket</h5>
                                <div class="p-2 mb-2 bg-warning text-dark" style="border-radius: 15px;">Estado del ticket</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-11 col-xl-5">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Nombre Cliente</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Modelo de Ordenador</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Número de Serial</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Contacto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected="">-</option>
                                    <option value="1">Bajo</option>
                                    <option value="2">Normal</option>
                                    <option value="3">Alto</option>
                                </select>
                                <label for="floatingSelect">Prioridad</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-13 col-xl-7">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Asunto</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 278px;"></textarea>
                                <label for="floatingTextarea">Comentario</label>
                                <button type="button" class="btn btn-success m-1">Success</button>
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
    <script type="text/JavaScript" src="nuevoTicket.js"></script>
</body>
</html>