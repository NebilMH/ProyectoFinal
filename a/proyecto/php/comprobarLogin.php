<?php
    session_start();//Iniciamos la sesion y la destruimo para comprobar que no hay ninguna sesion abierta
    session_destroy();  
?>

<?php
    include('conexionBD.php');
    
    if(isset($_POST['invitado'])) { //Comprobamos si tenemos la sesion de invitado
        session_start();
        $invitado = $_POST['invitado'];
        $_SESSION['invitado'] = $invitado;
        header("refresh:0;url=../index.php");//En su caso redirige a pagina principal
        exit;
        
    } else {//Si no tenemos la sesion de invitado ejecutamos lo de abajo

    //Filtramos los datos que nos envia el formulario para evitar inyeccion sql
    $email = $connection->real_escape_string($_POST['email']);
    $contraseña = $connection->real_escape_string($_POST['contraseña']);

    if (isset($_POST['email'])){
        session_start();

        $query = "SELECT * FROM usuarios WHERE email='$email'";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result)){

        if (password_verify($contraseña, $row['contraseña'])) { //Daba error porque en la base de datos estaba varchar(20) y el hash generado es mucho mas largo

        $_SESSION['email'] = $email;
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['id'] = $row['id'];

        if($row['id_rol'] == '2'){ //Si los credenciales son correctos redirige a parina principal
            $_SESSION['id_rol'] = "2";
            header("refresh:0;url=../index.php");
            exit;

        } else if($row['id_rol'] == '1') {//Si el usuario es administrador redirige al panel de administracion
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id_rol'] = "1";
            header("Location: admin-usuarios.php");
        } else {
    //} else if($invitado) {
  //Si no son correctos o no existen, mostramos error
?>
<!doctype html>
    <html lang="en">
        <head>
        <title>Nabil Messaoudi Hammu</title>
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
                                            <ul class="list">
                                                <div>
                                                    <button class="switch" id="switch">
                                                        <span><i class="fas fa-sun"></i></span>
                                                        <span><i class="fas fa-moon"></i></span>
                                                    </button>
                                                </div>
                                            </ul>
                                            <h4 class="mb-4">Credenciales incorrectos</h4>			
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

    ?>

<!doctype html>
    <html lang="en">
        <head>
        <title>Nabil Messaoudi Hammu</title>
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
                                            <ul class="list">
                                                <div>
                                                    <button class="switch" id="switch">
                                                        <span><i class="fas fa-sun"></i></span>
                                                        <span><i class="fas fa-moon"></i></span>
                                                    </button>
                                                </div>
                                            </ul>
                                            <h4 class="mb-4">Credenciales incorrectos</h4>		
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
}}
}    
mysqli_close($connection); 
?>
