<template>

    <div class="container">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="tipoDoc">Tipo de Documento</label>
                    <select class="form-control" name="tipoDoc" id="tipoDoc">
                        <option value="dni" selected>DNI</option>
                        <option value="pasaporte">Pasaporte</option>
                        <option value="carnet">Carnet de Extranjeria</option>
                    </select>
                </div>
                <div class="col">
                    <label for="dni">Dni</label>
                    <input type="text" name="dni" class="form-control" placeholder="Documento">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                </div>
                <div class="col">
                    <label for="mother_last_name">Apellido Materno</label>
                    <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Apellido Paterno">
                </div>
                <div class="col">
                    <label for="father_last_name">Apellido Paterno</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <span> Fecha de Nacimiento </span>
                    <div class="row">
                        <div class="col">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                        </div>
                        <div class="col">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <label for="mother_last_name">Género</label>
                    <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Apellido Paterno">
                </div>
                <div class="col">
                    <label for="father_last_name">País de Nacimiento</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno">
                </div>
                <div class="col">
                    <label for="father_last_name">País de Nacionalidad</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="father_last_name">Estado Civil</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno">
                </div>
                <div class="col">
                    <label for="father_last_name">Grado de Máximo de Estudios</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="text" name="movil_phone_two" id="movil_phone_two" class="form-control" placeholder="celular(opcional)">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Email</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Telefono</label>
                    <input type="text" name="movil_phone_two" id="movil_phone_two" class="form-control" placeholder="celular(opcional)">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Mz</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_one">Calle</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_one">Jirón</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="district">Distrito</label>
                    <input type="text" name="district" id="district" class="form-control" placeholder="Distrito">
                </div>
                <div class="col">
                    <label for="departament">Departamento</label>
                    <input type="text" name="departament" id="departament" class="form-control" placeholder="Departemento">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="occupation">Ocupación</label>
                    <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Ocupación">
                </div>
                <div class="col">
                    <label for="movil_phone_one">Salario Promedio (Mensual)</label>
                    <input type="text" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Salario Promedio">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="occupation">Monto de prestamo</label>
                    <input type="text" name="monto" class="form-control" placeholder="Monto de prestamo">
                </div>
                <div class="col">
                    <label for="movil_phone_one">Meses</label>
                    <select class="form-control" name="tipoDoc" id="meses">
                            <option value="0" selected>2 meses</option>
                            <option value="1">3 meses</option>
                            <option value="2">4 meses</option>
                            <option value="3">6 meses</option>
                            <option value="4">12 meses</option>
                            <option value="5">18 meses</option>
                            <option value="6">24 meses</option>
                            <option value="7">36 meses</option>
                            <option value="8">48 meses</option>
                            <option value="9">60 meses</option>
                        </select>
                </div>
                <div class="col">
                    <label for="movil_phone_one">Monto Mensual</label>
                    <input type="text" name="montomensual" class="form-control" placeholder="Monto mensual">
                </div>
                <div class="col">
                    <label for="movil_phone_one">Total a pagar</label>
                    <input type="text" name="total" class="form-control btn-info" placeholder="Total a pagar">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Si
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            No
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-10">
                </div>
                <div class="col-1">
                    <button class="btn btn-primary">Registrar</button>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        mounted(){

        }
    }
</script>
