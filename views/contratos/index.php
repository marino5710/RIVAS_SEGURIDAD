<?php include_once '../../includes/header.php' ?>
<?php include_once '../../models/Clientes.php' ?>
<?php include_once '../../models/Servicios.php' ?>


<?php
$verServicios = new Servicios();
$servicios = $verServicios->mostrarServicios();

$verClientes = new Clientes();
$clientes = $verClientes->mostrarClientes();

?>

<h1 class="text-center">ADQUIERE UN CONTRATO</h1>
<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-2">
        <div class="row">
            <div class="col">
                <label for="con_cli_id">SELECCIONE CLIENTE</label>
                <select id="con_cli_id" name="con_cli_id" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['cli_id'] ?>">
                            <?= $cliente['cli_nombre_empresa'] . "" ?>
                            <?= $cliente['cli_nombre_contacto'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="con_serv_id">SELECCIONE SERVICIO</label>
                <select id="con_serv_id" name="con_serv_id" class="form-control" required>
                    <option value="">SELECCIONE</option>
                    <?php foreach ($servicios as $servicio): ?>
                        <option value="<?= $servicio['serv_id'] ?>"> 
                            <?= $servicio['serv_nombre'] . "" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="con_fecha_inicio">Fecha de Inicio</label>
                <input type="date" name="con_fecha_inicio" id="con_fecha_inicio" class="form-control" required>
            </div>
            <div class="col">
                <label for="con_fecha_fin">Fecha de Finalizacion</label>
                <input type="date" name="con_fecha_fin" id="con_fecha_fin" class="form-control" required>
            </div>
            <div class="col">
                <label for="con_estado">Estado</label>
                <input type="text" name="con_estado" id="con_estado" class="form-control"
                    required>
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
        <h1 class="text-center">LISTADO DE CONTRATOS</h1>
        <table class="table table-bordered table-hover" id="tablaContratos">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>CLIENTE</th>
                    <th>SERVICIO</th>
                    <th>FECHA DE INICIO</th>
                    <th>FECHA DE FINALIZACION</th>
                    <th>ESTADO</th>
                    <th>M</th>
                    <th>E</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8">NO HAY CONTRATOS DISPONIBLES</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<script defer src="/RIVAS_SEGURIDAD/src/js/funciones.js"></script>
<script defer src="/RIVAS_SEGURIDAD/src/js/contratos/index.js"></script>

<?php include_once '../../includes/footer.php' ?>