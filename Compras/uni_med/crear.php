<?php
    include("../db.php");
    include("includes/header.php");
    include("modelo_unidad_medida.php");

    $unidad_medida = new UnidadMedida();
     /* Guardando los datos ingresados por teclado*/

     if (isset($_POST['guardar_ar'])){ 
        $unidad_medida->create_values($_POST, $conex);
        $_SESSION['mensaje']='Registro guardado satisfactoriamente';
        $_SESSION['tipo_mensaje']='success';
        header("location:uni_med.php");
      }
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="crear.php" method="POST">
                    <label for="cod">Cod</label>
                    <div class="form-group">
                        <input type="text" name="cod" class="form-control" 
                    cols="5" rows="2" placeholder="Cod"></textarea>
                    <label for="descripcion">Descripcion</label>
                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control" 
                    cols="5" rows="2" placeholder="Descripcion">
                    <label for="estado">Estado</label>
                    <div class="form-group">
                        <select name="estado" class="form-select">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                    <button class="btn btn-success mt-2" name="guardar_ar">
                        Crear
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
                
<?php
    include("includes/footer.php");
      
    
   ?>