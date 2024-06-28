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
        
        <?php require_once '../MainHeaderCliente/header.php'; ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require_once '../MainNavCliente/nav.php'; ?>
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
                        <form method="post" id="busqueda_form">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-4">Lista Tickets</h6>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-dark border-0" type="text" placeholder="Buscar Ticket" id="valor" name="valor">
                                <button id="busqueda" type="submit" class="btn btn-primary ms-2" name="action" value="add">Buscar</button>
                            </div>
                            <div class="d-flex mb-2">
                                    <select class="form-select" id="atributo_ticket" name="atributo_ticket" aria-label="Floating label select example">
                                        <option selected="">-</option>
                                        <option value="1">ID</option>
                                        <option value="2">Num.Serie</option>
                                        <option value="3">Titulo</option>
                                        <option value="4">Vencimiento</option>
                                        <option value="5">Estado</option>
                                        <option value="6">Correo</option>
                                    </select>
                                    <div style="margin: 4px; border: 3px;">
                                    <label for="atributo_ticket">Buscar Por</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover table-dark mb-0" id="ticket_data">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Num.Serie</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Vencimiento</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Correo</th>                                       
                                        <th scope="col">Detalles</th>
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

            <!-- Content Modal Init -->
            <div class="modal fade" id="modalTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-secondary rounded h-100 p-4">
                        <!-- Encabezado del Modal -->
                        <div class="modal-header align-items-center">
                            <label for="modelo_ticket" class="p-2 mb-2 bg-light text-dark d-flex justify-content-center" style="border-radius:12px; width: 190px;">Detalles del Ticket</label>
                            <button id="cerrarModal" type="button" class="btn btn-square btn-danger m-2">
                                <i class="fa fa-times"></i>
                            </button>
                            </div>
                        <!-- Cuerpo del Modal -->
                        <div class="modal-body">
                        <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_creador" name="detalle_creador" placeholder="">
                                <label for="detalle_creador">ID creador</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_modelo" name="detalle_modelo" placeholder="">
                                <label for="detalle_modelo">Modelo de Ordenador</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_numserie" name="detalle_numserie" placeholder="">
                                <label for="detalle_numserie">Número de Serial</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="detalle_correo" name="detalle_correo" placeholder="">
                                <label for="detalle_correo">Correo de Cliente</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_entrega" name="detalle_entrega" placeholder="">
                                <label for="detalle_entrega">Fecha de Creacion</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_vencimiento" name="detalle_vencimiento" placeholder="">
                                <label for="detalle_vencimiento">Fecha de Vencimiento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_estado" name="detalle_estado" placeholder="">
                                <label for="detalle_estado">Estado</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="detalle_titulo" name="detalle_titulo" placeholder="">
                                <label for="detalle_titulo">Titulo</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Agrega el comentario aquí" id="detalle_descripcion" name="detalle_descripcion" style="height: 278px;"></textarea>
                                <label for="detalle_descripcion">Descripcion</label>
                            </div>
                        </div>
                        <!-- Pie del Modal -->
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Modal End -->

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
    <script type="text/JavaScript" src="consultaClientes.js"></script>
</body>

</html>
