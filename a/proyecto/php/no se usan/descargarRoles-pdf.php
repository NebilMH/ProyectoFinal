<?php
    include('conexionBD.php');

    use Dompdf\Dompdf;

    $query = "SELECT * from roles";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die('Query Failed'. mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'rol' => $row['rol']     
        );
        }
            $jsonstring = json_encode($json);
            mysqli_close($connection);
?>
    <h3 style="margin-left: 0%;">ROLES</h3><hr>
    <table class="table table-striped table-bordered">
        <tr>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Id</th>
            <th style="border: 1px solid black;background-color:teal;font-family:Georgia, 'Times New Roman', Times, serif;">Rol</th>
        </tr>
        <tbody>
            <?php foreach($json as $ejercicio) { ?>
                <tr>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['id'];?></td>
                    <td style="border: 1px solid black;"><?php echo $ejercicio ['rol'];?></td>
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
    $filename = 'Roles.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>