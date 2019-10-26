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
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                        <li class="nav-item"></li>
                        <li class="nav-item dropdown"></li>
                        <li class="nav-item"></li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Equipo" class="form-control mr-sm-2">
                        <button class="btn btn-outline-success my-2 my-sm-0" disabled>
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </div>
            </nav>

            <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Equipo</th>
                        <th>Modelo</th>
                        <th>Direccion</th>
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
                                <input type="hidden" name="id" id="id" value="">
                                <input type="text" class="form-control" id="ip_address" name="ip_address" required>
                                <div class="invalid-feedback">
                                    Llena el campo
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="modelo" data-error="incorrecto" data-success="Correcto" >Modelo</label>
                                    <input type="hidden" name="id" id="id" value="">
                                    <select id="id_modelo" type="text" class="custom-select" name="id_modelo">
                                        <option value="" disabled selected>Selecciona el modelo</option>
                                        <?php

                                        $sql=$mysqli->query("SELECT id_marca,descripcion from marca");
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
                                    $returnobjt=$mysqli->query("SELECT id_tipo_objeto,descripcion from tipo_objeto");
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
    $("#body_table").on("click","a#act",function() {
        var id = $(this).data("id");
        $.get("<?php echo URL?>Asigna_objetos/modificar/" + id, function (res) {
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
        $("#modal_eliminar").modal("show");
    });
    $("#eliminar_ok").click(function(){
        $.get($(this).attr("url"),function(res){
            $("#body_table").empty().append(res);
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
