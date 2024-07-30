<?php include_once '../../includes/header.php' ?>

<!-- // $verArmas = new Armas();
// $armas = $verArmas->mostrarArmas();

// $verGrados = new Grados();
// $grados = $verGrados->mostrarGrados(); -->


<h1 class="text-center">FORMULARIO DE REGISTRO DE CLIENTES</h1>
<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-2">
        <div class="row">
            <div class="col-4">
                <label for="cli_nombre_empresa">NOMBRE EMPRESA</label>
                <input type="text" name="cli_nombre_empresa" id="cli_nombre_empresa" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="cli_nombre_contacto">NOMBRE CONTACTO</label>
                <input type="text" name="cli_nombre_contacto" id="cli_nombre_contacto" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="cli_telefono">TELEFONO</label>
                <input type="text" name="cli_telefono" id="cli_telefono" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cli_correo">CORREO</label>
                <input type="text" name="cli_correo" id="cli_correo" class="form-control" required>
            </div>
            <div class="col">
                <label for="cli_direccion">DIRECCION</label>
                <input type="text" name="cli_direccion" id="cli_direccion" class="form-control" required>
            </div>
            <div class="col">
                <label for="cli_tipo">TIPO</label>
                <input type="text" name="cli_tipo" id="cli_tipo" class="form-control" required>
            </div>
        </div>
        <div class="row m-3">
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-success w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
            <div class="col">
                <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100">Limpiar</button>
            </div>
        </div>
    </form>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 table-responsive">
        <h1 class="text-center">Listado de Clientes</h1>
        <table class="table table-bordered table-hover" id="tablaClientes">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>EMPRESA</th>
                    <th>CONTACTO</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    <th>DIRECCION</th>
                    <th>TIPO</th>
                    <th>M</th>
                    <th>E</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="9">NO HAY CLIENTES DISPONIBLES</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<script defer src="/RIVAS_SEGURIDAD/src/js/funciones.js"></script>
<script defer src="/RIVAS_SEGURIDAD/src/js/clientes/index.js"></script>

<?php include_once '../../includes/footer.php' ?>