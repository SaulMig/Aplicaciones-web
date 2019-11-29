<?php
$mysqli=new mysqli('localhost','root','','proyecto');
?>
<div class="container justify-content-md-center">
    <div align="center">
        <div class="card" style="width: 12%;">
            <img src="<?php echo URL?>Public/imagenes/key.png" class="card-img-top">
        </div>
    </div>
    <div class="text-center">
        <h2>Agregar un Teclado</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Keyboard/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nombre">Alambrico</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        <div class="invalid-feedback">
                            Ingresa el pulgadas
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Modelo</label>
                        <select id="id_modelo" name="id_modelo" type="text" class="custom-select" name="id_modelo">
                            <option value="" disabled selected>Selecciona el modelo</option>
                            <?php

                            $sql=$mysqli->query("SELECT id_modelo,descripcion from modelo");
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