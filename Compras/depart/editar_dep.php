<?php
include("../db.php");
    /* Recibir datos por el metodo GET para poder editarlos */
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $consulta= "SELECT*FROM departamentos WHERE id= $id";
    $resultado= mysqli_query($conex, $consulta);
    if (mysqli_num_rows($resultado)==1) {
        $row= mysqli_fetch_array($resultado);
        $nombre=$row['nombre'];
        $estado=$row['estado'];

    }
}
    
        /* actualizar la informacion ya editada */
    if (isset($_POST['actualizar'])) {
        $id=$_GET['id'];
        $nombre=$_POST['nombre'];
        $estado=$_POST['estado'];
        $consulta= "UPDATE departamentos set nombre= '$nombre', estado= '$estado'WHERE id= $id";
        mysqli_query($conex, $consulta);


        $_SESSION['mensaje']='Tarea editada satisfactoriamente';
        $_SESSION['tipo_mensaje']='warning';
    
        header("location:departamento.php");
    }


?>

<?php include("includes/header_dep.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar_dep.php?id=<?php echo $_GET ['id']; ?> "method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre;?>"class="form-control" 
                        placeholder="Actualice el departamento">
                    </div>
                    <div class="form-group">
                        <input type="text" name="estado"  class="form-control" 
                        placeholder="Actualice el estado"><?php echo $estado;?>
                    </div>
                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer_dep.php")?>