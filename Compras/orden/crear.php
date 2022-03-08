<?php
    include("../db.php");
    include("includes/header.php");
    include("modelo_orden.php");

    $orden_compra = new Orden();
     /* Guardando los datos ingresados por teclado*/

     if (isset($_POST['guardar_ar'])){ 
        $orden_compra->create_values($_POST, $conex);
        $_SESSION['mensaje']='Registro guardado satisfactoriamente';
        $_SESSION['tipo_mensaje']='success';
        header("location:orden_compra.php");
      }
?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="crear.php" method="POST">
                    <label for="num_orden">Num Orden</label>
                    <div class="form-group">
                        <input type="text" name="num_orden" class="form-control" 
                    cols="5" rows="2" placeholder="Num Orden"></textarea>

                    <label for="fecha_orden">Fecha</label>
                    <div class="form-group">
                        <input type="date" name="fecha_orden" class="form-control"/>
                    </div>
                    <label for="articulo_id">Articulo</label>
                    <div class="form-group">
                        <select name="articulo_id" class="form-select">
                            <?php
                            $orden_compra->get_many2one_select('articulo', 'Marca', $conex);
                            ?>
                        </select>
                    </div>
                    <label for="camtidad">Cantidad</label>
                    <div class="form-group">
                        <input type="number" name="cantidad" class="form-control" 
                        placeholder="Cantidad">
                    </div>
                    
                    <label for="marca">Unidad Medida</label>
                    <div class="form-group">
                        <select name="unidad_medida" class="form-select">
                            <?php
                            $orden_compra->get_many2one_select('unidad_medida', 'cod', $conex);
                            ?>
                        </select>
                    </div>
                    <label for="costo_unitario">Costo Unitario</label>
                    <div class="form-group">
                        <input type="number" name="costo_unitario" class="form-control" 
                        placeholder="Costo unitario">
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