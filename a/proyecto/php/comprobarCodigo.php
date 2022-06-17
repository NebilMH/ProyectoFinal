<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {
    
    session_start();//Iniciamos la sesion

    if(isset($_SESSION['codigo'])) {//Comprobamos si tenemos el valor de la sesion de codigo
        $codigo = $_SESSION['codigo'];
        $codigo2 = $connection->real_escape_string($_POST['codigo2']); 
        $nombre = $connection->real_escape_string($_POST['nombre']); 
        $apellido = $connection->real_escape_string($_POST['apellido']);
        $email = $connection->real_escape_string($_POST['email']);
        $usuario = $connection->real_escape_string($_POST['usuario']);
        $contrasenia = $connection->real_escape_string($_POST['contrasenia']);
        $hash = password_hash($contrasenia, PASSWORD_BCRYPT);

        if($codigo == $codigo2) {//Comprobamos si el codigo generado es el mismo que el que ha introducido el usuario
            $query = "INSERT INTO usuarios (id_rol, nombre, apellido, email, usuario, contrasenia)
            VALUES ('2', '$nombre', '$apellido', '$email', '$usuario', '$hash')";
            $result = mysqli_query($connection, $query);
            
            if (!$result) {
                die('Consulta fallida.');
            }
            //echo "Codigo correcto, usuario añadido correctamente";
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
                                            <h3 class="mb-4" style="color:green;font-weight:bold">Codigo correcto</h3>
                                            <h4 class="mb-4">Cuenta creada correctamente</h4>
                                        </div>
                                    </div>
                                    <button type="submit" ONCLICK="window.location.href= '../index.php'" class="form-control btn rounded submit px-3">Aceptar</button>
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
        /*echo "<script type='text/javascript'>
            window.location.href = 'error-codigo.php?codigo=$codigo2&nombre=$nombre&apellido=$apellido&email=$email&usuario=$usuario&contrasenia=$contrasenia';
        </script>";*/
?>    

<html>
    <head>
    </head>
    <body onLoad=cargar_pagina()>
    <script language=Javascript>
        function cargar_pagina(){
            formulario1.action='error-codigo.php';
            formulario1.submit();
        }
    </script>
    <form method="POST" name="formulario1">
		<input type="hidden" name="nombre" value="<?php echo $nombre;?>">
		<input type="hidden" name="apellido" value="<?php echo $apellido;?>">
		<input type="hidden" name="email" value="<?php echo $email;?>">
		<input type="hidden" name="usuario" value="<?php echo $usuario;?>">
		<input type="hidden" name="contrasenia" value="<?php echo $contrasenia;?>">
    </form>
    </body>
    </html>

<?php
        }
    }
        mysqli_close($connection);
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>
