$(document).ready(function () {
    verUsuarios();
    verProductos();
    verEjercicios();
    verSoporte();
    verRol();

    // Usuarios -----------------------------------------------------------------------------------------------------------------------------------------
    function verUsuarios() {
        $.ajax({
            url: 'verUsuarios.php',
            type: 'GET',
            success: function (response) {
                const datos = JSON.parse(response);
                let template = '';
                datos.forEach(dato => {
                    template += `
                    <tr inputId="${dato.id}" id="${dato.nombre}_${dato.id}" class="usuarioEncontrado_${dato.id}">
                        <td>${dato.id}</td>
                        <td>${dato.id_rol}</td>
                        <td>${dato.nombre}</td>
                        <td>${dato.apellido}</td>
                        <td id="idEmail">${dato.email}</td>
                        <td>${dato.usuario}</td>
                        <td id="idPass">${dato.contraseña}</td>
                        <td><a href="#" class="editarUsuarios" style='font-size:17px;border:none;cursor:pointer;color:green;'><i class="fa-solid fa-pen"></i></a></td>
                        <td><button style='background-color:transparent;font-size:15px;border:none;cursor:pointer;color:red;'><i id='papelera' class='eliminarUsuarios fa-solid fa-trash'></i></button></td>
                        <td style="display:none;"><button id="limpiarResult">Limpiar Resultados</button></td>                 
                    </tr>`
                });
                $('#mostrar-usuarios').html(template);
            }
        });
    }

    $(document).on('click', '.eliminarUsuarios', (e) => {
        if (confirm('Seguro que quiere eliminar a este usuario?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('eliminarUsuarios.php', { id }, (response) => {
                verUsuarios(response);
            });
        }
    });

    $(document).on('click', '.editarUsuarios', function() {
        const element = $(this)[0].parentElement.parentElement;
        const id = $(element).attr('inputId');
        $.post('ver_single-usuario.php', { id }, (response) => {
            const dato = JSON.parse(response);
            $('#inputId').val(dato.id);
            $('#update_id_rol').val(dato.id_rol);
            $('#update_nombre').val(dato.nombre);
            $('#update_apellido').val(dato.apellido);
            $('#update_email').val(dato.email);
            $('#update_usuario').val(dato.usuario);
            edit = true;
        });
    });

    // Productos -----------------------------------------------------------------------------------------------------------------------------------------
    function verProductos() {
        $.ajax({
            url: 'verProductos.php',
            success: function (response) {
                const datos = JSON.parse(response);
                let template = '';
                datos.forEach(dato => {
                    template += `
                    <tr inputId="${dato.id}" id="${dato.nombre_producto}_${dato.id}" class="productoEncontrado_${dato.id}">
                        <td>${dato.id}</td>
                        <td id="idSecc">${dato.seccion}</td>
                        <td>${dato.nombre_producto}</td>
                        <td id="idDesc">${dato.descripcion}</td>
                        <td>${dato.precio}</td>
                        <td id="idImg">${dato.imagen}</td>
                        <td><a href="#" class="editarProducto" style='font-size:17px;border:none;cursor:pointer;color:green;'><i class="fa-solid fa-pen"></i></a></td>
                        <td style=""><button style='background-color:transparent;font-size:15px;border:none;cursor:pointer;color:red;'><i id='papelera' class='eliminarProducto fa-solid fa-trash'></i></button></td>
                        <td style="display:none;"><button id="limpiarResult">Limpiar Resultados</button></td>
                        </tr>`
                });
                $('#mostrar-productos').html(template);
            }
        });
    }

    $(document).on('click', '.eliminarProducto', (e) => { 
        if (confirm('Seguro que quiere eliminar este producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('eliminarProductos.php', { id }, (response) => {
                verProductos(response);
            });
        }
        e.preventDefault();
    });

    $(document).on('click', '.editarProducto', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-producto.php', { id }, (response) => {
                const dato = JSON.parse(response);
                $('#inputId').val(dato.id);
                $('#update_seccion').val(dato.seccion);
                $('#update_nombre_producto').val(dato.nombre_producto);
                $('#update_descripcion').val(dato.descripcion);
                $('#update_precio').val(dato.precio);
                $('#update_imagen').val(dato.imagen);
                edit = true;
            });
            e.preventDefault();
    });

    // Soporte -----------------------------------------------------------------------------------------------------------------------------------------
    function verSoporte() {
        $.ajax({
            url: 'verSoporte.php',
            type: 'GET',
            success: function (response) {
                const datos = JSON.parse(response);
                let template = '';
                datos.forEach(dato => {
                    template += `
                    <tr inputId="${dato.id}" id="${dato.nombre}_${dato.id}" class="soporteEncontrado_${dato.id}">
                        <td>${dato.id}</td>
                        <td>${dato.nombre}</td>
                        <td id="idEmailS">${dato.email}</td>
                        <td id="idAsunto">${dato.asunto}</td>
                        <td>${dato.mensaje}</td>
                        <td><a href="#" class="editarSoporte" style='font-size:17px;border:none;cursor:pointer;color:green;'><i class="fa-solid fa-pen"></i></a></td>
                        <td><button style='background-color:white;font-size:15px;border:none;cursor:pointer;color:red;'><i id='papelera' class='eliminarSoporte fa-solid fa-trash'></i></button></td>
                        <td style="display:none;"><button id="limpiarResult">Limpiar Resultados</button></td>
                    </tr>`
                });
                $('#mostrar-soporte').html(template);
            }
        });
    }

    $(document).on('click', '.eliminarSoporte', (e) => {
        if (confirm('Seguro que quiere eliminar este mensaje?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('eliminarSoporte.php', { id }, (response) => {
                verSoporte(response);
            });
        }
        e.preventDefault();
    });

    $(document).on('click', '.editarSoporte', function(e) {
        const element = $(this)[0].parentElement.parentElement;
        const id = $(element).attr('inputId');
        $.post('ver_single-soporte.php', { id }, (response) => {
            const dato = JSON.parse(response);
            $('#inputId').val(dato.id);
            $('#update_nombreS').val(dato.nombre);
            $('#update_emailS').val(dato.email);
            $('#update_asuntoS').val(dato.asunto);
            $('#update_mensajeS').val(dato.mensaje);
            edit = true;
        });
        e.preventDefault();
    });

    // Ejercicios -----------------------------------------------------------------------------------------------------------------------------------------
        function verEjercicios() {
            $.ajax({
                url: 'verEjercicios.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        template += `
                        <tr inputId="${dato.id}" id="${dato.titulo}_${dato.id}" class="ejercicioEncontrado_${dato.id}">
                            <td>${dato.id}</td>
                            <td id="idUrl">${dato.urlP}</td>
                            <td id="idImgE">${dato.imagen}</td>
                            <td>${dato.titulo}</td>
                            <td><a href="#" class="editarEjercicio" style='font-size:17px;border:none;cursor:pointer;color:green;'><i class="fa-solid fa-pen"></i></a></td>
                            <td><button style='background-color:white;font-size:15px;border:none;cursor:pointer;color:red;'><i id='papelera' class='eliminarEjercicio fa-solid fa-trash'></i></button></td>
                            <td style="display:none;"><button id="limpiarResult">Limpiar Resultados</button></td>
                        </tr>`
                    });
                    $('#mostrar-ejercicios').html(template);
                }
            });
        }
    
        $(document).on('click', '.eliminarEjercicio', (e) => {
            if (confirm('Seguro que quiere eliminar este ejercicio?')) {
                const element = $(this)[0].activeElement.parentElement.parentElement;
                const id = $(element).attr('inputId');
                $.post('eliminarEjercicio.php', { id }, (response) => {
                    verEjercicios(response);
                });
                e.preventDefault();
            }
        });

        $(document).on('click', '.editarEjercicio', function(e) {
                const element = $(this)[0].parentElement.parentElement;
                const id = $(element).attr('inputId');
                $.post('ver_single-ejercicio.php', { id }, (response) => {
                    const dato = JSON.parse(response);
                    $('#inputId').val(dato.id);
                    $('#update_url').val(dato.urlP);
                    $('#update_imagenE').val(dato.imagen);
                    $('#update_titulo').val(dato.titulo);
                    edit = true;
                });
                e.preventDefault();
        });

        // Rol -----------------------------------------------------------------------------------------------------------------------------------------
        function verRol() {
            $.ajax({
                url: 'verRol.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        template += `
                        <tr inputId="${dato.id}" id="${dato.rol}_${dato.id}" class="rolEncontrado_${dato.id}">
                            <td>${dato.id}</td>
                            <td>${dato.rol}</td>
                            <td><a href="#" class="editarRol" style='font-size:17px;border:none;cursor:pointer;color:green;'><i class="fa-solid fa-pen"></i></a></td>
                            <td><button style='background-color:white;font-size:15px;border:none;cursor:pointer;color:red;'><i id='papelera' class='eliminarRol fa-solid fa-trash'></i></button></td>
                            <td style="display:none;"><button id="limpiarResult">Limpiar Resultados</button></td>
                        </tr>`
                    });
                    $('#mostrar-rol').html(template);
                }
            });
        }

        $(document).on('click', '.eliminarRol', (e) => {
            if (confirm('Seguro que quiere eliminar este rol?')) {
                const element = $(this)[0].activeElement.parentElement.parentElement;
                const id = $(element).attr('inputId');
                $.post('eliminarRol.php', { id }, (response) => {
                    verRol(response);
                });
            }
            e.preventDefault();
        });

        $(document).on('click', '.editarRol', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-rol.php', { id }, (response) => {
                const dato = JSON.parse(response);
                $('#inputId').val(dato.id);
                $('#update_rol').val(dato.rol);
                edit = true;
            });
            e.preventDefault();
        });

        //Buscar -----------------------------------------------------------------------------------------------------------------------------------------

        //Buscar usuario
        $('#buscarU').keyup(function() {
            if($('#buscarU').val()) {
            let buscar = $('#buscarU').val();
            $.ajax({
                url: 'buscarUsuario.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += `<tr style="color:white;" inputId="${dato.id}">
                                    <td id="resultadoSearch" style="color:green;">Usuario: <a style="color:white;"> ${dato.nombre}</a></td>
                                    <td id="resultadoSearch"><label id="botonVer" for="btn-modal" style="cursor:pointer;"><i class="fa-regular fa-eye"></i></label></td>
                                </tr>`
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        $('#buscarU').keydown(function() {
            if($('#buscarU').val()) {
            let buscar = $('#buscarU').val();
            $.ajax({
                url: 'buscarUsuario.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += ``
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        //Buscar producto
        $('#buscarP').keyup(function() {
            if($('#buscarP').val()) {
            let buscar = $('#buscarP').val();
            $.ajax({
                url: 'buscarProducto.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += `<tr style="color:white;" inputId="${dato.id}">
                                    <td id="resultadoSearch" style="color:green;">Producto: <a style="color:white;"> ${dato.nombre_producto}</a></td>
                                    <td id="resultadoSearch"><label id="botonVer" for="btn-modal" style="cursor:pointer;"><i class="fa-regular fa-eye"></i></label></td>
                                </tr>`;
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        $('#buscarP').keydown(function() {
            if($('#buscarP').val()) {
            let buscar = $('#buscarP').val();
            $.ajax({
                url: 'buscarProducto.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += ``
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        //Buscar ejercicio
        $('#buscarE').keyup(function() {
            if($('#buscarE').val()) {
            let buscar = $('#buscarE').val();
            $.ajax({
                url: 'buscarEjercicio.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += `<tr style="color:white;" inputId="${dato.id}">
                                    <td id="resultadoSearch" style="color:green;">Ejercicio: <a style="color:white;"> ${dato.titulo}</a></td>
                                    <td id="resultadoSearch"><label id="botonVer" for="btn-modal" style="cursor:pointer;"><i class="fa-regular fa-eye"></i></label></td>
                                </tr>`
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        $('#buscarE').keydown(function() {
            if($('#buscarE').val()) {
            let buscar = $('#buscarE').val();
            $.ajax({
                url: 'buscarEjercicio.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += ``
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        //Buscar soporte
        $('#buscarS').keyup(function() {
            if($('#buscarS').val()) {
            let buscar = $('#buscarS').val();
            $.ajax({
                url: 'buscarSoporte.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += `<tr style="color:white;" inputId="${dato.id}">
                                    <td id="resultadoSearch" style="color:green;">Mensaje de: <a style="color:white;"> ${dato.nombre}</a></td>
                                    <td id="resultadoSearch"><label id="botonVer" for="btn-modal" style="cursor:pointer;"><i class="fa-regular fa-eye"></i></label></td>
                                </tr>`
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        $('#buscarS').keydown(function() {
            if($('#buscarS').val()) {
            let buscar = $('#buscarS').val();
            $.ajax({
                url: 'buscarSoporte.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += ``
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        //Buscar rol
        $('#buscarR').keyup(function() {
            if($('#buscarR').val()) {
            let buscar = $('#buscarR').val();
            $.ajax({
                url: 'buscarRol.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += `<tr style="color:white;" inputId="${dato.id}">
                                    <td id="resultadoSearch" style="color:green;">Rol: <a style="color:white;"> ${dato.rol}</a></td>
                                    <td id="resultadoSearch"><label id="botonVer" for="btn-modal" style="cursor:pointer;"><i class="fa-regular fa-eye"></i></label></td>
                                </tr>`
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        $('#buscarR').keydown(function() {
            if($('#buscarR').val()) {
            let buscar = $('#buscarR').val();
            $.ajax({
                url: 'buscarRol.php',
                data: {buscar},
                type: 'POST',
                success: function (response) {
                if(!response.error) {
                    let datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                    template += ``
                    });
                    $('#resultado').show();
                    $('#contenedor').html(template);
                }
                } 
            })
            }
        });

        //Busqueda Usuarios
        //resaltar resultado de busqueda
        $(document).on('click', '#botonVer', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-usuario.php', {id}, (response) => {
                const dato = JSON.parse(response);
                $("#btn-modal").click();
                $('#inputId').val(dato.id);
                $(`.usuarioEncontrado_${dato.id}`).addClass('resaltado');
                self.location.href = `#${dato.nombre}_${dato.id}`;
            });
            e.preventDefault();
        });

        //Eliminar filas resaltadas
        $(document).on('click', '#limpiarResult', function(e) {
            $.ajax({
                url: 'verUsuarios.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        $(`.usuarioEncontrado_${dato.id}`).removeClass('resaltado');
                    });
                }
            });
        });
        
        //Busqueda Productos
        //resaltar resultado de busqueda
        $(document).on('click', '#botonVer', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-producto.php', {id}, (response) => {
                const dato = JSON.parse(response);
                $("#btn-modal").click();
                $('#inputId').val(dato.id);
                $(`.productoEncontrado_${dato.id}`).addClass('resaltado');
                self.location.href = `#${dato.nombre_producto}_${dato.id}`;
            });
            e.preventDefault();
        });

        //Eliminar filas resaltadas
        $(document).on('click', '#limpiarResult', function(e) {
            $.ajax({
                url: 'verProductos.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        $(`.productoEncontrado_${dato.id}`).removeClass('resaltado');
                    });
                }
            });
        });

        //Busqueda Ejercicios
        //resaltar resultado de busqueda
        $(document).on('click', '#botonVer', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-ejercicio.php', {id}, (response) => {
                const dato = JSON.parse(response);
                $("#btn-modal").click();
                $('#inputId').val(dato.id);
                $(`.ejercicioEncontrado_${dato.id}`).addClass('resaltado');
                self.location.href = `#${dato.titulo}_${dato.id}`;
            });
            e.preventDefault();
        });

        //Eliminar filas resaltadas
        $(document).on('click', '#limpiarResult', function(e) {
            $.ajax({
                url: 'verEjercicios.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        $(`.ejercicioEncontrado_${dato.id}`).removeClass('resaltado');
                    });
                }
            });
        });

        //Busqueda Soporte
        //resaltar resultado de busqueda
        $(document).on('click', '#botonVer', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-soporte.php', {id}, (response) => {
                const dato = JSON.parse(response);
                $("#btn-modal").click();
                $('#inputId').val(dato.id);
                $(`.soporteEncontrado_${dato.id}`).addClass('resaltado');
                self.location.href = `#${dato.nombre}_${dato.id}`;
            });
            e.preventDefault();
        });

        //Eliminar filas resaltadas
        $(document).on('click', '#limpiarResult', function(e) {
            $.ajax({
                url: 'verSoporte.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        $(`.soporteEncontrado_${dato.id}`).removeClass('resaltado');
                    });
                }
            });
        });

        //Busqueda Roles
        //resaltar resultado de busqueda
        $(document).on('click', '#botonVer', function(e) {
            const element = $(this)[0].parentElement.parentElement;
            const id = $(element).attr('inputId');
            $.post('ver_single-rol.php', {id}, (response) => {
                const dato = JSON.parse(response);
                $("#btn-modal").click();
                $('#inputId').val(dato.id);
                $(`.rolEncontrado_${dato.id}`).addClass('resaltado');
                self.location.href = `#${dato.rol}_${dato.id}`;
            });
            e.preventDefault();
        });

        //Eliminar filas resaltadas
        $(document).on('click', '#limpiarResult', function(e) {
            $.ajax({
                url: 'verRol.php',
                type: 'GET',
                success: function (response) {
                    const datos = JSON.parse(response);
                    let template = '';
                    datos.forEach(dato => {
                        $(`.rolEncontrado_${dato.id}`).removeClass('resaltado');
                    });
                }
            });
        });
        
        //cuando yo haga click en un boton, que el script haga click en otro boton
        $(document).on('click', '#limpiarResult2', function(e) {
            $("#limpiarResult").click();
        }); 
});