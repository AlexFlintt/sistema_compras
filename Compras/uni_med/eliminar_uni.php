<?php
include("../db.php");

 /* Eliminar registros de la base de datos */
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $consulta= "DELETE FROM unidad_medida WHERE id = $id";
    $resultado= mysqli_query($conex, $consulta);
    if (!$resultado) {
        die("El query ha fallado");
    }
    $_SESSION['mensaje']='La tarea fue eliminada de manera satisfactoria';
    $_SESSION['tipo_mensaje']='danger';
    
    header("location:uni_med.php");
}

?>