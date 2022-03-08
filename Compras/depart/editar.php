<?php
include("../db.php");
include("modelo_departamento.php");

/* Recibir datos por el metodo GET para poder editarlos */
$departamento = new Departamento();
if (isset($_GET['id'])) {
    $departamento->id=$_GET['id'];
    $departamento->get_default($conex);
}

/* actualizar la informacion ya editada */
if (isset($_POST['actualizar'])) {
    $departamento->update_values($_POST, $conex);
    $_SESSION['mensaje']='Tarea editada satisfactoriamente';
    $_SESSION['tipo_mensaje']='warning';
    header("location:departamento.php");
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <label for="nombre">Nombre</label>
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $departamento->nombre;?>"class="form-control" 
                    cols="5" rows="2" placeholder="Actualice la descripcion"></textarea>
                    </div>
                    <label for="estado">Estado</label>
                    <div class="form-group">
                        <select name="estado" class="form-select">
                            <option value="activo" <?php if ($departamento->estado == "activo") { echo "selected";}?>>Activo</option>
                            <option value="inactivo" <?php if ($departamento->estado == "inactivo") { echo "selected";}?>>Inactivo</option>
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