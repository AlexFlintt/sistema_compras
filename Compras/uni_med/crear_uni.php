<?php
    include("../db.php");
    include("includes/header_uni.php")?>


                    
                    <div class="card card-body w-50  ">
                        <form action="crear_uni.php" method="POST">
                        <div class="form-group mb-3">
                            <textarea name="descripcion" class= "form-control" placeholder ="ingrese la descripcion de la unidad de medida"autofocus></textarea>
                            <input type="text" name="estado" class= "form-control" placeholder ="ingrese el estado">
                        
                        </div>
                    
                        <input type="submit" class="btn btn-success btn-block"
                        name="guardar_uni" value="Guardar">  
                        </form>
                     </div>
                
    <?php
    include("includes/footer_uni.php");

    /* Guardando los datos ingresados por teclado*/

    if (isset($_POST['guardar_uni'])){ 
        $descripcion= $_POST['descripcion'];
        $estado= $_POST['estado'];
     
         $consulta= "INSERT INTO unidad_medida(descripcion, estado) VALUES ('$descripcion', '$estado')";
     
         $resultado= mysqli_query($conex, $consulta);
     
         if (!$resultado) {
             die("Falló el query");
         }
     
         $_SESSION['mensaje']='Registro guardado satisfactoriamente';
         $_SESSION['tipo_mensaje']='success';
     
        header("location:uni_med.php");
      }
      
    
   ?>