<?php
    class Orden {

        public $num_orden;
        public $fecha_orden;
        public $articulo_id;
        public $cantidad;
        public $unidad_medida_id;
        public $costo_unitario;
        public $estado;
        public $costo_total;

        function check_session() {
            if (isset($_SESSION['mensaje'])) {
                
                echo('<div class="alert alert-'.$_SESSION["tipo_mensaje"] .' alert-dismissible fade show" role="alert">'.
                    $_SESSION["mensaje"].'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
                );
                session_unset();
            }
        }
        function get_default($conex) {
            $resultado= mysqli_query($conex, $this->get_query_one());
            if (mysqli_num_rows($resultado)==1) {
                $row= mysqli_fetch_array($resultado);
                $this->num_orden=$row['num_orden'];
                $this->fecha_orden=$row['fecha_orden'];
                $this->articulo_id=$row['articulo_id'];
                $this->cantidad=$row['cantidad'];
                $this->unidad_medida_id=$row['unidad_medida_id'];
                $this->costo_unitario=$row['costo_unitario'];
                $this->estado=$row['estado'];
                $this->costo_total=$row['costo_total'];
    }
            
        }
        function get_many2one_select($table, $table_col, $conex) {
            $query = "SELECT id," . $table_col . " FROM " .  $table;
            $resultado = mysqli_query($conex, $query);
            while ($row = mysqli_fetch_array($resultado)) {
                echo($query);
                echo("<option value=".$row[0].">".$row[1]."</option>)");
            };

        }

        function create_values($POST, $conex){
            $this->num_orden=$POST['num_orden'];
            $this->fecha_orden=$POST['fecha_orden'];
            $this->articulo_id=$POST['articulo_id'];
            $this->cantidad=$POST['cantidad'];
            $this->unidad_medida_id=$POST['unidad_medida_id'];
            $this->costo_unitario=$POST['costo_unitario'];
            $this->estado=$POST['estado'];
            $this->costo_total=$POST['costo_total'];
            $resultado = mysqli_query($conex, $this->get_query_create());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function update_values($POST, $conex) {
            $this->num_orden=$POST['num_orden'];
            $this->fecha_orden=$POST['fecha_orden'];
            $this->articulo_id=$POST['articulo_id'];
            $this->cantidad=$POST['cantidad'];
            $this->unidad_medida_id=$POST['unidad_medida_id'];
            $this->costo_unitario=$POST['costo_unitario'];
            $this->estado=$POST['estado'];
            $this->costo_total=$POST['costo_total'];
            $resultado = mysqli_query($conex, $this->get_query_update());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function get_query_one() {
            return "SELECT * FROM orden_compra where id = " . $this->id;
        }

        function get_query() {
            $query = "SELECT num_orden, fecha_orden, articulo_id, cantidad, unidad_medida_id, costo_unitario, estado, costo_total, id FROM orden_compra";
            if (isset($_POST['nombre_ar'])) {
                $query = ($query . ' where num_orden like "%'. $_POST["nombre_ar"] . '%"');
            }
            return $query;
        }

        function get_query_update(){
            return "UPDATE orden_compra set 
            num_orden ='".$this->num_orden ."',
            fecha_orden = '". $this->fecha_orden. "',
            articulo_id = '". $this->articulo_id. "',
            cantidad = '". $this->cantidad. "',
            unidad_medida_id = '". $this->unidad_medida_id. "',
            costo_unitario = '".$this->costo_unitario."',
            estado = '".$this->estado."',
            costo_total= '".$this->costo_total."' WHERE id= ". $this->id;
        }

        function get_query_create() {
            return "INSERT INTO orden_compra(num_orden,fecha_orden, articulo_id, 
                                            cantidad, unidad_medida_id, 
                                            costo_unitario, estado, costo_total)
                    VALUES ('$this->num_orden','$this->fecha_orden','$this->articulo_id',
                            '$this->cantidad', '$this->unidad_medida_id', '$this->costo_unitario', 
                            '$this->estado', '".($this->cantidad*$this->costo_unitario)."' )";
        }

        function resultado($conex) {
            return mysqli_query($conex, $this->get_query());
        }
        function editar($id) {
            echo 'editar.php?id='.$id;
        }
        function eliminiar($id) {
            echo 'eliminar.php?id='.$id;
        }
    }
?>