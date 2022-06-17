
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
    START TRANSACTION;
    SET time_zone = "+00:00";

    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
    /*!40101 SET NAMES utf8mb4 */;

    CREATE DATABASE IF NOT EXISTS `prueba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
    USE `prueba`;

    CREATE TABLE IF NOT EXISTS `ejercicios` (
        `id` int NOT NULL AUTO_INCREMENT,
        `urlP` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `urlV` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        `imagen` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `titulo` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `descripcion` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

    TRUNCATE TABLE `ejercicios`;
    INSERT INTO `ejercicios` (`id`, `urlP`, `urlV`, `imagen`, `titulo`, `descripcion`) VALUES
    (1, 'abdominales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/RPfxeHWm8Oo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'abdominales_.jpg', 'Abdominales', 'Los abdominales son uno de los ejercicios más populares para fortalecer el vientre sin ayuda de máquinas. En pocas palabras, consisten en pasar de una posición tumbada a una sentada al llevar el pecho hacia los muslos. Este movimiento lo podemos realizar'),
    (2, 'biceps.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/h5gE3xzn_qw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'biceps_.jpg', 'Biceps', 'Curl de bíceps son los ejercicios que implican la ejercitación de dicho músculo. Como el bíceps trabaja en el giro de muñeca o contracción del brazo, es fácil inducir que los diferentes tipos de curls incluyan flexiones de brazos así como giros de muñeca'),
    (3, 'triceps.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/hTPkT1pZpdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'triceps_.jpg', 'Triceps', 'El músculo tríceps braquial es un músculo de tres cabezas (tri-tres cep-cabeza) ubicado en la región del brazo. Corresponde al único constituyente del grupo muscular posterior de la región braquial, y se extiende a lo largo de casi toda la extensión long'),
    (4, 'teres.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/GWm0KUm65bY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'teres_.jpg', 'Teres', 'El músculo teres mayor viene de la escápula/paleta del hombro (parte principal de la paleta). Se produce al hacer el centro de paleta. Las fibras musculares de este pequeño corte cónico corren paralelas al eje largo de este músculo.'),
    (5, 'trapecio.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/Jr-ZOAJNKCs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'trapecio_.jpg', 'Trapecio', 'El trapecio es uno de los músculos de la espalda superior. Es un músculo triangular grande que va desde el hueso occipital en el cráneo hasta el final de la columna torácica en la espalda. Se extiende a lo ancho de los hombros. El músculo se divide en tr'),
    (6, 'isquiotibiales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/gH-WCTYu9EY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'isquiotibiales_.jpg', 'Isquiotibiales', 'Hay tres músculos que bajan por la parte posterior de la pierna, desde el muslo hasta la rodilla (el bíceps femoral, el semitendinoso y el semimembranoso) que ayudan flexionar la rodilla y a extender la cadera. Conjuntamente, todos ellos 
reciben el nom'),
    (7, 'hombro.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/dQ10KZTZu5E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'hombro_.jpg', 'Hombro', 'El hombro, un músculo con un gran atractivo que supone la guinda de un tren superior musculado. 
Aunque es un músculo muy trabajado en los gimnasios hay que tener en cuenta una serie de cosas para sacarles el máximo partido entrenándolos, así que de est'),
    (8, 'pectorales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/3IwHoFNQUo8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'pectoral_.jpg', 'Pectorales', 'Los pectorales son dos músculos de la zona anterior del tórax, llamados pectoral mayor y menor por su localización y tamaño. Ambos son planos y con forma triangular, pero el mayor es más ancho que el otro. En cuanto a la acción muscular, uno se encarga d'),
    (9, 'dorsales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/HTsfl9wzOu0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'dorsales_.jpg', 'Dorsales', 'El dorsal ancho (lattissimus dorsi), es un músculo grande ancho y aplanado que recubre la parte posterior del tronco extendiéndose desde la región lumbar hasta el húmero. Es un músculo potente que interviene en muchas acciones deportivas y frecuentemente'),
    (10, 'gemelos.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/vbGkMjtQmD4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'gemelos_.jpg', 'Gemelos', 'El gemelo es un músculo biarticular ya que su trayecto atraviesa dos articulaciones, la de la rodilla y el tobillo. Su función sobre la rodilla es estabilizar el fémur, para evitar que haya un desequilibrio hacía adelante en los movimientos de flexión.');

    CREATE TABLE IF NOT EXISTS `facturas` (
        `id` int NOT NULL AUTO_INCREMENT,
        `id_usuario` int NOT NULL,
        `id_producto` int NOT NULL,
        `codigo_pedido` int NOT NULL,
        `producto` varchar(150) NOT NULL,
        `precio` varchar(50) NOT NULL,
        `fecha_compra` varchar(150) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `FK_usuario` (`id_usuario`),
        KEY `id_producto` (`id_producto`)
    ) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

    TRUNCATE TABLE `facturas`;
    INSERT INTO `facturas` (`id`, `id_usuario`, `id_producto`, `codigo_pedido`, `producto`, `precio`, `fecha_compra`) VALUES
    (28, 2, 5, 1, 'Keep Hammering', '31.99', '2022-06-17'),
    (29, 2, 10, 1, 'Shaker Negro + Naranja', '14.95', '2022-06-17'),
    (30, 2, 5, 2, 'Keep Hammering', '31.99', '2022-06-17'),
    (31, 2, 10, 2, 'Shaker Negro + Naranja', '14.95', '2022-06-17'),
    (32, 2, 3, 2, 'Egg White Protein', '29.99', '2022-06-17'),
    (33, 2, 2, 2, 'Pack - Shaker', '21.95', '2022-06-17'),
    (34, 2, 11, 2, 'Peanut Butter Bliss', '35.95', '2022-06-17'),
    (35, 3, 2, 1, 'Pack - Shaker', '21.95', '2022-06-17'),
    (36, 3, 15, 3, 'Energy And Focus - Pineapple', '29.95', '2022-06-17');

    CREATE TABLE IF NOT EXISTS `favoritos` (
        `id` int NOT NULL AUTO_INCREMENT,
        `id_usuario` int NOT NULL,
        `imagen` varchar(150) NOT NULL,
        `nombre_producto` varchar(150) NOT NULL,
        `precio` double NOT NULL,
        PRIMARY KEY (`id`),
        KEY `id_usuario` (`id_usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

    TRUNCATE TABLE `favoritos`;
    INSERT INTO `favoritos` (`id`, `id_usuario`, `imagen`, `nombre_producto`, `precio`) VALUES
    (1, 2, '../images/productos/producto23.png', 'Green Yeti', 29.99),
    (2, 2, '../images/productos/producto51.png', 'Energy Focus', 9.95),
    (3, 3, '../images/productos/producto24.png', 'Blue Yeti', 29.99);

    CREATE TABLE IF NOT EXISTS `productos` (
        `id` int NOT NULL AUTO_INCREMENT,
        `seccion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `nombre_producto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
        `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `precio` double NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

    TRUNCATE TABLE `productos`;
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
        `id` int NOT NULL AUTO_INCREMENT,
        `id_usuario` int NOT NULL,
        `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `asunto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `mensaje` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        PRIMARY KEY (`id`),
        KEY `fk_Usuario_Soporte` (`id_usuario`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

    TRUNCATE TABLE `soporte`;
    INSERT INTO `soporte` (`id`, `id_usuario`, `nombre`, `email`, `asunto`, `mensaje`) VALUES
    (2, 1, 'sadsad', 'admin-nebil@gmail.com', 'adasdad', 'adadad');

    CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` int NOT NULL AUTO_INCREMENT,
        `id_rol` int NOT NULL,
        `nombre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `apellido` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `usuario` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        `contrasenia` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

    TRUNCATE TABLE `usuarios`;

    ALTER TABLE `facturas`
        ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        ADD CONSTRAINT `FK_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    COMMIT;

    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;