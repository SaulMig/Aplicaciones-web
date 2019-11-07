<div class="row">

    <div class="col-lg-3">

        <h1 class="my-4" href="<?php echo URL?>login">Inventario
        </h1>
        <div class="list-group">
            <a href="<?php echo URL?>DesktopsClient" class="list-group-item text-dark" id="list-pri">Computadoras de Escritorio</a>
            <a href="<?php echo URL?>DisplayClient" class="list-group-item text-dark">Monitores</a>
            <a href="<?php echo URL?>KeyboardClient" class="list-group-item text-dark">Teclados</a>
            <a href="<?php echo URL?>MouseClient" class="list-group-item text-dark" id="list-pri">Ratónes</a>
            <a href="<?php echo URL?>LaptopClient" class="list-group-item text-dark">Laptops</a>
            <a href="<?php echo URL?>PrintLabelClient" class="list-group-item text-dark">Impresoras de Etiqueta</a>
            <a href="<?php echo URL?>ScannerClient" class="list-group-item text-dark">Escáner</a>
            <a href="<?php echo URL?>TeleClient" class="list-group-item text-dark">Telefonos</a>
            <a href="<?php echo URL?>PrintClient" class="list-group-item text-dark">Impresoras Multifuncionales</a>
            <a href="<?php echo URL?>UsuarioClient" class="list-group-item text-dark">Usuarios</a>
        </div>

    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tab">
            <div class="tab-pane card" id="list-second" role="tabpanel" aria-labelledby="list-pri" href="<?php echo URL?>DesktopsClient"></div>
        </div>

    </div>
</div>


<script>
    $('#list-tab a').on('click',function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
</script>