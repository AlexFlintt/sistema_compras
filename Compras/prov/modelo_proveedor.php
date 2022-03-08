<?php
    class Proveedor  {

        public $rnc_cedula;
        public $nombre_comercial;
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
                $this->rnc_cedula=$row['rnc_cedula'];
                $this->nombre_comercial=$row['nombre_comercial'];
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
            $this->rnc_cedula=$POST['rnc_cedula'];
            $this->nombre_comercial=$POST['nombre_comercial'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_create());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function update_values($POST, $conex) {
            $this->rnc_cedula=$POST['rnc_cedula'];
            $this->nombre_comercial=$POST['nombre_comercial'];
            $this->estado=$POST['estado'];
            $resultado = mysqli_query($conex, $this->get_query_update());
            if (!$resultado) {
                die("Falló el query");
            }
        }

        function get_query_one() {
            return "SELECT * FROM proveedor where id = " . $this->id;
        }

        function get_query() {
            $query = "SELECT proveedor.rnc_cedula, proveedor.nombre_comercial, proveedor.estado, proveedor.id FROM proveedor ";
            if (isset($_POST['nombre_ar'])) {
                $query = ($query . ' where proveedor.nombre like "'. $_POST["nombre_ar"] . '%"');
            }
            return $query;
        }
        
        function get_query_update(){
            return "UPDATE proveedor set 
            rnc_cedula ='".$this->rnc_cedula ."',
            nombre_comercial ='".$this->nombre_comercial ."',
            estado = '".$this->estado."'WHERE id= ". $this->id;
        }

        function get_query_create() {
            return "INSERT INTO proveedor(rnc_cedula,nombre_comercial, estado)
                    VALUES ('$this->rnc_cedula','$this->nombre_comercial', '$this->estado')";
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