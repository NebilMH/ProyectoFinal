<?php
    include('conexionBD.php');

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre']; 
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        if($nombre && $apellido && $email && $usuario && $contraseña){
            $query = "UPDATE usuarios SET nombre= '$nombre', apellido= '$apellido', email= '$email', usuario= '$usuario', contraseña= '$contraseña' WHERE id= '$id'"; 
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die('Consulta fallida.');
            }
            //echo "Usuario editado correctamente";
            //header("refresh:0;url=admin-usuarios.php");
?>

<?php

    $query="SELECT * FROM usuarios WHERE id='$id'"; 

    $resultado = mysqli_query($connection, $query) or die ('Error en el query database');

    if(!$resultado) {
        die('Query Failed'. mysqli_error($connection));
    }

    //Valida que la consulta esté bien hecha
    if($resultado){
        //Ahora valida que la consuta haya traido registros
        if( mysqli_num_rows( $resultado ) > 0){
            //Mientras mysqli_fetch_array devuelva algo, lo agregamos a una variable temporal
            while($row = mysqli_fetch_array( $resultado ) ){
        
            //Ahora $row tiene la primera fila de la consulta, pongamos que tienes
            //un campo en tu DB llamado NOMBRE, así accederías
            
?>
<!DOCTYPE html>
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
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../images/fondo.jpg);"></div>
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
			                            <h3 class="mb-4">Editar datos</h3>		
			                        </div>
			                    </div>
                                    <h4>Datos editados correctamente</h4>
                                    <form action="perfil-usuario.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                        <div class="form-group">
                                            <button type="submit" class="form-control btn rounded submit px-3">Volver al perfil</button>
                                        </div>
                                    </form>
                                    
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
?>

<?php
        } else {
            header("refresh:0;url=admin-usuarios.php");
        }
    }
    mysqli_close($connection); 
?>
