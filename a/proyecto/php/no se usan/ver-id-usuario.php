<!-- <?php
    /* include('conexionBD.php');

	$email = $connection->real_escape_string($_POST['email']);
    $contraseña = $connection->real_escape_string($_POST['contraseña']);

    $query="SELECT * FROM usuarios WHERE email='$email' and contraseña='$contraseña'"; 

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
            <input type="hidden" name="contraseña" value="<?php /* echo $_POST["contraseña"]; */?>">
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
            <input type="hidden" name="contraseña" value="<?php /* echo $_POST["contraseña"]; */?>">
        </form>
        </body>
    </html>
<?php
    }    
/* } */
/* mysqli_close($connection); */
?> -->