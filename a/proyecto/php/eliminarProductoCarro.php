<?php
    session_start();
    
    $contador = $_POST['contador'];

    $data = $_SESSION['datos']; // Get the value

    //unset($data[$contador]);  //Elimina solo si lo hacemos en orden desde el final
    array_splice($data, $contador, 1); //Elimina un elemento y vuelve a asignar el indice a cada elemento
    
    $_SESSION['datos'] = $data; // Set the session value with the new array;

    echo "<script type='text/javascript'>window.location.href = 'carrito.php';</script>";
?>
