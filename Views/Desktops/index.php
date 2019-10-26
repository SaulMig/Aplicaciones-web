<?php
    $mysqli=new mysqli('localhost','root','','proyecto');
?>

<div class="container">
    <div class="row">
        <main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Desktops</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-primary btn-circle" href="<?php echo URL ?>Desktops/agregar">+</a>
                    </div>
                </div>
            </div>

            <table class="responsive-table" id="tabla_content">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>

                        <th>Service Tag</th>
                        <th>Modelo</th>
                        <th>Garantia</th>
                        <th></th>
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
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container justify-content-md-center col-md-12 order-md-1">
                    <form class="was-validated"  method="POST" action="<?php echo URL?>Desktops/actualizar"  enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="service_tag">Service Tag</label>
                                <input type="text" class="form-control" id="service_tag" name="service_tag" required>
                                <div class="invalid-feedback">
                                    Ingresa el modelo
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="garantia">Garantia</label>
                                <input type="date" class="form-control " id="garantia" name="garantia" required>
                                <div class="invalid-feedback">
                                    Ingresa una marca
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="titulo">Modelo</label>
                                <select id="id_modelo" name="id_modelo" type="text" class="custom-select" name="id_modelo">
                                    <option value="" disabled selected>Selecciona el Modelo</option>
                                    <?php
                                    $sql=$mysqli->query("SELECT id_modelo,descripcion from modelo");
                                    while ($row=mysqli_fetch_array($sql)) {
                                        echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                    }
                                    ?>
                                </select>
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
<div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="mimodaleliminar" aria-hidden="true">
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
            $.get("<?php echo URL?>Desktops/modificar/" + id, function (res) {
                var datos = JSON.parse(res);
                $("#id").val(datos["id_equipo"]);
                $("#service_tag").val(datos["service_tag"]);
                $("#garantia").val(datos["garantia"]);
                $("#id_modelo").val(datos["id_modelo"]);
            });
            $("#mimodal").modal("show");
        });
        $("#body_table").on("click","a#elimina",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Desktops/eliminar/'+id;
            $("#eliminar_ok").attr("url",url);
            $("#modal_eliminar").modal("show");
        });
        $("#eliminar_ok").click(function(){
            $.get($(this).attr("url"),function(res){
                $("#body_table").empty().append(res);
            });
        });
    });
</script>
