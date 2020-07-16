<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8"></div>

            <!-- INICIA LA COLUMNA -->

            <div class="col-md-3">
                <center>
                    <h1>ABRE TU CUENTA</h1>
                    <h3>Banca por Internet</h3>
                </center>
                <form  method="POST">

                    <div class="form-group">
                        <input type="text" name="numerotarjeta" class="form-control" placeholder="Numero de Tarjeta">
                    </div>

                    <div class="form-group">
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
                        <input type="password" name="clave" class="form-control" placeholder="Clave Web">
                    </div>

                    <center>
                        <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar" href="registrarDatosPrestamo.php">
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
        }
    }
</script>
