const btnGuardar = document.getElementById('btnGuardar')
const btnModificar = document.getElementById('btnModificar')
const btnEliminar = document.getElementById('btnEliminar')
const btnBuscar = document.getElementById('btnBuscar')
const btnCancelar = document.getElementById('btnCancelar')
const btnLimpiar = document.getElementById('btnLimpiar')
const tablaEmpleados = document.getElementById('tablaEmpleados')
const formulario = document.querySelector('form')

btnModificar.parentElement.style.display = 'none'
btnCancelar.parentElement.style.display = 'none'

const getEmpleados = async (alerta = 'si') => {
    const nombre = formulario.emp_nombre.value.trim()
    const apellido = formulario.emp_apellido.value.trim()
    const fecha_nacimiento = formulario.emp_fecha_nacimiento.value.trim()
    const telefono = formulario.emp_telefono.value.trim()
    const correo = formulario.emp_correo_electronico.value.trim()
    const direccion = formulario.emp_direccion.value.trim()
    const puesto = formulario.emp_puesto.value.trim()
    const fecha_ingreso = formulario.emp_fecha_ingreso.value.trim()
    const url = `/RIVAS_SEGURIDAD/controllers/empleados/index.php?emp_nombre=${nombre}&emp_apellido=${apellido}&emp_fecha_nacimiento=${fecha_nacimiento}&emp_telefono=${telefono}&emp_correo_electronico=${correo}&direccion=${direccion}&emp_puesto=${puesto}&emp_fecha_ingreso=${fecha_ingreso}`
    const config = {
        method: 'GET'
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log(data);

        tablaEmpleados.tBodies[0].innerHTML = ''
        const fragment = document.createDocumentFragment()
        let contador = 1;

        if (respuesta.status == 200) {

            if(alerta == 'si'){

                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: 'Empleados Encontrados',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }

            if (data.length > 0) {
                data.forEach(empleado => {
                    const tr = document.createElement('tr')
                    const celda1 = document.createElement('td')
                    const celda2 = document.createElement('td')
                    const celda3 = document.createElement('td')
                    const celda4 = document.createElement('td')
                    const celda5 = document.createElement('td')
                    const celda6 = document.createElement('td')
                    const celda7 = document.createElement('td')
                    const celda8 = document.createElement('td')
                    const celda9 = document.createElement('td')
                    const celda10 = document.createElement('td')
                    const celda11 = document.createElement('td')
                    const buttonModificar = document.createElement('button')
                    const buttonEliminar = document.createElement('button')

                    celda1.innerText = contador;
                    celda2.innerText = empleado.emp_nombre;
                    celda3.innerText = empleado.emp_apellido;
                    celda4.innerText = empleado.emp_fecha_nacimiento;
                    celda5.innerText = empleado.emp_telefono;
                    celda6.innerText = empleado.emp_correo_electronico;
                    celda7.innerText = empleado.emp_direccion;
                    celda8.innerText = empleado.emp_puesto;
                    celda9.innerText = empleado.emp_fecha_ingreso;

                    buttonModificar.textContent = 'Modificar'
                    buttonModificar.classList.add('btn', 'btn-warning', 'w-100')
                    buttonModificar.addEventListener('click', () => llenardatos(empleado))


                    buttonEliminar.textContent = 'Eliminar';
                    buttonEliminar.classList.add('btn', 'btn-danger', 'w-100');
                    buttonEliminar.addEventListener('click', () => eliminarEmpleado(empleado.emp_id));

                    celda10.appendChild(buttonModificar)
                    celda11.appendChild(buttonEliminar)

                    tr.appendChild(celda1)
                    tr.appendChild(celda2)
                    tr.appendChild(celda3)
                    tr.appendChild(celda4)
                    tr.appendChild(celda5)
                    tr.appendChild(celda6)
                    tr.appendChild(celda7)
                    tr.appendChild(celda8)
                    tr.appendChild(celda9)
                    tr.appendChild(celda10)
                    tr.appendChild(celda11)
                    fragment.appendChild(tr);

                    contador++
                });

            } else {
                const tr = document.createElement('tr')
                const td = document.createElement('td')
                td.innerText = 'No hay Empleado Disponibles'
                td.colSpan = 11;

                tr.appendChild(td)
                fragment.appendChild(tr)
            }
        } else {
            console.log('hola');
        }

        tablaEmpleados.tBodies[0].appendChild(fragment)
    } catch (error) {
        console.log(error);
    }
}



