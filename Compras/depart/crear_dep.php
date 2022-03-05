<?php
    include("../db.php");
    include("includes/header_dep.php")?>


                    
                    <div class="card card-body w-50  ">
                        <form action="crear_dep.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" name="nombre" class= "form-control" placeholder ="ingrese nombre del departamento"autofocus>
                            <input type="text" name="estado" class= "form-control" placeholder ="ingrese el estado">
                        
                        </div>
                    
                        <input type="submit" class="btn btn-success btn-block"
                        name="guardar_dep" value="Guardar">  
                        </form>
                     </div>
                
    <?php
    include("includes/footer_dep.php");

    /* Guardando los datos ingresados por teclado*/

    if (isset($_POST['guardar_dep'])){ 
        $nombre= $_POST['nombre'];
        $estado= $_POST['estado'];
     
         $consulta= "INSERT INTO departamentos(nombre, estado) VALUES ('$nombre', '$estado')";
     
         $resultado= mysqli_query($conex, $consulta);
     
         if (!$resultado) {
             die("Falló el query");
         }
     
         $_SESSION['mensaje']='Registro guardado satisfactoriamente';
         $_SESSION['tipo_mensaje']='success';
     
        header("location:departamento.php");
      }
      
    
   ?>
