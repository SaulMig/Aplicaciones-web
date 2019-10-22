<?php
?>
<div class="container justify-content-md-center">
    <div align="center">
        <div class="card" style="width: 12%;">
            <img src="<?php echo URL?>Public/imagenes/user.png" class="card-img-top">
        </div>
    </div>
    <div class="text-center">
        <h2>Agregar Area</h2>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-5 order-md-1">
            <form class="was-validated"  method="POST" action="<?php echo URL?>Lugar/agregar" enctype="multipart/form-data" autocomplete="off">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="Area">Area</label>
                        <input type="text" class="form-control" id="lugar" name="lugar" required>
                        <div class="invalid-feedback">
                            Llene el campo
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