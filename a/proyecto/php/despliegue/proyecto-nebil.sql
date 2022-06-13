
    SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
    START TRANSACTION;
    SET time_zone = '+00:00';

    CREATE DATABASE IF NOT EXISTS `proyecto-nebil` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
    USE `proyecto-nebil`;
    
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
    (1, 'abdominales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/RPfxeHWm8Oo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'abdominales_.jpg', 'Abdominales', 'Los abdominales son uno de los ejercicios más populares para fortalecer el vientre sin ayuda de máquinas. En pocas palabras, consisten en pasar de una posición tumbada a una sentada al llevar el pecho hacia los muslos. Este movimiento lo podemos realizar'),
    (3, 'biceps.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/h5gE3xzn_qw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'biceps_.jpg', 'Biceps', 'Curl de bíceps son los ejercicios que implican la ejercitación de dicho músculo. Como el bíceps trabaja en el giro de muñeca o contracción del brazo, es fácil inducir que los diferentes tipos de curls incluyan flexiones de brazos así como giros de muñeca'),
    (4, 'triceps.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/hTPkT1pZpdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'triceps_.jpg', 'Triceps', 'El músculo tríceps braquial es un músculo de tres cabezas (tri-tres cep-cabeza) ubicado en la región del brazo. Corresponde al único constituyente del grupo muscular posterior de la región braquial, y se extiende a lo largo de casi toda la extensión long'),
    (5, 'teres.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/GWm0KUm65bY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'teres_.jpg', 'Teres', 'El músculo teres mayor viene de la escápula/paleta del hombro (parte principal de la paleta). Se produce al hacer el centro de paleta. Las fibras musculares de este pequeño corte cónico corren paralelas al eje largo de este músculo.'),
    (6, 'trapecio.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/Jr-ZOAJNKCs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'trapecio_.jpg', 'Trapecio', 'El trapecio es uno de los músculos de la espalda superior. Es un músculo triangular grande que va desde el hueso occipital en el cráneo hasta el final de la columna torácica en la espalda. Se extiende a lo ancho de los hombros. El músculo se divide en tr'),
    (7, 'isquiotibiales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/gH-WCTYu9EY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'isquiotibiales_.jpg', 'Isquiotibiales', 'Hay tres músculos que bajan por la parte posterior de la pierna, desde el muslo hasta la rodilla (el bíceps femoral, el semitendinoso y el semimembranoso) que ayudan flexionar la rodilla y a extender la cadera. Conjuntamente, todos ellos 
reciben el nom'),
    (9, 'hombro.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/dQ10KZTZu5E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'hombro_.jpg', 'Hombro', 'El hombro, un músculo con un gran atractivo que supone la guinda de un tren superior musculado. 
Aunque es un músculo muy trabajado en los gimnasios hay que tener en cuenta una serie de cosas para sacarles el máximo partido entrenándolos, así que de est'),
    (10, 'pectorales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/3IwHoFNQUo8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'pectoral_.jpg', 'Pectorales', 'Los pectorales son dos músculos de la zona anterior del tórax, llamados pectoral mayor y menor por su localización y tamaño. Ambos son planos y con forma triangular, pero el mayor es más ancho que el otro. En cuanto a la acción muscular, uno se encarga d'),
    (13, 'dorsales.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/HTsfl9wzOu0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'dorsales_.jpg', 'Dorsales', 'El dorsal ancho (lattissimus dorsi), es un músculo grande ancho y aplanado que recubre la parte posterior del tronco extendiéndose desde la región lumbar hasta el húmero. Es un músculo potente que interviene en muchas acciones deportivas y frecuentemente'),
    (14, 'gemelos.php', '<iframe width="1000" height="510" src="https://www.youtube.com/embed/vbGkMjtQmD4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>', 'gemelos_.jpg', 'Gemelos', 'El gemelo es un músculo biarticular ya que su trayecto atraviesa dos articulaciones, la de la rodilla y el tobillo. Su función sobre la rodilla es estabilizar el fémur, para evitar que haya un desequilibrio hacía adelante en los movimientos de flexión.');
    
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
    (21, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto53.png', 21.95),
    (22, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto52.png', 21.95),
    (23, 'packs', 'Egg White Protein', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto48.png', 29.99),
    (24, 'packs', 'Pack - Shaker + Proteina', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto47.png', 39.99),
    (29, 'packs', 'Keep Hammering', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto30.png', 31.99),
    (30, 'packs', 'Ammo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto27.png', 19.99),
    (31, 'shakers', 'Shaker Blanco', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto60.png', 14.95),
    (32, 'shakers', 'Shaker Rojo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto59.png', 14.95),
    (33, 'shakers', 'Shaker Azul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto58.png', 14.95),
    (34, 'shakers', 'Shaker Negro + Naranja', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto57.png', 14.95),
    (36, 'barritas', 'Peanut Butter Bliss', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto44.png', 35.95),
    (37, 'barritas', 'Triple Chocolate Mudslide', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto43.png', 35.95),
    (38, 'barritas', 'Conquer Caramel Crunch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto26.png', 35.95),
    (39, 'nuevos', 'Energy And Focus - Blue Raspbe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto42.png', 25.99),
    (40, 'nuevos', 'Energy And Focus - Pineapple', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto41.png', 29.95),
    (41, 'nuevos', 'Energy And Focus - Peach', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto40.png', 29.95),
    (42, 'nuevos', 'Biotics Watermelon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto54.png', 9.99),
    (43, 'ultimos', 'Biotics Blue Raspberry', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto55.png', 9.99),
    (44, 'ultimos', 'Energy Focus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto51.png', 9.95),
    (45, 'ultimos', 'Green Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto23.png', 29.99),
    (46, 'ultimos', 'Blue Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto24.png', 29.99),
    (52, 'barritas', 'Frosted Cinnamon Swirl', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto45.png', 35.95);
    
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
    
    ALTER TABLE `soporte`
        ADD CONSTRAINT `fk_Usuario_Soporte` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
    COMMIT;
    
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */; 