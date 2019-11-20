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
        <h2>Agrega un equipo para mantenimiento</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Mante_pro/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="mb-3">
                    <label for="equipo" data-error="incorrecto" data-success="Correcto" >Equipo</label>
                    <select id="id_prestamo" type="text" class="custom-select" name="id_prestamo" >
                        <option value="" disabled selected>Selecciona el modelo</option>
                        <?php

                        $sql=$mysqli->query("SELECT id_prestamo,nombre_eq from prestamos ");
                        while ($row=mysqli_fetch_array($sql)) {
                            echo "<option value='{$row[0]}'>{$row[1]}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="titulo">Mantenimiento inicio</label>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="date" class="form-control" id="fecha_mto" name="fecha_mto" value="" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Campo Requerido
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="IP">Mantenimiento Proximo</label>
                        <input type="date" class="form-control" id="fecha_proximo" name="fecha_proximo" value="" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Campo Requerido
                        </div>
                    </div>

                </div>

                <div class="mb-3">
                    <label for="Mac">Observaciones</label>
                    <textarea class="form-control" id="observacion" name="observacion" placeholder="Solo observaciones que se vieron en el equipo" required></textarea>
                    <div class="invalid-feedback" style="width: 100%;">
                        Campo Requerido
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