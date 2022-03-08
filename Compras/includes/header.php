<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Compras</title>
        <!-- CSS-->
        <link rel="stylesheet" href="includes/estilos.css">
        <!-- Boostrap 4 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
         rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
         <!-- Font Awesome5-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

      
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Sistema De Compras</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Tablero</p>
            <li class="active">
                <a href="index.php" data-toggle="collapse" aria-expanded="false" >Home</a>
               
            </li>
            <li>
                <a href="depart/departamento.php">Departamento</a>
            </li>
            <li>
                <a href="arti/articulo.php" data-toggle="collapse" aria-expanded="false" >Articulos</a>
               
            </li>
            <li>
                <a href="orden/orden_compra.php">Orden Compra</a>
            </li>
            <li>
                <a href="uni_med/uni_med.php">Unidades De Medidas</a>
            </li>
        </ul>
    </nav>

</div>
