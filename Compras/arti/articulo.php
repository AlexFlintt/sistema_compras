
<?php 
    include("../db.php");
    include("includes/header_ar.php")?>

    <div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['mensaje'])) { ?>

                <div class="alert alert-<?=$_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['mensaje']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>
            
            

            <div class="card card-body">
                <form action="guardar_ar.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="nombre_ar" class= "form-control" placeholder ="ingrese el nombre del articulo"
                        autofocus>
                    </div>
                    
                    <button class="btn btn-success btn-block" name="buscar_ar">Buscar</button> 
                </form>
            </div>
                </div>
            <div class="col-md-8">
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Descripcion</th>
                        <th>Marca</th>
                        <th>Unidad De Medida</th>
                        <th>Existencia</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    
                    </thead>
                    <tbody>
                        <form>
                            <a href="crear_ar.php" class="btn btn-primary btn-block" name="añadir_ar" >
                           Añadir </a>
                            
                        
                        <?php
                         /* Mostrara los registros de la base de datos en la pag */

                        $query= "SELECT*FROM articulo ";
                        $resultado_ar = mysqli_query($conex, $query);
                        while ($row = mysqli_fetch_array($resultado_ar)) {?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['descripcion'] ?></td>
                                <td><?php echo $row['marca'] ?></td>
                                <td><?php echo $row['unidad_medida'] ?></td>
                                <td><?php echo $row['existencia'] ?></td>
                                <td><?php echo $row['estado'] ?></td>
                                <td>

                                        <!-- Boton de editar -->

                                    <a href="editar_ar.php?id=<?php echo $row['id']?>" class= "btn btn-secondary">
                                    <i class="">Editar</i>
                                    </a> 
                                        <!-- Confirmar o negar la eliminacion de un registro-->

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

                                            <!-- Boton de eliminar -->
                                    <a href="eliminar_ar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="" onclick="return confirmdelete()">Eliminar</i>
                                    </a>
                                </td>
                            </tr>


                        <?php }?>
                    </tbody>
            </table>
        </div>
    </div>

</div>

 <?php include("includes/footer_ar.php") ?>
