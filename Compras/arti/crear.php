<?php
    include("../db.php");
    include("includes/header.php");
    include("modelo_articulo.php");

    $articulo = new Articulo();
     /* Guardando los datos ingresados por teclado*/

     if (isset($_POST['guardar_ar'])){ 
        $articulo->create_values($_POST, $conex);
        $_SESSION['mensaje']='Registro guardado satisfactoriamente';
        $_SESSION['tipo_mensaje']='success';
        header("location:articulo.php");
      }
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="crear.php" method="POST">
                    <label for="descripcion">Descripcion</label>
                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control" 
                    cols="5" rows="2" placeholder="Descripcion"></textarea>

                    <label for="marca">Marca</label>
                    <div class="form-group">
                        <input type="text" name="marca" class="form-control" 
                        placeholder="Marca">
                    </div>
                    <label for="marca">Unidad Medida</label>
                    <div class="form-group">
                        <select name="unidad_medida" class="form-select">
                            <?php
                            $articulo->get_many2one_select('unidad_medida', 'cod', $conex);
                            ?>
                        </select>
                    </div>
                    <label for="existencia">Existencia</label>
                    <div class="form-group">
                        <input type="number" name="existencia" class="form-control" 
                        placeholder="Existencia">
                    </div>
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