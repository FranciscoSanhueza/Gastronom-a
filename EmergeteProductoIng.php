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
        <div class="modal fade" id="modalIng">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ingreso Productos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>

                    </div>
                    <form class="form-horizontal" id="frmProducto" action="#" method="POST">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="txt_nombre" class="col-sm-3 control-label">Nombre:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Nombre del Producto" name="txt_nombre" id="txt_nombre" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_subfamilia" class="col-sm-3 control-label">Sub-Familia:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="txt_subfamilia" id="txt_subfamilia">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="selectUnidad" class="col-sm-3 control-label">Unidad de medida:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="txt_unidad" id="txt_unidad">
                                        <option value="1">KiloGramo</option>
                                        <option value="2">Litro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="txt_stock" class="col-sm-3 control-label">Stock Minimo:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" placeholder="Stock Minimo" name="txt_stock" id="txt_stock" required="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary" id="btn_insert">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
