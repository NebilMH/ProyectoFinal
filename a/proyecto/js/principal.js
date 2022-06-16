$(document).ready(function () {
    verEjercicio();

    function verEjercicio() {
        //Usamos ajax para obtener los datos de la base de datos
        $.ajax({
            url: './php/verEjercicios.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {
                    template += `
                    <div class="card">
                        <a href="ejercicios/${dato.urlP}"><img src="images/${dato.imagen}" alt="imagen" class="card-image"></a>
                        <h3 class="card-title">${dato.titulo}</h3>
                    </div>`
                }); //Estos son los datos a mostrar
                $('#show-ejercicios').html(template); //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });
    };
});


