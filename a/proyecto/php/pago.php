<?php
    $array = $_POST['values_array'];

    echo "Valor recogido: " . $array . "<br/>";

    echo "Convertirlo en array: ";
    print_r(explode(",", $array));
?>