<?php
$mysqli=new mysqli('localhost','root','','proyecto');

?>

<div class="container">
    <div class="row">
        <main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Asigna Equipo</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-primary btn-circle" href="<?php echo URL ?>Asigna_objetos/agregar">+</a>
                    </div>
                </div>
            </div>

            <table class="responsive-table" id="tabla_content">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Equipo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Direccion</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody id="body_table">
                    <?php
                    require_once ("tabla.php");
                    ?>
                    </tbody>
                </table>
        </main>
    </div>
</div>




<div class="modal fade" id="mimodal" tabindex="-1" role="dialog" aria-labelledby="mimodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container justify-content-md-center col-md-12 order-md-1">
                    <form class="was-validated"  method="POST" action="<?php echo URL?>Asigna_objetos/actualizar" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="IP">Direccion IP</label>
                                <input type="text" class="form-control" id="ip_address" name="ip_address" required>
                                <div class="invalid-feedback">
                                    Llena el campo
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="modelo" data-error="incorrecto" data-success="Correcto" >Modelo</label>
                                    <select id="id_modelo" type="text" class="custom-select" name="id_modelo">
                                        <option value="" disabled selected>Selecciona el modelo</option>
                                        <?php

                                        $sql=$mysqli->query("SELECT * from modelo");
                                        while ($row=mysqli_fetch_array($sql)) {
                                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-body">
                                <select id="id_tipo_objeto" type="text" class="custom-select" name="id_tipo_objeto">
                                    <option value="" disabled selected>Selecciona el equipo</option>
                                    <?php
                                    $returnobjt=$mysqli->query("SELECT * from tipo_objeto");
                                    while ($row=mysqli_fetch_array($returnobjt))
                                        echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                    ?>
                                </select>
                                <label for="objeto" data-error="incorrecto" data-success="Correcto" >Equipo</label>
                            </div>

                        <div class="modal-footer">
                            <button  class="btn btn-primary " id="enviar" type="submit">Agregar</button>
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
            $.get("<?php echo URL?>Asigna_Objetos/modificar/" + id, function (res) {
                var datos = JSON.parse(res);
                $("#id").val(datos["id_objeto"]);
                $("#ip_address").val(datos["ip_address"]);
                $("#id_modelo").val(datos["id_modelo"]);
                $("#id_tipo_objeto").val(datos["id_tipo_objeto"]);
            });
            $("#mimodal").modal("show");
        });
        $("#body_table").on("click","a#elimina",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Asigna_objetos/eliminar/'+id;
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
