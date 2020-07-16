<template>

    <div class="container">
        <div class="row">
            
            <div class="col-md-7"></div>

            <!-- INICIA LA COLUMNA -->

            <div class="col-md-4">
                <center>
                    <h1>Prestamo Bancario</h1>
                    <h3>Datos</h3>
                </center>
                <form method="POST">

                    <div class="form-group">
                        <input type="text" name="apepat" class="form-control" placeholder="Apellido Paterno">
                    </div>

                    <div class="form-group">
                        <input type="text" name="apemat" class="form-control" placeholder="Apellido Materno">
                    </div>

                    <div class="form-group">
                        <input type="text" name="domicilio" class="form-control" placeholder="Comicilio">
                    </div>

                    <div class="form-group">
                        <input type="text" name="ocupacion" class="form-control" placeholder="Ocupacion">
                    </div>

                    <div class="form-group">
                        <input type="text" name="salario" class="form-control" placeholder="Salario mensual promedio">
                    </div>

                    <div class="form-group">
                        <input type="text" name="monto" class="form-control" placeholder="Monto de prestamo">
                    </div>

                    <div class="form-group">
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

                    <div class="form-group">
                        <input type="text" name="montomensual" class="form-control" placeholder="Monto mensual">
                    </div>

                    <div class="form-group">
                        <input type="text" name="total" class="form-control" placeholder="Total a pagar">
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
    export default {
        mounted(){

        }
    }
</script>
