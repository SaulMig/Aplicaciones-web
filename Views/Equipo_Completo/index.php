


<div class="modal fade" id="modal_registro"  tabindex="-1" role="dialog" aria-labelledby="modal_registro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">Asignacion de Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <div class="row">
                    <form class="was-validated"  action="" id="save_equipo" enctype="multipart/form-data" autocomplete="off">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-6">
                                    <label for="equipo" data-error="incorrecto" data-success="Correcto" >Service Tag</label>

                                    <select id="id_equipo" type="text" class="custom-select" name="id_equipo">
                                        <option value="" disabled selected>Selecciona el Service Tag</option>
                                        <?php
                                        $returnserv=$datos[1];
                                        while ($row=mysqli_fetch_array($returnserv))
                                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class=" col s6">
                                    <label for="teclado" data-error="incorrecto" data-success="Correcto" >Teclado</label>

                                    <select id="id_teclado" type="text" class="custom-select" name="id_teclado">
                                        <option value="" disabled selected>Selecciona el Teclado</option>
                                        <?php
                                        $returntc=$datos[2];
                                        while ($row=mysqli_fetch_array($returntc))
                                            echo "<option value='{$row[2]}'>{$row[1]}</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6">
                                    <label for="mouse" data-error="incorrecto" data-success="Correcto" >Mouse</label>
                                    <select id="id_mouse" type="text" class="custom-select" name="id_mouse">
                                        <option value="" disabled selected>Selecciona el Teclado</option>
                                        <?php
                                        $returnmo=$datos[3];
                                        while ($row=mysqli_fetch_array($returnmo))
                                            echo "<option value='{$row[2]}'>{$row[1]}</option>";
                                        ?>
                                    </select>
                                </div>
                                <div class="col s4">
                                    <label for="monitor" data-error="incorrecto" data-success="Correcto" >Monitor</label>
                                    <select id="id_monitor" type="text" class="custom-select" name="id_monitor">
                                        <option value="" disabled selected>Selecciona el Teclado</option>
                                        <?php
                                        $returnmo=$datos[4];
                                        while ($row=mysqli_fetch_array($returnmo))
                                            echo "<option value='{$row[2]}'>{$row[1]}</option>";
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="input-field col s10">
                                    <button type="button" class="btn btn-primary" id="save_equipo_ok" data-dismiss="modal">Registrar</button>
                                </div>
                                <div class="input-field col s10">
                                    <button type="button" id="update_equipo_ok" class="btn btn-outline-secondary" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Equipo Completo</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="#modal_registro" class="btn  white-text modal-trigger" id="add_asigna_e"">
                        <i class="btn btn-primary btn-circle" ">+</i>
                    </a>
                </div>

            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item dropdown"></li>
                        <li class="nav-item"></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Descripcion" class="form-control mr-sm-2">
                        <button class="btn btn-outline-success my-2 my-sm-0" disabled>
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </div>
            </nav>
            <table class="table" id="myTable">
                <thead class="thead-dark">
                <tr>
                    <th>Tipo</th>
                    <th>Service Tag</th>
                    <th>Teclado</th>
                    <th>Mouse</th>
                    <th>Monitor</th>
                    <th></th>
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
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto"></strong>

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
        $('#add_asigna_e').click(function () {/*BOTON*/
            $("#update_equipo_ok").hide();/*botones*/
            $("#save_equipo_ok").show();/*botones*/
            $("#modal_registro").modal("show");
        });
        $("#save_equipo_ok").click(function(){
            $("#save_equipo").submit();
        });

        $("#body_table").on("click","a.btn_elimina",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Equipo_Completo/eliminar/'+id;
            $("#eliminar_ok").attr("url",url);
            $("#modal_eliminar").modal("show");
        });
        $("#eliminar_ok").click(function(){
            $.get($(this).attr("url"),function(res){
                $("#body_table").empty().append(res);
            });
        });


        $("#body_table").on("click","a.btn_actualiza",function() {
            $("#save_equipo_ok").hide();
            $("#update_equipo_ok").show();
            var id = $(this).data("id");
            $.get("<?php echo URL?>Equipo_Completo/modificar/" + id, function (res) {
                var datos = JSON.parse(res);
                $("#update_equipo_ok").data("id", datos["id_equipo_completo"]);
                $("#id_equipo_completo").val(datos["id_equipo_completo"]);
                $("#id_equipo").val(datos["id_equipo"]);
                $("#id_teclado").val(datos["id_teclado"]);
                $("#id_mouse").val(datos["id_mouse"]);
                $("#id_monitor").val(datos["id_monitor"]);
            });
            $("#update_equipo_ok").click(function () {
                var id = $(this).data("id");
                console.log($("#save_equipo").serialize());
                $.post("<?php echo URL?>Equipo_Completo/actualizar/" + id, $("#save_equipo").serialize(), function (res) {
                    $('#save_equipo').find(' option ').val('');
                    $("#body_table").empty().append(res);

                });
            });
            $("#modal_registro").modal("show");
        });

    });
    $("#save_equipo").validate({
        submitHandler:function(form){
            $.post("<?php echo URL?>Equipo_Completo/crear",$("#save_equipo").serialize(),function (res) {
                $("#body_table").empty().append(res);
                $('#save_equipo').find(' option').val('');

            })
        }
    });




    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

