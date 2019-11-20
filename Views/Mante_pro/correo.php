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