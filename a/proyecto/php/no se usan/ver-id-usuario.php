<!-- <?php
    /* include('conexionBD.php');

	$email = $connection->real_escape_string($_POST['email']);
    $contrasenia = $connection->real_escape_string($_POST['contrasenia']);

    $query="SELECT * FROM usuarios WHERE email='$email' and contrasenia='$contrasenia'"; 

    $resultado = mysqli_query($connection, $query) or die ('Error en el query database'); */

    /* if(!$resultado) {
        die('Query Failed'. mysqli_error($connection)); */
   /*  } else  */{ //Valida que la consulta esté bien hecha

        //Ahora valida que la consuta haya traido registros
        /* if( mysqli_num_rows($resultado) > 0){ */
            //Mientras mysqli_fetch_array devuelva algo, lo agregamos a una variable temporal
?>
    <html>
        <head>
        </head>
        <body onLoad=cargar_pagina()>
        <script language=Javascript>
            function cargar_pagina(){
                formulario.action='comprobarLogin.php';
                formulario.submit();
            }
        </script>
        <form method="POST" name="formulario">
            <input type="hidden" name="email" value="<?php /* echo $_POST["email"]; */?>">
            <input type="hidden" name="contrasenia" value="<?php /* echo $_POST["contrasenia"]; */?>">
        </form>
        </body>
    </html>
<?php 
        /* } else { */
?> 

<html>
        <head>
        </head>
        <body onLoad=cargar_pagina()>
        <script language=Javascript>
            function cargar_pagina(){
                formulario.action='comprobarLogin.php';
                formulario.submit();
            }
        </script>
        <form method="POST" name="formulario">
            <input type="hidden" name="email" value="<?php /* echo $_POST["email"]; */?>">
            <input type="hidden" name="contrasenia" value="<?php /* echo $_POST["contrasenia"]; */?>">
        </form>
        </body>
    </html>
<?php
    }    
/* } */
/* mysqli_close($connection); */
?> -->