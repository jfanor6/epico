$(document).ready(function() {

    $(".btnEditar").click(function(){

        $("#idEdit").val($(this).data('id'));
        $("#nombreEdit").val($(this).data('nombre'));
        $("#categEdit").val($(this).data('categ'));
        $("#precostEdit").val($(this).data('precos'));
        $("#prevteEdit").val($(this).data('prevta'));
        $("#archEdit").val($(this).data('arch'));

    });

    $('#formulario').submit(function(e) {
        e.preventDefault();  

        var nombre = $('#nombre').val();
        var categoria = $('#categoria').val();  
        var preciocost = $('#preciocost').val();
        var preciounit = $('#preciounit').val();
        var adjunto = $('#adjunto').val(); 


        if (nombre.trim() === '') {
            alert("El nombre no puede estar vacío.");
            return false; 
        }

        if (!/^[A-Za-z\s]+$/.test(nombre)) {
            alert("El nombre solo puede contener letras.");
            return false;
        }

        if (!/^\d+$/.test(categoria)) {
            alert("La categoría debe ser un número.");
            return false;
        }

        if (!/^\d+(\.\d{1,2})?$/.test(preciocost) || parseFloat(preciocost) <= 0) {
            alert("El precio de costo debe ser un número positivo.");
            return false;
        }

        if (!/^\d+(\.\d{1,2})?$/.test(preciounit) || parseFloat(preciounit) <= 0) {
            alert("El precio unitario debe ser un número positivo.");
            return false;
        }

        var formData = {
            nombre: nombre,
            categoria: categoria,
            preciocost: preciocost,
            preciounit: preciounit,
            adjunto: adjunto
        };


        $.ajax({
            url: 'guardar',  
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Datos guardados correctamente!');
                $('#formulario')[0].reset();  
                window.location.href = '/epico';  
            },
            error: function(xhr, status, error) {
                alert('Hubo un problema al guardar los datos: ' + error);
            }
        });
    });

    $('.formeliminar').submit(function(e) {
        e.preventDefault(); 
    
        var id = $(this).find('input[name="id"]').val();
        //console.log("El ID enviado es: " + id); 
    
        var formData = {
            id: id
        };  
    
        $.ajax({
            url: 'eliminar',  
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Datos eliminados correctamente!');
                window.location.href = '/epico';  
            },
            error: function(xhr, status, error) {
                alert('Hubo un problema al eliminar los datos: ' + error);
            }
        });
    });

    $('.formularioeditar').submit(function(e) {
        e.preventDefault(); 
    
        var id = $(this).find('input[name="id"]').val();
        var nombre = $(this).find('input[name="nombre"]').val();
        var categoria = $(this).find('select[name="categoria"]').val();
        var preciocost = $(this).find('input[name="preciocost"]').val();
        var preciounit = $(this).find('input[name="preciounit"]').val();
        var adjunto = $(this).find('input[name="adjunto"]').val(); 
    
        var editaData = {
            id: id,
            nombre: nombre,
            categoria: categoria,   // Asegúrate de que esta variable tenga valor
            preciocost: preciocost,
            preciounit: preciounit,
            adjunto: adjunto
        };
    
        // Verifica si "categoria" tiene valor antes de enviar la solicitud
        //console.log("Categoria: ", categoria);  // Esto debería mostrar el valor de "categoria"
        //console.log(editaData);  // Verifica los datos enviados
    
        $.ajax({
            url: 'editar',  
            type: 'POST',
            data: editaData,
            success: function(response) {
                console.log("response: " + response);
                alert('¡Datos editados correctamente!');
                window.location.href = '/epico';  
            },
            error: function(xhr, status, error) {
                alert('Hubo un problema al editar los datos: ' + error);
            }        
        });
    });

    $('#formularioCateg').submit(function(e) {
        e.preventDefault();  

        var nombrec = $('#nombrec').val();

        console.log(nombrec);

        if (nombrec.trim() === '') {
            alert("El nombre no puede estar vacío.");
            $(this).find('input[name="nombrec"]').val(''); 
            $(this).find('input[name="nombrec"]').focus(); 

            return false; 
        }

        if (!/^[A-Za-z\s]+$/.test(nombrec)) {
            alert("El nombre solo puede contener letras.");
            $(this).find('input[name="nombrec"]').val(''); 
            $(this).find('input[name="nombrec"]').focus();
            return false;
        }        

        var formData = {
            nombre: nombrec
        };

        $.ajax({
            url: 'guardarCateg',  
            type: 'POST',
            data: formData,
            success: function(response) {
                alert('Categoria guardada correctamente!');
                $('#formularioCateg')[0].reset();  
                window.location.href = '/epico';  
            },
            error: function(xhr, status, error) {
                alert('Hubo un problema al guardar!' + error);
            }
        });
    });

});
