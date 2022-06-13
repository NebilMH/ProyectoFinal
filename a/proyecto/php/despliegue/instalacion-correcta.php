<?php  
if (isset($_POST['bd'])) {
    $bd = $_POST['bd'];
    $usuarioBD = $_POST['usuarioBD'];
    $contraseniaBD = $_POST['contraseniaBD'];
    
    putenv("BBDD=$bd");
    putenv("USERDB=$usuarioBD");
    putenv("PASSDB=$contraseniaBD");
    putenv("DATOS=".$bd.".sql");
    $output = exec('instalador.sh');
?>

<!doctype html>
    <html lang="en">
        <head>
        <title>Nabil Messaoudi Hammu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../login/css/style.css">
        <link rel="stylesheet" href="../../css/estilosLogin.css">

        <!-- Estilos Darkmode -->
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../css/estilos-boton-sl.css">

        </head>
        <body>
        <section class="ftco-section" style="padding: 3.2em 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-5">
                        <div class="wrap">
                            <div class="img" style="background-image: url(../../images/fondo3.png);"></div>
                                <div class="login-wrap p-4 p-md-5">
                                    <div class="d-flex">
                                        <div class="w-100">
                                            <h3 class="mb-4">La configuracion se ha llevado a cabo correctamente</h3>	
                                            <p>Establezca sus credenciales de administrador:</p>
                                            <form action="crearSql.php" method="POST">
                                                <input type="hidden" name="bd" value="<?php echo $_POST['bd']?>">
                                                <a href="crearSql.php"><button style="font-size: 1.1rem;font-weight: bold;color:black;background-color:teal;" type="button" class="form-control btn rounded submit px-3">Establecer</button></a>
                                            </form>
                                    </div>
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="../../login/js/jquery.min.js"></script>
        <script src="../../login/js/bootstrap.min.js"></script>
        <script src="../../login/js/main.js"></script>
        <script src="../../js/main-boton.js"></script>
        </body>
    </html>
<?php 
} else {
    header("Location: instalador.php");
}
?>