const guardarEmpleado = async (e) => {
    e.preventDefault();
    btnGuardar.disabled = true;
    const url = '/RIVAS_SEGURIDAD/controllers/empleados/index.php'
    const formData = new FormData(formulario)
    formData.append('tipo', 1)
    formData.delete('emp_id')
    const config = {
        method: 'POST',
        body: formData
    }

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        const { mensaje, codigo, detalle } = data
        console.log(data)
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "success",
            title: mensaje,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
        // alert(mensaje)

        if (codigo == 1 && respuesta.status == 200) {
            getEmpleados(alerta = 'si');
            formulario.reset();
        } else {
            console.log(detalle);
        }

    } catch (error) {
        console.log(error);
    }
    btnGuardar.disabled = false;
}

const llenardatos = (empleado) => {
    formulario.emp_id = empleado.emp_id
    formulario.emp_nombre.value = empleado.emp_nombre
    formulario.emp_apellido.value = empleado.emp_apellido
    formulario.emp_fecha_nacimiento.value = empleado.emp_fecha_nacimiento
    formulario.emp_telefono.value = empleado.emp_telefono
    formulario.emp_correo_electronico.value = empleado.emp_correo_electronico
    formulario.emp_direccion.value = empleado.emp_direccion
    formulario.emp_puesto.value = empleado.emp_puesto
    formulario.emp_fecha_ingreso.value = empleado.emp_fecha_ingreso
    btnGuardar.parentElement.style.display = 'none'
    btnBuscar.parentElement.style.display = 'none'
    btnLimpiar.parentElement.style.display = 'none'
    btnModificar.parentElement.style.display = ''
    btnCancelar.parentElement.style.display = ''
}

const cancelar = () => {
    formulario.emp_id.value = ''
    formulario.emp_nombre.value = ''
    formulario.emp_apellido.value = ''
    formulario.emp_fecha_nacimiento.value = ''
    formulario.emp_telefono.value = ''
    formulario.emp_correo_electronico.value = ''
    formulario.emp_direccion.value = ''
    formulario.emp_puesto.value = ''
    formulario.emp_fecha_ingreso.value = ''
    btnGuardar.parentElement.style.display = ''
    btnBuscar.parentElement.style.display = ''
    btnLimpiar.parentElement.style.display = ''
    btnModificar.parentElement.style.display = 'none'
    btnCancelar.parentElement.style.display = 'none'
}

const modificar = async (e) => {
    e.preventDefault();
    btnModificar.disabled = true;
    const url = '/RIVAS_SEGURIDAD/controllers/empleados/index.php';
    const formData = new FormData(formulario);
    formData.append('tipo', 2);
    formData.append('emp_id', formulario.emp_id);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        console.log('Enviando datos:', ...formData.entries());
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo, detalle } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            formulario.reset()
            getEmpleados(alerta = 'no');
            btnBuscar.parentElement.style.display = ''
            btnGuardar.parentElement.style.display = ''
            btnLimpiar.parentElement.style.display = ''
            btnModificar.parentElement.style.display = 'none'
            btnCancelar.parentElement.style.display = 'none'

        } else {
            console.log('Error:', detalle);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al guardar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }

    btnModificar.disabled = false;
    btnCancelar.disabled = false;


}


const eliminarEmpleado = async (emp_id) => {
    
    const url = '/RIVAS_SEGURIDAD/controllers/empleados/index.php';
    const formData = new FormData();
    formData.append('emp_id', emp_id);
    formData.append('tipo', 3);
    const config = {
        method: 'POST',
        body: formData
    };

    try {
        const respuesta = await fetch(url, config);
        const data = await respuesta.json();
        console.log('Respuesta recibida:', data);
        const { mensaje, codigo } = data;
        if (respuesta.ok && codigo === 1) {
            Swal.mixin({
                toast: true,
                position: "top-start",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: mensaje,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
            getEmpleados(alerta = 'no');
        } else {
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error al eliminar',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
    } catch (error) {
        console.log('Error de conexión:', error);
        Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: "error",
            title: 'Error de conexión',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        }).fire();
    }
}


formulario.addEventListener('submit', guardarEmpleado)
btnBuscar.addEventListener('click', getEmpleados)
btnModificar.addEventListener('click', modificar)
btnCancelar.addEventListener('click', cancelar)
