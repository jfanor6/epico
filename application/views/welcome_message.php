<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Epico</title>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/scriptPrincipal.js'); ?>"></script>
    <!-- Agregar CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar JS de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="col-sm-12" style="text-align: right;width:600px;padding:0% 0">        
        
            <p style="color:#0e85ed;font-family:Cambria;font-size: 1.5em" >  Productos </p> 
    </div>
    <div class="col-sm-12" style="text-align: right;width:1200px;padding:0% 0">
        <td >
            <button title = "Adicionar Categoria" class="btn btn-round btncategoria"
                data-toggle="modal" data-target="#modalAgregarCateg">
                <img  width="35" height="35" src="<?php echo base_url('assets/images/categ.png'); ?>" alt="Ícono">
            Categorias
            </button>
        </td> 
    
        <a href="#" class="btn btn-outline-primary btn-Light shadow-sm"  data-toggle="modal" data-target="#modalAgregar" title="Agregar nuevo">
        Nuevo Registro
        </a> 
    </div>

<!--Principal-->
<div class="table-responsive">
	<div class="col-sm-12">

        <!-- Modal Agregar-->

    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="max-width: 700px!important;" role="document">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Registro</h5>
                    <td>
                    </td>
                </div>

            <form id="formulario">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nombre Producto:
                        <input name="nombre" type="text" placeholder="Nombre" id="nombre"  class="form-control"/>
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <label for="">Categoria:
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            <?php foreach($categorias as $categoria): ?>
                                <option value="<?= $categoria['id']; ?>"><?= $categoria['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Precio Costo:
                            <input name="preciocost" type="number" placeholder="Precio Costo" id="preciocost"  class="form-control"/>
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <label for="">Precio Venta:         
                            <input name="preciounit" type="number" placeholder="Precio Unitario" id="preciounit"  class="form-control"/>
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <div class="custom-file">
                        <label for="">Seleccionar Archivo:
                        <input type="file" id="adjunto" name="adjunto" class="form-control" accept=".pdf,.xlsx,.doc,.docx">
                        </label>
                    </div>
                    
                </div>
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>  
                        <button type="submit" class="btn btn-primary">Guardar</button>  
                    </div>
            </div>        
            </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar-->

    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="max-width: 600px!important;" role="document">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                    <td>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">&times;</span>  
                        </button>
                    </td>  
                </div>

            <form class="formularioeditar">
            <div class="modal-body">
                <div class="form-group">
                    <input name="id"  id="idEdit" type="hidden"/><br />
                    <label for="">Nombre Producto:  
                        <input type="text" name="nombre" id="nombreEdit" class="form-control" placeholder="Nombre">
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <label for="">Categoria: 
                        <select name="categoria" id="categEdit" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            <?php foreach($categorias as $categoria): ?>
                                <option value="<?= $categoria['id']; ?>"><?= $categoria['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label for="">Precio Costo: 
                        <input name="preciocost" id="precostEdit" type="number" placeholder="Precio Costo" class="form-control"  /><br />
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <label for="">Precio Venta: 
                        <input name="preciounit" id="prevteEdit" type="number" placeholder="Precio Unitario" class="form-control"  /><br />
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <div class="custom-file">
                        <label for="">Seleccionar Archivo:
                        <input type="file" name="adjunto" id="archEdit" class="form-control" accept=".pdf,.xlsx,.doc,.docx">
                        </label>
                    </div>
                    
            </div>
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>  
                        <button type="submit" class="btn btn-primary">Editar</button>  
                    </div>
            </div> 

                    </form>   
            </div>  
        </div>  
    </div>

    <!-- Modal Agregar Categoria-->

<div class="modal fade" id="modalAgregarCateg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog"  style="max-width: 350px!important;" role="document">  
            <div class="modal-content">  
                <div class="modal-header">  
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
                    <td>
                    </td>
                </div>

        <form id="formularioCateg">                
            <div class="modal-body">
                <div class="form-group">
                    <label for="">
                        <input type="text" class="form-control" id="nombrec" name="nombrec" placeholder="Descripción" maxlength="25" size="30">

                    </label>                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

        <div class="table-striped">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio de Costo</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Archivo de Imagen</th>
                        <th scope="col">Opciones</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datos as $item): ?>
                        <tr>
                            <td scope="row"><?= $item['id']; ?></td> 
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['cost_price']; ?></td>
                            <td><?= $item['unit_price']; ?></td>
                            <td><?= $item['pic_filename']; ?></td>
                            <td>
                                <form class="formeliminar">
                                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                    <button title = "Eliminar Registro" class="btn btn-danger" type="submit" id="eliminar<?= $item['id']; ?>">Eliminar</button>
                                </form>
                            </td>
                            <td>                                
                               
                                <button class="btn btn-success btnEditar" 
                                    data-id="<?= $item['id']; ?>"
                                    data-nombre="<?= $item['name']; ?>"
                                    data-categ="<?= $item['category_id']; ?>"
                                    data-precos="<?= $item['cost_price']; ?>"
                                    data-prevta="<?= $item['unit_price']; ?>"
                                    data-arch="<?= $item['pic_filename']; ?>"
                                    data-toggle="modal" 
                                    data-target="#modalEditar" 
                                    title = "Editar Registro" 
                                    type="submit">
                                        Editar
                                </button> 
                                                              
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    
</body>

</html>



                    

         