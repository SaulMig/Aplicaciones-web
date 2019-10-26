<?php
$mysqli=new mysqli('localhost','root','','proyecto');
?>
<div class="container justify-content-md-center">
    <div align="center">
        <div class="card" style="width: 12%;">
            <img src="<?php echo URL?>Public/imagenes/descarga.png" class="card-img-top">
        </div>
    </div>
    <div class="text-center">
        <h2>Agregar una Modelo</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Modelo/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombre">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        <div class="invalid-feedback">
                            Ingresa el modelo
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Marca</label>
                        <select id="id_marca" name="id_marca" type="text" class="custom-select" name="id_modelo">
                            <option value="" disabled selected>Selecciona la marca</option>
                            <?php

                            $sql=$mysqli->query("SELECT id_marca,descripcion from marca");
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
<br>
<br>