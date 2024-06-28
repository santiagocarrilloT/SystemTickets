<?php
    require_once("config/conexion.php");
    if(isset($_POST['enviar']) and $_POST['enviar'] == 'si'){
        require_once("models/Cliente.php");
        $cliente = new Cliente();
        $cliente->loginCliente();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
        
        <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <form class="sing-box" action="" method="post" id="login_form">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h4 class="text-primary"><i class="fa fa-user-edit me-2"></i>TickFast</h4>
                                </a>
                                <h5>Iniciar Sesion</h5>
                            </div>

                            <?php
                                if(isset($_GET['m'])){
                                    switch ($_GET['m']) {
                                        case '1':
                                            echo '<div class="alert alert-danger" role="alert">Correo incorrecto</div>';
                                            break;
                                        case '2':
                                            echo '<div class="alert alert-danger" role="alert">Llenar el campo</div>';
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            ?>

                            <div class="form-floating mb-3">
                                <input type="email" id="email_user" name= "email_user" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Correo cliente</label>
                            </div>

                            <input type="hidden" name="enviar" class="form-control" value="si">
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Iniciar Sesion</button>
                            <div class="text-center mb-0">
                                <div class="btn-group" role="group">
                        
                                <a type="button" class="btn btn-outline-primary" href="indexCliente.php">Cliente</a>
                                <a type="button" class="btn btn-outline-primary" href="index.php">Empleado</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </form>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/lib/chart/chart.min.js"></script>
    <script src="public/lib/easing/easing.min.js"></script>
    <script src="public/lib/waypoints/waypoints.min.js"></script>
    <script src="public/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="public/lib/tempusdominus/js/moment.min.js"></script>
    <script src="public/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="public/js/main.js"></script>
    
</body>
</html>