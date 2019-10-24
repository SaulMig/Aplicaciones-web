<?php
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
            <form class="was-validated"  method="POST" action="<?php echo URL?>Asigna_objeto/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="modal-body">
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
                        <label for="modelo" data-error="incorrecto" data-success="Correcto" >Modelo</label>
                    </div>

                    <div class="input-field col s4">
                        <select id="objeto" type="text" class="validate" name="objeto">
                            <option value="" disabled selected>Selecciona el equipo</option>
                            <?php
                            $returnobjt=$datos[2];
                            while ($row=mysqli_fetch_array($returnobjt))
                                echo "<option value='{$row[0]}'>{$row[1]}</option>";
                            ?>
                        </select>
                        <label for="objeto" data-error="incorrecto" data-success="Correcto" >Equipo</label>
                    </div>




                    <div class="form-group">
                        <label for="equipo">Equipo</label>
                        <input type="text" class="form-control" id="id_tipo_objeto" name="id_tipo_objeto" required>
                        <div class="invalid-feedback">
                            Llena el campo
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <button  class="btn btn-primary " id="enviar"  type="submit">Registrar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>