<?php  
if (isset($_POST['bd'])) {
    $bd = $_POST['bd'];
    $usuarioBD = $_POST['usuarioBD'];
    $contraseniaBD = $_POST['contraseniaBD'];
    
    putenv("BBDD=$bd");
    putenv("USERDB=$usuario");
    putenv("PASSDB=$contrasenia");
    $output = exec('instalador.sh');

    try {
        shell_exec("/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh");
    } catch (\Throwable $th){
        throw $th;
    }
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
                <h3 class="mb-4">Instalación exitosa!</h3>	
                    <p>Establezca sus credenciales de administrador:</p>
                </div>
                </div>         
                    <form action="setAdmin.php" method="POST">
                        <input name="bd" type="hidden" value="<?php echo $bd?>">
                        <input name="usuarioBD" type="hidden" value="<?php echo $usuarioBD?>">
                        <input name="contraseniaBD" type="hidden" value="<?php echo $contraseniaBD?>">
                        <div class="form-group mt-6">
                            <label for="usuario" style="color:black;">Usuario:</label>
                            <input name="adminuser" id="usuario" type="text" placeholder="Email" class="form-control">
                        </div>
                        
                        <div class="form-group mt-5">
                            <label for="email" style="color:black;">Contraseña:</label>
                            <input name="adminpass" id="email" type="text" placeholder="Contraseña" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <a href="../../php/login.php"><button style="font-size: 1.1rem;font-weight: bold;color:black;background-color:yellow;" type="button" class="form-control btn rounded submit px-3">Confirmar</button></a>
                        </div>
                    </form>
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