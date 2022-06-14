<?php
    include("conexionBD.php");

	error_reporting(0);
    ini_set('display_errors', '1');

    if ($connection) {
    
    session_start();//Iniciamos la sesion

    if(isset($_POST['codigo1'])) {//Comprobamos si tenemos el valor de codigo que recibimos por post
        $codigo1 = $_POST['codigo1']; 
        $codigo2 = $_SESSION['codigoPass'];
        $id = $_POST['id'];
        $email = $_POST['email'];

        if($codigo1 == $codigo2) {//Comprobamos si el codigo generado es el mismo que el que ha introducido el usuario

?>

<html>
    <head>
    </head>
    <body onLoad=cargar_pagina()>
    <script language=Javascript>
        function cargar_pagina(){
            formulario1.action='cambiar-pass-olvidarC.php';
            formulario1.submit();
        }
    </script>
    <form method="POST" name="formulario1">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
    </form>
    </body>
</html>

<?php
    } else {
?>

<html>
    <head>
    </head>
    <body onLoad=cargar_pagina()>
    <script language=Javascript>
        function cargar_pagina(){
            formulario1.action='error-olvidarC.php';
            formulario1.submit();
        }
    </script>
    <form method="POST" name="formulario1">
        <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
        <input type="hidden" id="email" name="email" value="<?php echo $email;?>">
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