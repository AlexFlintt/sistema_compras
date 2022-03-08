<?php
    class Articulo {

        public $descripcion;
        public $marca;
        public $unidad_medida;
        public $existencia;
        public $estado;

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
                $this->descripcion=$row['descripcion'];
                $this->marca=$row['marca'];
                $this->unidad_medida=$row['unidad_medida_id'];
                $this->existencia=$row['existencia'];
                $this->estado=$row['estado'];
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
            $this->descripcion=$POST['descripcion'];
            $this->marca=$POST['marca'];
            $this->unidad_medida=$POST['unidad_medida'];
            $this->existencia=$POST['existencia'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_create());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function update_values($POST, $conex) {
            $this->descripcion=$POST['descripcion'];
            $this->marca=$POST['marca'];
            $this->unidad_medida=$POST['unidad_medida'];
            $this->existencia=$POST['existencia'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_update());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function get_query_one() {
            return "SELECT * FROM articulo where id = " . $this->id;
        }

        function get_query() {
            $query = "SELECT articulo.marca, articulo.descripcion, unidad_medida.cod, 
                        articulo.existencia, articulo.estado, articulo.unidad_medida_id, articulo.id
                        FROM articulo LEFT JOIN  unidad_medida on articulo.unidad_medida_id = unidad_medida.id";
            if (isset($_POST['nombre_ar'])) {
                $query = ($query . ' where marca like "%'. $_POST["nombre_ar"] . '%"');
            }
            return $query;
        }
        
        function get_query_update(){
            return "UPDATE articulo set 
            descripcion ='".$this->descripcion ."',
            marca = '". $this->marca. "',
            unidad_medida_id = '".$this->unidad_medida."',
            existencia='".$this->existencia."', 
            estado= '".$this->estado."'WHERE id= ". $this->id;
        }

        function get_query_create() {
            return "INSERT INTO articulo(descripcion,marca,unidad_medida_id,existencia, estado)
                    VALUES ('$this->descripcion','$this->marca','$this->unidad_medida','$this->existencia', '$this->estado')";
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