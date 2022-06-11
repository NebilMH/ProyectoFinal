<?php
    $array = $_POST['values_array'];

    echo "Valor recogido: " . $array . "<br/>";

    echo "Convertirlo en array: ";
    print_r(explode(",", $array));
?>

<?php
    include('conexionBD.php');
    $query = "SELECT * FROM ejercicios WHERE id='14'"; 
    $result = mysqli_query($connection, $query);

    $contador = 0;
    while(($contador < 1) && ($row = mysqli_fetch_array($result))) {
        $contador = $contador + 1;
        unlink("../ejercicios/".$row['urlP']);
        exit();
    } 
    ?>