<?php include_once '../../includes/header.php' ?>

<!-- // $verArmas = new Armas();
// $armas = $verArmas->mostrarArmas();

// $verGrados = new Grados();
// $grados = $verGrados->mostrarGrados(); -->


<h1 class="text-center">FORMULARIO DE REGISTRO DE EMPLEADOS</h1>
<div class="row justify-content-center">
    <form class="border bg-light shadow rounded p-2">
        <div class="row">
            <div class="col-4">
                <label for="emp_nombre">NOMBRE</label>
                <input type="text" name="emp_nombre" id="emp_nombre" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="emp_apellido">APELLIDO</label>
                <input type="text" name="emp_apellido" id="emp_apellido" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="emp_fecha_nacimiento">FECHA DE NACIMIENTO</label>
                <input type="date" name="emp_fecha_nacimiento" id="emp_fecha_nacimiento" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="emp_telefono">TELEFONO</label>
                <input type="text" name="emp_telefono" id="emp_telefono" class="form-control" required>
            </div>
            <div class="col">
                <label for="emp_correo_electronico">CORREO</label>
                <input type="text" name="emp_correo_electronico" id="emp_correo_electronico" class="form-control" required>
            </div>
            <div class="col">
                <label for="emp_direccion">DIRECCION</label>
                <input type="text" name="emp_direccion" id="emp_direccion" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="emp_puesto">PUESTO</label>
                <input type="text" name="emp_puesto" id="emp_puesto" class="form-control" required>
            </div>
            <div class="col">
                <label for="emp_fecha_ingreso">FECHA DE INGRESO</label>
                <input type="date" name="emp_fecha_ingreso" id="emp_fecha_ingreso" class="form-control" required>
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
        <h1 class="text-center">LISTADO DE EMPLEADOS</h1>
        <table class="table table-bordered table-hover" id="tablaEmpleados">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th>TEL.</th>
                    <th>CORREO</th>
                    <th>DIR.</th>
                    <th>PUESTO</th>
                    <th>FECHA DE INGRESO</th>
                    <th>M</th>
                    <th>E</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="11">NO HAY EMPLEADOS DISPONIBLES</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<script defer src="/RIVAS_SEGURIDAD/src/js/funciones.js"></script>
<script defer src="/RIVAS_SEGURIDAD/src/js/empleados/index.js"></script>

<?php include_once '../../includes/footer.php' ?>