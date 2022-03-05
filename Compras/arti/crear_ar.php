<?php
    include("../db.php");
    include("includes/header_ar.php")?>

                    
                    <div class="card card-body w-50  ">
                        <form action="crear_ar.php" method="POST">
                        <div class="form-group mb-3">
                        <textarea name="descripcion" class= "form-control" cols="5" rows="2"placeholder ="ingrese la descripcion"autofocus></textarea>
                            <input type="text" name="marca" class= "form-control" placeholder ="ingrese la marca">
                            <input type="text" name="unidad_medida" class= "form-control" placeholder ="ingrese la unidad de medida">
                            <input type="text" name="existencia" class= "form-control" placeholder ="ingrese la existencia">
                            <input type="text" name="estado" class= "form-control" placeholder ="ingrese el estado">
                        
                        </div>
                    
                        <input type="submit" class="btn btn-success btn-block"
                        name="guardar_ar" value="Guardar">  
                        </form>
                     </div>
                
    <?php
    include("includes/footer_ar.php");

    /* Guardando los datos ingresados por teclado*/

    if (isset($_POST['guardar_ar'])){ 
        $descripcion= $_POST['descripcion'];
        $marca=$_POST['marca'];
        $unidad_medida=$_POST['unidad_medida'];
        $existencia=$_POST['existencia'];
        $estado= $_POST['estado'];
     
         $consulta= "INSERT INTO articulo(descripcion,marca,unidad_medida,existencia, estado)
          VALUES ('$descripcion','$marca','$unidad_medida','$existencia', '$estado')";
     
         $resultado= mysqli_query($conex, $consulta);
     
         if (!$resultado) {
             die("Falló el query");
         }
     
         $_SESSION['mensaje']='Registro guardado satisfactoriamente';
         $_SESSION['tipo_mensaje']='success';
     
        header("location:articulo.php");
      }
      
    
   ?>