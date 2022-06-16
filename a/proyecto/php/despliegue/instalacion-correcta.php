<?php  

session_start();

if (isset($_SESSION['bd'])) {
    $bd = $_SESSION['bd'];
    $usuarioBD = $_SESSION['usuarioBD'];
    $contraseniaBD = $_SESSION['contraseniaBD'];
    $archivoSql = $bd.".sql";

    $nombreArchivo = "".$bd.".sql";
    $nombreArchivo2 = $nombreArchivo;
    $nuevoArchivo = fopen($nombreArchivo2, 'w');
    
    $codigo = "
    SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
    START TRANSACTION;
    SET time_zone = \"+00:00\";
    
    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
    /*!40101 SET NAMES utf8mb4 */;

    CREATE DATABASE IF NOT EXISTS `".$_SESSION['bd']."` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    USE `".$_SESSION['bd']."`;
    
    CREATE TABLE IF NOT EXISTS `ejercicios` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `urlP` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
        `urlV` varchar(250) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        `imagen` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
        `titulo` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
        `descripcion` varchar(254) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
    
    INSERT INTO `ejercicios` (`id`, `urlP`, `urlV`, `imagen`, `titulo`, `descripcion`) VALUES
    (1, 'abdominales.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/RPfxeHWm8Oo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'abdominales_.jpg', 'Abdominales', 'Los abdominales son uno de los ejercicios más populares para fortalecer el vientre sin ayuda de máquinas. En pocas palabras, consisten en pasar de una posición tumbada a una sentada al llevar el pecho hacia los muslos. Este movimiento lo podemos realizar'),
    (2, 'biceps.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/h5gE3xzn_qw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'biceps_.jpg', 'Biceps', 'Curl de bíceps son los ejercicios que implican la ejercitación de dicho músculo. Como el bíceps trabaja en el giro de muñeca o contracción del brazo, es fácil inducir que los diferentes tipos de curls incluyan flexiones de brazos así como giros de muñeca'),
    (3, 'triceps.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/hTPkT1pZpdk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'triceps_.jpg', 'Triceps', 'El músculo tríceps braquial es un músculo de tres cabezas (tri-tres cep-cabeza) ubicado en la región del brazo. Corresponde al único constituyente del grupo muscular posterior de la región braquial, y se extiende a lo largo de casi toda la extensión long'),
    (4, 'teres.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/GWm0KUm65bY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'teres_.jpg', 'Teres', 'El músculo teres mayor viene de la escápula/paleta del hombro (parte principal de la paleta). Se produce al hacer el centro de paleta. Las fibras musculares de este pequeño corte cónico corren paralelas al eje largo de este músculo.'),
    (5, 'trapecio.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/Jr-ZOAJNKCs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'trapecio_.jpg', 'Trapecio', 'El trapecio es uno de los músculos de la espalda superior. Es un músculo triangular grande que va desde el hueso occipital en el cráneo hasta el final de la columna torácica en la espalda. Se extiende a lo ancho de los hombros. El músculo se divide en tr'),
    (6, 'isquiotibiales.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/gH-WCTYu9EY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'isquiotibiales_.jpg', 'Isquiotibiales', 'Hay tres músculos que bajan por la parte posterior de la pierna, desde el muslo hasta la rodilla (el bíceps femoral, el semitendinoso y el semimembranoso) que ayudan flexionar la rodilla y a extender la cadera. Conjuntamente, todos ellos \r\nreciben el nom'),
    (7, 'hombro.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/dQ10KZTZu5E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'hombro_.jpg', 'Hombro', 'El hombro, un músculo con un gran atractivo que supone la guinda de un tren superior musculado. \r\nAunque es un músculo muy trabajado en los gimnasios hay que tener en cuenta una serie de cosas para sacarles el máximo partido entrenándolos, así que de est'),
    (8, 'pectorales.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/3IwHoFNQUo8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'pectoral_.jpg', 'Pectorales', 'Los pectorales son dos músculos de la zona anterior del tórax, llamados pectoral mayor y menor por su localización y tamaño. Ambos son planos y con forma triangular, pero el mayor es más ancho que el otro. En cuanto a la acción muscular, uno se encarga d'),
    (9, 'dorsales.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/HTsfl9wzOu0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'dorsales_.jpg', 'Dorsales', 'El dorsal ancho (lattissimus dorsi), es un músculo grande ancho y aplanado que recubre la parte posterior del tronco extendiéndose desde la región lumbar hasta el húmero. Es un músculo potente que interviene en muchas acciones deportivas y frecuentemente'),
    (10, 'gemelos.php', '<iframe width=\"1000\" height=\"510\" src=\"https://www.youtube.com/embed/vbGkMjtQmD4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'gemelos_.jpg', 'Gemelos', 'El gemelo es un músculo biarticular ya que su trayecto atraviesa dos articulaciones, la de la rodilla y el tobillo. Su función sobre la rodilla es estabilizar el fémur, para evitar que haya un desequilibrio hacía adelante en los movimientos de flexión.');
    
    CREATE TABLE IF NOT EXISTS `facturas` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_usuario` int(11) NOT NULL,
        `id_producto` int(11) NOT NULL,
        `producto` varchar(150) NOT NULL,
        `precio` varchar(50) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `FK_usuario` (`id_usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
    
    CREATE TABLE IF NOT EXISTS `productos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `seccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
        `nombre_producto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
        `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        `imagen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
        `precio` double NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
    
    INSERT INTO `productos` (`id`, `seccion`, `nombre_producto`, `descripcion`, `imagen`, `precio`) VALUES
    (1, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto53.png', 21.95),
    (2, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto52.png', 21.95),
    (3, 'packs', 'Egg White Protein', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto48.png', 29.99),
    (4, 'packs', 'Pack - Shaker + Proteina', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto47.png', 39.99),
    (5, 'packs', 'Keep Hammering', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto30.png', 31.99),
    (6, 'packs', 'Ammo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto27.png', 19.99),
    (7, 'shakers', 'Shaker Blanco', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto60.png', 14.95),
    (8, 'shakers', 'Shaker Rojo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto59.png', 14.95),
    (9, 'shakers', 'Shaker Azul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto58.png', 14.95),
    (10, 'shakers', 'Shaker Negro + Naranja', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto57.png', 14.95),
    (11, 'barritas', 'Peanut Butter Bliss', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto44.png', 35.95),
    (12, 'barritas', 'Triple Chocolate Mudslide', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto43.png', 35.95),
    (13, 'barritas', 'Conquer Caramel Crunch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto26.png', 35.95),
    (14, 'nuevos', 'Energy And Focus - Blue Raspbe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto42.png', 25.99),
    (15, 'nuevos', 'Energy And Focus - Pineapple', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto41.png', 29.95),
    (16, 'nuevos', 'Energy And Focus - Peach', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto40.png', 29.95),
    (17, 'nuevos', 'Biotics Watermelon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto54.png', 9.99),
    (18, 'ultimos', 'Biotics Blue Raspberry', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto55.png', 9.99),
    (19, 'ultimos', 'Energy Focus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto51.png', 9.95),
    (20, 'ultimos', 'Green Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto23.png', 29.99),
    (21, 'ultimos', 'Blue Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto24.png', 29.99),
    (22, 'barritas', 'Frosted Cinnamon Swirl', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto45.png', 35.95);
    
    CREATE TABLE IF NOT EXISTS `soporte` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_usuario` int(11) NOT NULL,
        `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `asunto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `mensaje` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
        PRIMARY KEY (`id`),
        KEY `fk_Usuario_Soporte` (`id_usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
    
    CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `id_rol` int(11) NOT NULL,
        `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `apellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
        `usuario` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
        `contrasenia` varchar(254) COLLATE utf8mb4_spanish_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
    
    ALTER TABLE `facturas`
        ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

    ALTER TABLE `soporte`
        ADD CONSTRAINT `fk_Usuario_Soporte` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    COMMIT;
    
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    
    fwrite($nuevoArchivo,$codigo);
    fclose($nuevoArchivo);

    $nombreArchivo2 = "conexionBD.php";
    $nombreArchivo3 = $nombreArchivo2;
    $nuevoArchivo4 = fopen("../$nombreArchivo3", 'w');
    
    $codigo5 = "
        <?php
            \$connection = mysqli_connect(
                'localhost', '$usuarioBD', '$contraseniaBD', '".$_SESSION['bd']."'
            );
        ?>";

    fwrite($nuevoArchivo4,$codigo5);
    fclose($nuevoArchivo4);

    putenv("BBDD=$bd");
    putenv("USERDB=$usuarioBD");
    putenv("PASSDB=$contraseniaBD");
    putenv("DATOS=$archivoSql");
    $output = exec('/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh');
    shell_exec("/var/www/html/ProyectoFinal/a/proyecto/php/despliegue/instalador.sh");
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
        <section class="ftco-section" style="padding: 3.5em 0;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(../../images/fondo3.png);"></div>
						<div class="login-wrap p-4 p-md-5">
			<div class="d-flex">
			<div class="w-100">
			<h3 class="mb-4">Instalacion exitosa!</h3>	
			<p>Establezca sus credenciales de administrador</p>
			</div>
			</div>
                <form action="setAdmin.php" method="post" class="signin-form">
                    <div class="form-group mt-5">
                        <label for="email" style="color:black;">Usuario:</label>
                        <input name="adminuser" id="email" type="text" placeholder="Usuario" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password-field" style="color:black;">Contraseña:</label>
                        <input name="adminpass" id="password-field" type="text" placeholder="Contraseña" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button  style="font-size: 1.1rem;font-weight: bold;color:black;background-color:yellow;" type="submit" class="form-control btn rounded submit px-3">Confirmar</button>
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
    header("Location: index-instalador.php");
}
?>
