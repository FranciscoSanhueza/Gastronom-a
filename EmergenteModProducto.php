<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
    </head>
    <body>
        <!-- provando modal-->
        <form method="post" action="">
            <div class="form-group">
                <label for="txt_nombre">Text</label>
                <input id="txt_nombre" class="form-control" type="text" name="txt_nombre">
            </div>
        </form>
        <div class="modal fade" id="modalmod">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificacion de Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                        
                    </div>
                    <form class="form-horizontal"id="frmProducto_mod" action="#" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txt_id_mod" class="col-sm-3 control-label">Codigo:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="txt_id_mod" id="txt_id_mod" required="" readonly="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_nombre_mod" class="col-sm-3 control-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Nombre del Producto" name="txt_nombre_mod" id="txt_nombre_mod" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_subfamilia_mod" class="col-sm-3 control-label">Sub-Familia:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="txt_subfamilia_mod" id="txt_subfamilia_mod">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_unidad_mod" class="col-sm-3 control-label">Unidad de medida:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="txt_unidad_mod" id="txt_unidad_mod">
                                        <option value="1">KiloGramo</option>
                                        <option value="2">Litro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_stock_mod" class="col-sm-3 control-label">Stock Minimo:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Stock Minimo" name="txt_stock_mod" id="txt_stock_mod" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_estado_mod" class="col-sm-3 control-label">Estado:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="txt_estado_mod" id="txt_estado_mod">
                                        <option value="1">Activo</option>
                                        <option value="2">Desabilitado</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="btm_mod">Modificar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</html>
