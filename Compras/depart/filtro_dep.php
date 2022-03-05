<?php
    include("../db.php");
    if (isset($_POST['buscar_dep'])) {
    $nombre=$_POST['nombre_dep'];
    $consulta="SELECT*FROM departamentos WHERE nombre_dep=$nombre";
    $resultado=mysqli_query($conex,$consulta);
    if (mysqli_num_rows($resultado)==1) {
        $row= mysqli_fetch_array($resultado);
        $nombre=$row['nombre'];
        $estado=$row['estado'];

    }

        if (!$resultado) {
        die("El query ha fallado");
        }
        /* $_SESSION['mensaje']='La tarea fue eliminada de manera satisfactoria';
         $_SESSION['tipo_mensaje']='danger';*/
    
         header("location:./departamento.php");
}
?>