<?php
    include('conexionBD.php');
    use Dompdf\Dompdf;
    $query = "SELECT * from ejercicios";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'urlP' => $row['urlP'],
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo']     
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
?>
    <h3 style="margin-left: 0%;">EJERCICIOS</h3><hr>
    <table>
        <tr>
            <th style="border: 1px solid black;background-color:teal;">Id</th>
            <th style="border: 1px solid black;background-color:teal;">Url</th>
            <th style="border: 1px solid black;background-color:teal;">Imagen</th>
            <th style="border: 1px solid black;background-color:teal;">Titulo</th>
        </tr>
        <tbody>
            <?php foreach($json as $ejercicio) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['urlP'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['imagen'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['titulo'];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
    require("../pdf-excel/dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = 'Ejercicios.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>