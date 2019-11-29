<?php
    $mysqli=new mysqli('localhost','root','','proyecto');

?>
<div class="container justify-content-md-center">
    <div align="center">
        <div class="card" style="width: 12%;">
            <img src="<?php echo URL?>Public/imagenes/tele.png" class="card-img-top">
        </div>
    </div>
    <div class="text-center">
        <h2>Agrega un Telefono</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Tele/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="mb-3">
                    <label for="titulo">Extención</label>
                    <input type="hidden" name="id" id="id" value="">
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
                    </div>
                </div>

                <div class="mb-3">
                    <label for="modelo" data-error="incorrecto" data-success="Correcto" >Extencion</label>
                    <select id="id_modelo" type="text" class="custom-select" name="id_modelo">
                        <option value="" disabled selected>Selecciona el modelo</option>
                        <?php

                        $sql=$mysqli->query("SELECT id_modelo,descripcion from modelo");
                        while ($row=mysqli_fetch_array($sql)) {
                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="IP">IP</label>
                    <input type="text" class="form-control" id="ip_address" name="ip_address" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
                    </div>
                </div>
                <div class="mb-3">
                    <label for="modelo" data-error="incorrecto" data-success="Correcto" >Usuario</label>
                    <select id="id_usuario" type="text" class="custom-select" name="id_usuario">
                        <option value="" disabled selected>Selecciona el modelo</option>
                        <?php

                        $sql=$mysqli->query("SELECT id_usuario,email from usuario");
                        while ($row=mysqli_fetch_array($sql)) {
                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                        }
                        ?>
                    </select>
                </div>

                    <div class="row justify-content-md-center">
                        <button  class="btn btn-primary " id="enviar"  type="submit">Registrar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>