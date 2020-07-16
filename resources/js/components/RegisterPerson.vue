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
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                </div>
                <div class="col">
                    <label>Nombre</label>
                    <input type="text" name="apepat" class="form-control" placeholder="Apellido Paterno">
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
