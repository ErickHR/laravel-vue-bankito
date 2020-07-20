<template>

    <div class="container">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="document_type">Tipo de Documento</label>
                    <select class="form-control" name="document_type" id="document_type" v-model="data.document_type">
                        <option value="dni" selected>DNI</option>
                        <option value="passport">Pasaporte</option>
                        <option value="immigration_card">Carnet de Extranjeria</option>
                    </select>
                </div>
                <div class="col">
                    <label for="dni">Número de Documento</label>
                    <input type="text" name="dni" class="form-control" placeholder="Documento" v-model="data.document_number">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" v-model="data.name">
                </div>
                <div class="col">
                    <label for="mother_last_name">Apellido Paterno</label>
                    <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Apellido Paterno" v-model="data.mother_last_name">
                </div>
                <div class="col">
                    <label for="father_last_name">Apellido Materno</label>
                    <input type="text" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno" v-model="data.father_last_name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular</label>
                    <input type="number" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular" v-model="data.cell.movil_phone_one">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="number" name="movil_phone_two" id="movil_phone_two" class="form-control" placeholder="celular(opcional)" v-model="data.cell.movil_phone_two">
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="number" name="phone" id="phone" class="form-control" placeholder="Teléfono" v-model="data.cell.phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-10">
                </div>
                <div class="col-1">
                    <button class="btn btn-primary" @click="register">Registrar</button>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
        <Appwaiting v-if="show_wainting"></Appwaiting>
    </div>
    
</template>

<script>
    import Appwaiting from './utils/waiting.vue'
    export default {
        components:{
            Appwaiting
        },
        data: function() {
            return {
                data : {
                    document_type       : "",
                    address             : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    cell : {
                        movil_phone_one : "",
                        movil_phone_two : "",
                        phone : ""
                    },

                },
                show_wainting : false
            }
        },
        methods:{
            showSwal( msg ){
                this.show_wainting = false
                Swal.fire(
                        msg.tittle,
                        '',
                        msg.type
                    )
            },
            register(){
                let _this = this
                let body = {...this.data}
                body.cell = JSON.stringify( this.data.cell )
                this.show_wainting = true
                axios.post( 'people', body )
                    .then( res => {
                        res.data.response? _this.showSwal( { tittle:"Guardado!", type:"success" } ) : _this.showSwal( { tittle: `No sé Guardado! ${res.data.e}` , type:"error" } )
                    } )
                    .catch( e =>{
                        _this.showSwal( { tittle:`${e}`, type:"warning" } )
                    } )                    
            }
        },
        mounted(){
        }
    }
</script>
