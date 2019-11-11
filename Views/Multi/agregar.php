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
        <h2>Agrega una Impresora de Multifuncional</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Multi/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="mb-3">
                    <label for="copias">No. Copias</label>
                    <input type="hidden" name="id" id="id" value="">
                    <input type="text" class="form-control" id="no_copias" name="no_copias" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
                    </div>
                </div>
                <div class="mb-3">
                    <label for="impresion">No. Impresiones</label>
                    <input type="text" class="form-control" id="no_impresion" name="no_impresion" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
                    </div>
                </div>
                <div class="mb-3">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" name="total" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
                    </div>
                </div>

                <div class="mb-3">
                    <label for="objeto" data-error="incorrecto" data-success="Correcto" >Selecciona la IP</label>
                    <select id="id_objeto" type="text" class="custom-select" name="id_objeto">
                        <option value="" disabled selected>Selecciona la IP</option>
                        <?php

                            $sql=$mysqli->query("SELECT id_objeto,ip_address from objetos where id_objeto >=833 and id_objeto <=842");
                        while ($row=mysqli_fetch_array($sql)) {
                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="area" data-error="incorrecto" data-success="Correcto" >Selecciona el Area</label>
                    <select id="id_area" type="text" class="custom-select" name="id_area">
                        <option value="" disabled selected>Selecciona el Area</option>
                        <?php

                        $sql=$mysqli->query("SELECT id_area,descripcion from lugar ");
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