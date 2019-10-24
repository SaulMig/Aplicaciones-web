<?php
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




<div class="modal fade" id="mimodalagregar" tabindex="-1" role="dialog" aria-labelledby="mimodalagregar" aria-hidden="true">
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
                    <form class="was-validated"  method="POST" action="<?php echo URL?>Asigna_objetos/agregar" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="direccionIP">Direccion IP</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            <div class="invalid-feedback">
                                Llena el campo
                            </div>
                        </div>

                        <div class="input-field col s4">
                            <select id="modelo" type="text" class="validate" name="modelo">
                                <option value="" disabled selected>Selecciona el modelo</option>
                                <?php
                                $returnmod=$datos[1];
                                while ($row=mysqli_fetch_array($returnmod))
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                ?>
                            </select>
                            <label for="id_modelo" data-error="incorrecto" data-success="Correcto" >Habitacion</label>
                        </div>





                        <div class="form-group">
                            <label for="equipo">Equipo</label>
                            <input type="text" class="form-control" id="id_tipo_objeto" name="id_tipo_objeto" required>
                            <div class="invalid-feedback">
                                Llena el campo
                            </div>
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
        $("#body_table").on("click","a#elimina",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Asigna_objetos/eliminar/'+id;
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
