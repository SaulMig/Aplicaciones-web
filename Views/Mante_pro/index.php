<?php
$mysqli=new mysqli('localhost','root','','proyecto');
?>


<div class="container">
    <div class="row">
        <main role="main" class="col-md-12">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Mantenimiento Común</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a class="btn btn-primary btn-circle" href="<?php echo URL ?>Mante_pro/agregar">+</a>

                    </div>

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
                    <th>Equipo</th>
                    <th>Usuario</th>
                    <th>Fecha Mantenimiento</th>
                    <th>Proximo Mantenimiento</th>
                    <th>Garantia Inicio</th>
                    <th>Garantia Fin</th>
                    <th>Observacion</th>
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
                    <form class="was-validated"  method="POST" action="<?php echo URL?>Mante_pro/actualizar"  enctype="multipart/form-data" autocomplete="off">

                            <div class="mb-3">
                                <label for="id_pretamo" data-error="incorrecto" data-success="Correcto" >Equipo</label>
                                <select id="id_prestamo" type="text" class="custom-select" name="id_prestamo" disabled>
                                    <option value="" disabled selected>Nombre Equipo</option>
                                    <?php

                                    $sql=$mysqli->query("SELECT id_prestamo,nombre_Eq from prestamos");
                                    while ($row=mysqli_fetch_array($sql)) {
                                        echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="fecha_mto">Fecha anterior </label>
                                <input type="date" class="form-control" id="fecha_mto" name="fecha_mto" value="" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Campo Requerido
                                </div>
                            </div>

                            <div class="col-6">
                                    <label for="fecha_prx">Fecha Proxima </label>
                                    <input type="date" class="form-control" id="fecha_prx" name="fecha_prx" value="" required>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Campo Requerido
                                    </div>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="observacion">Observacion</label>

                            <textarea class="form-control" id="observacion" name="observacion" required></textarea>
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


<div class="modal fade" id="modal_enviar" tabindex="-1" role="dialog" aria-labelledby="mimodaleliminar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar Correo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container justify-content-md-center col-md-12 order-md-1">
                    <form class="was-validated"  method="POST" action=""  enctype="multipart/form-data" autocomplete="off">
                        <div class="mb-3">
                            <label for="usuario" data-error="incorrecto" data-success="Correcto" >Email a Mandar</label>
                            <select id="email" type="email" class="custom-select" name="email">
                                <option value="" disabled selected>Selecciona el modelo</option>
                                <?php
                                $sql=$mysqli->query("SELECT id_usuario,email from usuario");
                                while ($row=mysqli_fetch_array($sql)) {
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="titulo">Cuerpo del Correo</label>
                            <input type="text" class="form-control" id="mensaje" name="mensaje" value="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Campo Requerido
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit"  id="enviar_ok" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $("#body_table").on("click","a#act",function() {
            var id = $(this).data("id");
            $.get("<?php echo URL?>Mante_pro/modificar/" + id, function (res) {
                var datos = JSON.parse(res);
                $("#id").val(datos["id_mantenimiento_pro"]);
                $("#fecha_mto").val(datos["fecha_mto"]);
                $("#fecha_prx").val(datos["fecha_proximo"]);
                $("#observacion").val(datos["observacion"]);
                $("#id_prestamo").val(datos["id_prestamo"]);
            });
            $("#mimodal").modal("show");
        });
        $("#body_table").on("click","a#enviar",function(){
            var id=$(this).data("id");
            var url='<?php echo URL?>Mante_pro/enviar/'+id;
            $("#enviar_ok").attr("url",url);
            $("#modal_enviar").modal("show");
        });
        $("#enviar_ok").click(function(){
            $.get($(this).attr("url"),function(res){
                $("#body_table").empty().append(res);
            });
        });
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
