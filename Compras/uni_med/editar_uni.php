<?php
include("../db.php");
    /* Recibir datos por el metodo GET para poder editarlos */
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $consulta= "SELECT*FROM unidad_medida WHERE id= $id";
    $resultado= mysqli_query($conex, $consulta);
    if (mysqli_num_rows($resultado)==1) {
        $row= mysqli_fetch_array($resultado);
        $descripcion=$row['descripcion'];
        $estado=$row['estado'];

    }
}
    
        /* actualizar la informacion ya editada */
    if (isset($_POST['actualizar'])) {
        $id=$_GET['id'];
        $descripcion=$_POST['descripcion'];
        $estado=$_POST['estado'];
        $consulta= "UPDATE unidad_medida set descripcion= '$descripcion', estado= '$estado'WHERE id= $id";
        mysqli_query($conex, $consulta);


        $_SESSION['mensaje']='Tarea editada satisfactoriamente';
        $_SESSION['tipo_mensaje']='warning';
    
        header("location:uni_med.php");
    }


?>

<?php include("includes/header_uni.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_uni.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <div class="form-group">
                        <input type="text" name="descripcion" value="<?php echo $descripcion;?>"class="form-control" 
                        placeholder="Actualice la descripcion">
                    </div>
                    <div class="form-group">
                        <input type="text" name="estado" value="<?php echo $estado;?>"class="form-control" 
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


<?php include("includes/footer_uni.php")?>