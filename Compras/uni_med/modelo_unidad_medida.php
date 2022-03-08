<?php
    class UnidadMedida {
        public $cod;
        public $descripcion;
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
                $this->cod=$row['cod'];
                $this->descripcion=$row['descripcion'];
                $this->estado=$row['estado'];
    }
            
        }
        function get_many2one_select($table, $table_col, $conex) {
            $query = "SELECT id," . $table_col . " FROM " .  $table;
            $resultado = mysqli_query($conex, $query);
            while ($row = mysqli_fetch_array($resultado)) {
                echo("<option value=".$row[0].">".$row[1]."</option>)");
            };

        }

        function create_values($POST, $conex){
            $this->cod=$POST['cod'];
            $this->descripcion=$POST['descripcion'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_create());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function update_values($POST, $conex) {
            $this->cod=$POST['cod'];
            $this->descripcion=$POST['descripcion'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_update());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function get_query_one() {
            return "SELECT * FROM unidad_medida where id = " . $this->id;
        }

        function get_query() {
            $query = "SELECT unidad_medida.cod, unidad_medida.descripcion, unidad_medida.estado, unidad_medida.id FROM unidad_medida";
            if (isset($_POST['nombre_ar'])) {
                $query = ($query . ' where cod like "%'. $_POST["nombre_ar"] . '%"');
            }
            return $query;
        }
    
        function get_query_update(){
            return "UPDATE unidad_medida set 
            cod = '".$this->cod ."',
            descripcion ='".$this->descripcion ."',
            estado= '".$this->estado."'WHERE id= ". $this->id;
        }

        function get_query_create() {
            return "INSERT INTO unidad_medida(cod, descripcion, estado)
                    VALUES ('$this->cod','$this->descripcion','$this->estado')";
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