<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

if ($connection) {

    $email = $connection->real_escape_string($_POST['email']);

    $query = "SELECT * FROM usuarios WHERE email='$email'";//Comprobamos si el correo existe
    $result = mysqli_query($connection, $query);
    
    if(mysqli_fetch_row($result) == 0) { //Si el correo no existe mostramos error
?>
<!doctype html>
    <html lang="es">
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
                                            <h4 class="mb-4">Este email no existe</h4>			
                                        </div>
                                    </div>
                                    <button type="submit" ONCLICK="window.location.href= 'olvidar-contrasenia.php'" class="form-control btn rounded submit px-3">Volver a intentar</button>
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
} else { //Si el correo existe enviamos un correo al usuario con el codigo de verificacion
    require '../mail-sender/vendor/autoload.php';

    $mail = new PHPMailer(true);

    function generateRandomString($length = 10) { //Generamos un codigo aleatorio que enviaremos al usuario por gmail
        return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }

    $codigo = generateRandomString($length = 10);

    $_SESSION['codigoPass'] = $codigo;

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'test.email.nebil@gmail.com';
        $mail->Password = 'acapaapuksevsvuf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 25;

        $mail->setFrom('test.email.nebil@gmail.com', 'Gym Contigo');
        $mail->addAddress($email, 'Receptor');//La variable email hace referencia al correo que ha introducido el usuario para que se le pueda enviar el correo

        $mail->isHTML(true);
        $mail->Subject = 'Verificacion de cambio de credenciales';
        $mail->Body = "Tu codigo para cambiar la clave es: $codigo";
        $mail->send();

        /*echo "<script type='text/javascript'>
                window.location.href = 'verificacion.php?codigo=$codigo&nombre=$nombre&apellido=$apellido&email=$email&usuario=$usuario&contrasenia=$contrasenia';
            </script>
        ";*/

        //header ("Location: verificacion.php?codigo=$codigo&nombre=$nombre&apellido=$apellido&email=$email&usuario=$usuario&contrasenia=$contrasenia"); 
        //exit;
?>
    <!--Una vez generado el codigo vamos a comprobar que el codigo es correcto redirigiendonos al verificar-codigo-olvidarC y pasandole los datos necesario-->
    <html>
    <head>
    </head>
    <body onLoad=cargar_pagina()>
    <script language=Javascript>
        function cargar_pagina(){
            formulario.action='verificar-codigo-olvidarC.php';
            formulario.submit();
        }
    </script>
    <form method="POST" name="formulario">
        <input type="hidden" name="email" value="<?php echo $email;?>">
    </form>
    </body>
    </html>
<?php
    } catch (Exception $e) {
        echo 'Mensaje ' . $mail->ErrorInfo;
    }
?>
    
<?php   
}
mysqli_close($connection);
?>
<?php
    } else {
        header("Location: despliegue/index-instalador.php");
    }
?>