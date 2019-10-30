<?php
?>
<div class="container">
    <div class="row">
        <main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Equipo de Oficina/Piso</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-primary btn-circle" href="<?php echo URL ?>Equipo_OP/agregar">+</a>
                    </div>
                </div>
            </div>
    <div class="">
        <div class="">
            <div class="">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Equipo de Oficina/Piso</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="body_table">
                    <?php
                    require_once ("tabla.php");
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<div class="modal fade" id="mimodal" tabindex="-1" role="dialog" aria-labelledby="mimodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container justify-content-md-center col-md-12 order-md-1">
                    <form class="was-validated"  method="POST" action="<?php echo URL?>Equipo_OP/actualizar"  enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-3">
                            <label for="titulo">Descripcion</label>
                            <input type="hidden" name="id" id="id" value="">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Campo Requerido
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button  class="btn btn-primary " id="enviar" type="submit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mimodaleliminar" tabindex="-1" role="dialog" aria-labelledby="mimodaleliminar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de eliminar el registro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button"  id="eliminar_ok" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#body_table").on("click","a#act",function() {
            var id = $(this).data("id");
            $.get("<?php echo URL?>Equipo_OP/modificar/" + id, function (res) {
                var datos = JSON.parse(res);
                $("#id").val(datos["id_tipo_objeto"]);
                $("#descripcion").val(datos["descripcion"]);
            });
            $("#mimodal").modal("show");
        });
        $("#body_table").on("click","a#elimina",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Equipo_OP/eliminar/'+id;
            $("#eliminar_ok").attr("url",url);
            $("#mimodaleliminar").modal("show");
        });
        $("#eliminar_ok").click(function(){
            $.get($(this).attr("url"),function(res){
                $("#body_table").empty().append(res);
            });
        });
    });
</script>