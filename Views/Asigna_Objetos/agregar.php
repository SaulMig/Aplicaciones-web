<?php
    $mysqli=new mysqli('localhost','root','','proyecto');

?>
<div class="container justify-content-md-center">
    <div align="center">
        <div class="card" style="width: 12%;">
            <img src="<?php echo URL?>Public/imagenes/user.png" class="card-img-top">
        </div>
    </div>
    <div class="text-center">
        <h2>Agregar un Equipo</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Asigna_objetos/agregar" enctype="multipart/form-data" autocomplete="off">

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

                                $sql=$mysqli->query("SELECT id_modelo,descripcion from modelo");
                                while ($row=mysqli_fetch_array($sql)) {
                                    echo "<option value='{$row[0]}'>{$row[1]}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <label for="objeto" data-error="incorrecto" data-success="Correcto" >Equipo</label>
                        <select id="id_tipo_objeto" type="text" class="custom-select" name="id_tipo_objeto">
                            <option value="" disabled selected>Selecciona el equipo</option>
                            <?php
                            $returnobjt=$mysqli->query("SELECT id_tipo_objeto,descripcion from tipo_objeto");
                             while ($row=mysqli_fetch_array($returnobjt))
                                echo "<option value='{$row[0]}'>{$row[1]}</option>";
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