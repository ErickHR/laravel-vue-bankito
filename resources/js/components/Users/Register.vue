<template>
    <div class="">
        <div class="row">
        <div class="col-md-8"></div>

        <!-- INICIA LA COLUMNA -->

        <div class="col-md-3">
            
        <center>
                <h1>Datos del Cliente</h1>
        </center>

            <form method="POST">
                <div class="form-group">
                    <label for="tipoDoc">Tipo de Documento</label>
                    <select class="form-control" name="tipoDoc" id="tipoDoc">
                        <option value="dni" selected>DNI</option>
                        <option value="pasaporte">Pasaporte</option>
                        <option value="carnet">Carnet de Extranjeria</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="doc" class="form-control" placeholder="Documento">
                </div>

                <div class="form-group">
                    <input type="text" name="apepat" class="form-control" placeholder="Apellido Paterno">
                </div>

                <div class="form-group">
                    <input type="text" name="apemat" class="form-control" placeholder="Apellido Materno">
                </div>

                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre(s)">
                </div>

                <div class="form-group">
                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="text" name="domicilio" class="form-control" placeholder="Domicilio">
                </div>

                <center>
                    <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
                    <input type="submit" value="Regresar" class="btn btn-danger" name="btn_regresar">
                </center>

            </form>

        </div>

        <!-- TERMINA LA COLUMNA -->

        <div class="col-md-1"></div>
    </div>
    </div>
</template>

<script>

    // import AppHamburger from './effects/hamburger'
    // import AppMenu from './appMenu'

    export default {

        components:{
            // AppHamburger,
            // AppMenu
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
