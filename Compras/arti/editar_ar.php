<?php
include("../db.php");
    /* Recibir datos por el metodo GET para poder editarlos */
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $consulta= "SELECT*FROM articulo WHERE id= $id";
    $resultado= mysqli_query($conex, $consulta);
    if (mysqli_num_rows($resultado)==1) {
        $row= mysqli_fetch_array($resultado);
        $descripcion=$row['descripcion'];
        $marca=$row['marca'];
        $unidad_medida=$row['unidad_medida'];
        $existencia=$row['existencia'];
        $estado=$row['estado'];

    }
}
    
        /* actualizar la informacion ya editada */
    if (isset($_POST['actualizar'])) {
        $id=$_GET['id'];
        $descripcion=$_POST['descripcion'];
        $marca=$_POST['marca'];
        $unidad_medida=$_POST['unidad_medida'];
        $existencia=$_POST['existencia'];
        $estado=$_POST['estado'];
        $consulta= "UPDATE articulo set descripcion= '$descripcion',marca='$marca',
        unidad_medida='$unidad_medida',existencia='$existencia', estado= '$estado'WHERE id= $id";
        mysqli_query($conex, $consulta);


        $_SESSION['mensaje']='Tarea editada satisfactoriamente';
        $_SESSION['tipo_mensaje']='warning';
    
        header("location:articulo.php");
    }


?>

<?php include("includes/header_ar.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_ar.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <div class="form-group">
                        <textarea name="descripcion" value="<?php echo $descripcion;?>"class="form-control" 
                    cols="5" rows="2" placeholder="Actualice la descripcion"></textarea>
                    <div class="form-group">
                        <input type="text" name="marca" value=<?php echo $marca;?>  class="form-control" 
                        placeholder="Actualice el estado">
                    </div>
                    <div class="form-group">
                        <input type="text" name="unidad_medida" value=<?php echo $unidad_medida;?>  class="form-control" 
                        placeholder="Actualice la unidad de medida">
                    </div>
                    <div class="form-group">
                        <input type="text" name="existencia" value=<?php echo $existencia;?>  class="form-control" 
                        placeholder="Actualice la existencia">
                    </div>
                    <div class="form-group">
                        <input type="text" name="estado" value=<?php echo $estado;?>  class="form-control" 
                        placeholder="Actualice el estado">
                    </div>
                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer_ar.php")?>