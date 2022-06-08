<?php
    $file_name = "install.html";
    $content = "
    <html>
        <head>
            <title>Instalador<title>
        </head>
        <body>

            <header><h1>Instalador</h1></header>

        </body>
    </html>";

    $file = fopen($file_name,"w"); // W de Write
    fwrite($file, $content);
    fclose($file);
?>