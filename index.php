<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
        <script>
            $(document).ready(function () {
                $('#frmLogin').submit(function () {
                    $.ajax({
                        data: $(this).serialize() + "&action=loginUsuario",
                        url: 'core/controler/Usuario/ControladorUsuario.php',
                        type: 'POST',
                        dataType: "JSON",
                        success: function (res) {
                            location.href="MantenedorProducto.php";
                        }
                    });
                    return false;
                })
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">

        </div>



        <div class="container-fluid bg ">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <a href="#" class="img-left"><img src="./assets/img/inacapp.png" width="200px" height="100px"></a> 
                </div>
                <div class="col-md-4 col-sm-8 col-lg-4 col-xs-12">
                    <!-- form -->
                    <form class="form-container" id="frmLogin" action="#" method="POST">
                        <h1>Inicio Sesión</h1>
                        <div class="form-group">
                            <label for="txt_user">Usuario</label>
                            <input type="text" class="form-control" id="txt_user" name="txt_user" placeholder="Ingrese su Run">
                        </div>
                        <div class="form-group">
                            <label for="txt_pass">Contraseña</label>
                            <input type="password" class="form-control" id="txt_pass" name="txt_pass" placeholder="ingrese su contraseña">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
                            <button type="button" class="btn btn-link" ><a href="sw.html">Olvide mi clave</a></button>
                        </div>
                        <button class="btn btn-danger btn-block">Ingresar</button>
                    </form>
                    <!-- form end -->  
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
            </div>

        </div>
    </body>
</html>