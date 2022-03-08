
<?php
    include("../db.php");
    include("includes/header.php");
    include("modelo_departamento.php");
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
                    $departamento = new Departamento();
                    $departamento->check_session();
                ?>
                <div class="card card-body">
                    <form action="departamento.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre_ar" class= "form-control" placeholder ="ingrese el nombre del departamento"
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
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         /* Mostrara los registros de la base de datos en la pag */
                        $resultado = $departamento->resultado($conex);
                        while ($row = mysqli_fetch_array($resultado)) 
                            {?>
                                <tr>
                                    <td><?php echo $row['0'] ?></td>
                                    <td><?php echo $row['1'] ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <!-- Boton de editar -->
                                                <a href=<?php $departamento->editar($row['2'])?> class= "btn btn-secondary">
                                                    <i class="">Editar</i>
                                                </a> 
                                            </div>
                                                <div class="col-sm-5">
                                                    <!-- Confirmar o negar la eliminacion de un registro-->
                                                        <!-- Boton de eliminar -->
                                                <a href=<?php $departamento->eliminiar($row['2'])?> class="btn btn-danger">
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