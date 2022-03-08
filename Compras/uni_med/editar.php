<?php
include("../db.php");
include("modelo_unidad_medida.php");

/* Recibir datos por el metodo GET para poder editarlos */
$unidad_medida = new UnidadMedida();
if (isset($_GET['id'])) {
    $unidad_medida->id=$_GET['id'];
    $unidad_medida->get_default($conex);
}

/* actualizar la informacion ya editada */
if (isset($_POST['actualizar'])) {
    $unidad_medida->update_values($_POST, $conex);
    $_SESSION['mensaje']='Tarea editada satisfactoriamente';
    $_SESSION['tipo_mensaje']='warning';
    header("location:uni_med.php");
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <label for="cod">Cod</label>
                    <div class="form-group">
                        <input type="text" name="cod" value="<?php echo $unidad_medida->cod;?>"class="form-control" 
                        cols="5" rows="2" placeholder="Actualice el cod"></textarea>
                    </div>
                    <label for="descripcion">Descripcion</label>
                    <div class="form-group">
                        <input type="text" name="descripcion" value="<?php echo $unidad_medida->descripcion;?>"class="form-control" 
                        cols="5" rows="2" placeholder="Actualice la descripcion"></textarea>
                    </div>
                    <label for="estado">Estado</label>
                    <div class="form-group">
                        <select name="estado" class="form-select">
                            <option value="activo" <?php if ($unidad_medida->estado == "activo") { echo "selected";}?>>Activo</option>
                            <option value="inactivo" <?php if ($unidad_medida->estado == "inactivo") { echo "selected";}?>>Inactivo</option>
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