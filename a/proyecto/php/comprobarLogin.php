<?php
    session_start();//Iniciamos la sesion y la destruimo para comprobar que no hay ninguna sesion abierta
    session_destroy();  
?>

<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {
    
    session_start();

    if(isset($_POST['invitado'])) { //Comprobamos si tenemos la sesion de invitado
        $invitado = $_POST['invitado'];
        $_SESSION['invitado'] = $invitado;
        echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";//En su caso redirige a pagina principal
        
    } else {//Si no tenemos la sesion de invitado ejecutamos lo de abajo

    //Filtramos los datos que nos envia el formulario para evitar inyeccion sql
    $email = $connection->real_escape_string($_POST['email']);
    $contrasenia = $connection->real_escape_string($_POST['contrasenia']);

    if (isset($_POST['email'])){
        $query = "SELECT * FROM usuarios WHERE email='$email'";
        $result = mysqli_query($connection, $query);

        if(mysqli_fetch_row($result) == 0){
            ?>
                <!doctype html>
                <html lang="en">
                    <head>
                    <!--<title>Nabil Messaoudi Hammu</title>-->
                    <title>Gym Contigo</title>
                    <link rel="icon" type="image/x-icon" href="../images/favicon3.png">
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                    <link rel="stylesheet" href="../login/css/style.css">
                    <link rel="stylesheet" href="../css/estilosLogin.css">

                    <!-- Estilos Darkmode -->
                    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="../css/estilos-boton-sl.css">

                    </head>
                    <body>
                    <section class="ftco-section">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div id="cajaBlanca" class="col-md-7 col-lg-5">
                                    <div class="wrap">
                                            <div class="login-wrap p-4 p-md-5">
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                        <h4 class="mb-4">Credenciales incorrectos 1</h4>
                                                    </div>
                                                </div>
                                                <button type="submit" ONCLICK="window.location.href= 'login.php'" class="form-control btn rounded submit px-3">Volver a intentar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script src="../login/js/jquery.min.js"></script>
                    <script src="../login/js/bootstrap.min.js"></script>
                    <script src="../login/js/main.js"></script>
                    <script src="../js/main-boton.js"></script>
                    </body>
                </html>
            <?php
        } else {
            $query = "SELECT * FROM usuarios WHERE email='$email'";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($result)){
                if (password_verify($contrasenia, $row['contrasenia'])) { //Daba error porque en la base de datos estaba varchar(20) y el hash generado es mucho mas largo
                    $_SESSION['email'] = $email;
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['id'] = $row['id'];

                    if($row['id_rol'] == '2'){ //Si los credenciales son correctos redirige a parina principal
                        $_SESSION['id_rol'] = "2";
                        echo "<script type='text/javascript'>window.location.href = '../index.php';</script>";

                    } else if($row['id_rol'] == '1') {//Si el usuario es administrador redirige al panel de administracion
                        $_SESSION['usuario'] = $row['usuario'];
                        $_SESSION['id_rol'] = "1";
                        echo "<script type='text/javascript'>window.location.href = 'admin-usuarios.php';</script>";
                    } 
                } else {
                    ?>
                        <!doctype html>
                        <html lang="en">
                            <head>
                            <!--<title>Nabil Messaoudi Hammu</title>-->
                            <title>Gym Contigo</title>
                            <link rel="icon" type="image/x-icon" href="../images/favicon3.png">
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                            <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                            <link rel="stylesheet" href="../login/css/style.css">
                            <link rel="stylesheet" href="../css/estilosLogin.css">

                            <!-- Estilos Darkmode -->
                            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
                            <link rel="stylesheet" href="../css/estilos-boton-sl.css">

                            </head>
                            <body>
                            <section class="ftco-section">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div id="cajaBlanca" class="col-md-7 col-lg-5">
                                            <div class="wrap">
                                                    <div class="login-wrap p-4 p-md-5">
                                                        <div class="d-flex">
                                                            <div class="w-100">
                                                                <h4 class="mb-4">Credenciales incorrectos 2</h4>		
                                                            </div>
                                                        </div>
                                                        <button type="submit" ONCLICK="window.location.href= 'login.php'" class="form-control btn rounded submit px-3">Volver a intentar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <script src="../login/js/jquery.min.js"></script>
                            <script src="../login/js/bootstrap.min.js"></script>
                            <script src="../login/js/main.js"></script>
                            <script src="../js/main-boton.js"></script>
                            </body>
                        </html>
                    <?php
                }
            }
        }
    } else {
        echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
    }
}    
mysqli_close($connection); 
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>