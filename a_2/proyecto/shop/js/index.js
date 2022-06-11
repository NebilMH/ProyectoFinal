let menu = document.querySelector('#menu-bar'); //Seleccionamos el elemento que contenga dicha id y lo almacenamos
let navbar = document.querySelector('.navbar');

menu.onclick =() =>{ //Permite alternar el menu desplegable que aparece cuando la resolucion es pequeña
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

let slides = document.querySelectorAll('.slide-container'); //Seleccionamos el elemento que contenga dicha id y lo almacenamos, en este caso el banner
let index = 0;

//Lo que permite es avanzar o retroceder el banner
function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}

//El siguiente script de ajax se utiliza para mostrar los elementos en la pagina de forma dinamica
$(document).ready(function () {
    verProductosTienda();
    function verProductosTienda() {
        //Usamos ajax para obtener los datos de la base de datos
        $.ajax({//Este script de ajax es para mostrar los productos en la parte de ultimos
            url: '../php/ver-producto-tienda-last.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {//El form siguiente, lo utilizo para que cuando el boton de carrito sea accionado envie los datos al carrito del producto y lo pueda listar
                    template += `
                        <form class="box" action="../php/carrito.php" method="post">

                        <input type="hidden" name="id" value="${dato.id}"><br>
                        <input type="hidden" name="imagen" value="../images/productos/${dato.imagen}"><br>
                        <input type="hidden" name="nombre_producto" value="${dato.nombre_producto}"><br>
                        <input type="hidden" name="precio" value="${dato.precio}"><br>
                        <input type="hidden" name="accion" value="registroDatos">

                            <div class="icons">
                                <a id="heart" href="#" class="fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="fa fa-shopping-cart"></button>
                            </div>
                            <div class="content">
                                <img src="../images/productos/${dato.imagen}" alt="">
                                <h3>${dato.tipo} ${dato.nombre_producto}</h3>
                                <div class="price">${dato.precio} <span>$90</span></div>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </form>`;
                }); //Estos son los datos a mostrar
                    $('#mostrar-producto-tienda-last').html(template);
                 //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });

        $.ajax({//Este script de ajax es para mostrar los productos en la parte de ultimos
            url: '../php/ver-producto-tienda-new.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {//El form siguiente, lo utilizo para que cuando el boton de carrito sea accionado envie los datos al carrito del producto y lo pueda listar
                    template += `
                        <form class="box" action="../php/carrito.php" method="post">

                        <input type="hidden" name="id" value="${dato.id}"><br>
                        <input type="hidden" name="imagen" value="../images/productos/${dato.imagen}"><br>
                        <input type="hidden" name="nombre_producto" value="${dato.nombre_producto}"><br>
                        <input type="hidden" name="precio" value="${dato.precio}"><br>
                        <input type="hidden" name="accion" value="registroDatos">

                            <div class="icons">
                                <a id="heart" href="#" class="fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" href="#" class="fa fa-shopping-cart"></button>
                            </div>
                            <div class="content">
                                <img src="../images/productos/${dato.imagen}" alt="">
                                <h3>${dato.tipo} ${dato.nombre_producto}</h3>
                                <div class="price">${dato.precio} <span>$90</span></div>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </form>`;
                }); //Estos son los datos a mostrar
                    $('#mostrar-producto-tienda-new').html(template);
                 //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });

        $.ajax({//Este script de ajax es para mostrar los productos en la parte de packs
            url: '../php/ver-producto-tienda-packs.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {//El form siguiente, lo utilizo para que cuando el boton de carrito sea accionado envie los datos al carrito del producto y lo pueda listar
                    template += `
                        <form class="box" action="../php/carrito.php" method="post">

                        <input type="hidden" name="id" value="${dato.id}"><br>
                        <input type="hidden" name="imagen" value="../images/productos/${dato.imagen}"><br>
                        <input type="hidden" name="nombre_producto" value="${dato.nombre_producto}"><br>
                        <input type="hidden" name="precio" value="${dato.precio}"><br>
                        <input type="hidden" name="accion" value="registroDatos">

                            <div class="icons">
                                <a id="heart" href="#" class="fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" href="#" class="fa fa-shopping-cart"></button>
                            </div>
                            <div class="content">
                                <img src="../images/productos/${dato.imagen}" alt="">
                                <h3>${dato.tipo} ${dato.nombre_producto}</h3>
                                <div class="price">${dato.precio} <span>$90</span></div>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </form>`;
                }); //Estos son los datos a mostrar
                    $('#mostrar-producto-tienda-packs').html(template);
                 //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });

        $.ajax({//Este script de ajax es para mostrar los productos en la parte de shakers
            url: '../php/ver-producto-tienda-shakers.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {//El form siguiente, lo utilizo para que cuando el boton de carrito sea accionado envie los datos al carrito del producto y lo pueda listar
                    template += `
                        <form class="box" action="../php/carrito.php" method="post">

                        <input type="hidden" name="id" value="${dato.id}"><br>
                        <input type="hidden" name="imagen" value="../images/productos/${dato.imagen}"><br>
                        <input type="hidden" name="nombre_producto" value="${dato.nombre_producto}"><br>
                        <input type="hidden" name="precio" value="${dato.precio}"><br>
                        <input type="hidden" name="accion" value="registroDatos">

                            <div class="icons">
                                <a id="heart" href="#" class="fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" href="#" class="fa fa-shopping-cart"></button>
                            </div>
                            <div class="content">
                                <img src="../images/productos/${dato.imagen}" alt="">
                                <h3>${dato.tipo} ${dato.nombre_producto}</h3>
                                <div class="price">${dato.precio} <span>$90</span></div>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </form>`;
                }); //Estos son los datos a mostrar
                    $('#mostrar-producto-tienda-shakers').html(template);
                 //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });

        $.ajax({//Este script de ajax es para mostrar los productos en la parte de barritas
            url: '../php/ver-producto-tienda-barritas.php', //le pasamos la url del archivo php que extrae los datos de la base de datos por medio de consultas
            type: 'GET', //Indicamos el método a utilizar, POST para enviar o GET en este caso para recibir
            
            success: function (response) {
                const datos = JSON.parse(response); // Analiza una cadena de texto como JSON, transformando el valor producido por el análisis a JSON
                let template = ''; //Creamos una variable template vacia, a la que añadiremos las filas de la tabla con los datos
                datos.forEach(dato => {//El form siguiente, lo utilizo para que cuando el boton de carrito sea accionado envie los datos al carrito del producto y lo pueda listar
                    template += `
                        <form class="box" action="../php/carrito.php" method="post">

                        <input type="hidden" name="id" value="${dato.id}"><br>
                        <input type="hidden" name="imagen" value="../images/productos/${dato.imagen}"><br>
                        <input type="hidden" name="nombre_producto" value="${dato.nombre_producto}"><br>
                        <input type="hidden" name="precio" value="${dato.precio}"><br>
                        <input type="hidden" name="indice" value="1"><br>
                        <input type="hidden" name="accion" value="registroDatos">

                            <div class="icons">
                                <a id="heart" href="#" class="fa fa-heart"></a>
                                <button aria-label="cart button" id="cart" style="background-color:transparent;border:1px solid black;border-radius:4px;height:35px;margin-top:5px;font-size:15px;" type="submit" class="fa fa-shopping-cart"></button>
                            </div>
                            <div class="content">
                                <img src="../images/productos/${dato.imagen}" alt="">
                                <h3>${dato.tipo} ${dato.nombre_producto}</h3>
                                <div class="price">${dato.precio} <span>$90</span></div>
                                <div class="stars">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </form>`;
                }); //Estos son los datos a mostrar
                    $('#mostrar-producto-tienda-barritas').html(template);
                 //Los datos que se muestren apareceran en la parte que contenga la id #mostrar
            }
        });

        //Boton cargar mas
        // slice is choosing the first 2 instances of "Box-hidden" and showing them
        $(".product").slice(0, 1).show();
        // if there are Box-Hidden set to display:none (hidden) then show the loadMore button 
        if ($(".product:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".product:hidden").slice(0, 1).slideDown();
            // if there are no more hidden Box-Hidden's then hide the loadMore button
            if ($(".product:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
            // This is not related to the show more, this just brings you back up the page
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1000);
        });
    }
})