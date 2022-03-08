<?php
include("../db.php");
include("modelo_articulo.php");

/* Recibir datos por el metodo GET para poder editarlos */
$articulo = new Articulo();
if (isset($_GET['id'])) {
    $articulo->id=$_GET['id'];
    $articulo->get_default($conex);
}

/* actualizar la informacion ya editada */
if (isset($_POST['actualizar'])) {
    $articulo->update_values($_POST, $conex);
    $_SESSION['mensaje']='Tarea editada satisfactoriamente';
    $_SESSION['tipo_mensaje']='warning';
    header("location:articulo.php");
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <label for="descripcion">Descripcion</label>
                    <div class="form-group">
                        <input type="text" name="descripcion" value="<?php echo $articulo->descripcion;?>"class="form-control" 
                    cols="5" rows="2" placeholder="Actualice la descripcion"></textarea>

                    <label for="marca">Marca</label>
                    <div class="form-group">
                        <input type="text" name="marca" value=<?php echo $articulo->marca;?>  class="form-control" 
                        placeholder="Actualice el estado">
                    </div>
                    <label for="marca">Unidad Medida</label>
                    <div class="form-group">
                        <select name="unidad_medida" class="form-select">
                            <?php
                            $articulo->get_many2one_select('unidad_medida', 'cod', $conex);
                            ?>
                        </select>
                    </div>
                    <label for="existencia">Existencia</label>
                    <div class="form-group">
                        <input type="number" name="existencia" value=<?php echo $articulo->existencia;?>  class="form-control" 
                        placeholder="Actualice la existencia">
                    </div>
                    <label for="estado">Estado</label>
                    <div class="form-group">
                        <select name="estado" class="form-select">
                            <option value="activo" <?php if ($articulo->estado == "activo") { echo "selected";}?>>Activo</option>
                            <option value="inactivo" <?php if ($articulo->estado == "inactivo") { echo "selected";}?>>Inactivo</option>
                        </select>
                    </div>

                    <button class="btn btn-success mt-2" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>