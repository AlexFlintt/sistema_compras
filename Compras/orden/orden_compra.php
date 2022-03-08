
<?php
    include("../db.php");
    include("includes/header.php");
    include("modelo_orden.php");
?>
<div class="container p-4">
    <script type="text/javascript">
        function confirmdelete() {
            var respuesta = confirm("¿Estás seguro que desea eliminar el registro?");
            if (respuesta == true) {
                return true;
            } 
            else{
                return false;
            }
        }
    </script>
        <div class="row">
            <div class="col-md-12">
                <?php
                    $orden = new Orden();
                    $orden->check_session();
                ?>
                <div class="card card-body">
                    <form action="orden_compra.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre_ar" class= "form-control" placeholder ="ingrese el nombre del orden"
                            autofocus>
                        </div>
                        <button class="btn btn-success btn-block" name="buscar_ar">Buscar</button> 
                    </form>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <div class="ml-5 mt-2">
                    <a href="crear.php" class="btn btn-primary btn-block" name="añadir_ar" >
                                Añadir </a>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">

                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>num_orden</th>
                        <th>Fecha</th>
                        <th>articulo_id</th>
                        <th>cantidad</th>

                        <th>Unidad Medida</th>
                        <th>Costo Unitario</th>
                        <th>estado</th>
                        <th>Costo Total</th>
                        
                        <th>Acciones</th>
                    </tr>
                    
                    </thead>
                    <tbody>    
                        <?php
                         /* Mostrara los registros de la base de datos en la pag */
                        $resultado_ar = $orden->resultado($conex);
                        while ($row = mysqli_fetch_array($resultado_ar)) 
                            {?>
                                <tr>
                                    <td><?php echo $row['0'] ?></td>
                                    <td><?php echo $row['1'] ?></td>
                                    <td><?php echo $row['2'] ?></td>
                                    <td><?php echo $row['3'] ?></td>
                                    <td><?php echo $row['4'] ?></td>
                                    <td><?php echo $row['5'] ?></td>
                                    <td><?php echo $row['6'] ?></td>
                                    <td><?php echo $row['7'] ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <!-- Boton de editar -->
                                                <a href=<?php $orden->editar($row['8'])?> class= "btn btn-secondary">
                                                    <i class="">Editar</i>
                                                </a> 
                                            </div>
                                                <div class="col-sm-5">
                                                    <!-- Confirmar o negar la eliminacion de un registro-->
                                                        <!-- Boton de eliminar -->
                                                <a href=<?php $orden->eliminiar($row['8'])?> class="btn btn-danger">
                                                    <i class="" onclick="return confirmdelete()">Eliminar</i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>