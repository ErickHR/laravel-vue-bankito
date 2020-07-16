<template>
    <div class="row">
        <div class="col-md-8"></div>

        <!-- INICIA LA COLUMNA -->

        <div class="col-md-3">
            <center>
                <h1>Empieza tu solicitud</h1>
            </center>
            <form method="POST">

                <div class="form-group">
                    <input type="text" name="numerodni" class="form-control" placeholder="Numero de DNI">
                </div>

                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group" value="Operador">
                    <select class="form-control" name="tipoDoc" id="tipoDoc">
                        <option value="claro" selected>Claro</option>
                        <option value="entel">Entel</option>
                        <option value="movistar">Movistar</option>
                        <option value="bitel">Bitel</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="password" name="telefono" class="form-control" placeholder="Telefono">
                </div>

                <center>
                    <input type="submit" value="Comencemor" class="btn btn-success" name="btn_comenzar">
                    <input type="submit" value="Regresar" class="btn btn-danger" name="btn_regresar">
                </center>
            </form>
        </div>

        <!-- TERMINA LA COLUMNA -->

        <div class="col-md-1"></div>
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