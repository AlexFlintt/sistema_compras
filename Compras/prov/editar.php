<?php
include("../db.php");
include("modelo_proveedor.php");

/* Recibir datos por el metodo GET para poder editarlos */
$proveedor = new Proveedor();
if (isset($_GET['id'])) {
    $proveedor->id=$_GET['id'];
    $proveedor->get_default($conex);
}

/* actualizar la informacion ya editada */
if (isset($_POST['actualizar'])) {
    $proveedor->update_values($_POST, $conex);
    $_SESSION['mensaje']='Tarea editada satisfactoriamente';
    $_SESSION['tipo_mensaje']='warning';
    header("location:proveedor.php");
}
?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <label for="rnc_cedula">RNC/Cedula</label>
                    <div class="form-group">
                        <input type="text" name="rnc_cedula" class="form-control" 
                    cols="5" rows="2" placeholder="Actualice el RNC/Cedula" value=<?php echo $proveedor->rnc_cedula;?>>
                    <label for="nombre_comercial">Nombre Comercial</label>
                    <div class="form-group">
                        <input type="text" name="nombre_comercial" value=<?php echo $proveedor->nombre_comercial;?>  class="form-control" 
                        placeholder="Actualice el nombre ">
                    </div>
                    <label for="estado">Estado</label>
                    <div class="form-group">
                        <select name="estado" class="form-select">
                            <option value="activo" <?php if ($proveedor->estado == "activo") { echo "selected";}?>>Activo</option>
                            <option value="inactivo" <?php if ($proveedor->estado == "inactivo") { echo "selected";}?>>Inactivo</option>
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