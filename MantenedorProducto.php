<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- import sweet alert-->
        <script src="./assets/alertas/sweetalert2.all.js"></script>
        <!-- import jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- import Bootstrap -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="./assets/css/css/fontawesome-all.min.css">
        <script src="./assets/js/FunctionProducto.js"></script>


    </head>
    <body background="./assets/img/f.jpg">



        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <a class="navbar-brand" href="#">
                <img src="./assets/img/inacap.png" width="150" height="70" >
            </a>
            <ul class="nav nav-pills nav-fills">
                <li class="nav-item">
                    <a class="nav-link active"  href="index.php">Cerrar sesión</a>
                </li>
            </ul>
        </nav>



        <div id="wrapper" class="col-xs-12 col-sm-8 col-md-12">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav ifondo">
                    <li class="sidebar-brand">
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="MantenedorProducto.php" >  Productos</a>
                    </li>
                    <li>
                        <a href="RegistroUsuarios.html">Usuarios</a>
                    </li>
                    <li>
                        <a href="Prestamos.html">Prestamos</a>
                    </li>
                    <li>
                        <a href="Hsalida.html">Historial salida</a>
                    </li>
                    <li>
                        <a href="Hentrada.html">Historial entrada</a>
                    </li>
                    <li>
                        <a href="AgregarStock.html">Stock</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <?php include 'EmergeteProductoIng.php'; ?>
            <?php include 'EmergenteModProducto.php'; ?>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">

                    <br>
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="#menu-toggle" style="background-color: #f44336"  class="btn btn-danger" id="menu-toggle">
                                <i class="fa fa-bars"></i></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body ">
                                    <h1 class="text-center">Mantenedor Familias </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-outline-success btn-lg" onclick=desplegar()><i class="fas fa-cart-plus"></i></button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col sm-12">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-sm table-striped table-bordered table-responsive-md">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Producto</th>
                                                <th>subFamilia</th>
                                                <th>Unidad de medida</th>
                                                <th>Stock minimo</th>
                                                <th colspan="2">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="TbProductos">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="checkbox offset-sm-10">
                                                        <label>
                                                            <input type="checkbox" id="ch_visual" name="ch_visual">Ver Productos Eliminados
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->



        <footer class="footer">
            <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">
                    <img src="./assets/img/inacap.png" width="150" height="70" >
                </a>
                <ul class="nav nav-pills nav-fills">
                    <li class="nav-item">

                    </li>
                </ul>
            </nav>
        </footer>

        <script src="./assets/js/funciones.js"></script>
    </body>
</html>
