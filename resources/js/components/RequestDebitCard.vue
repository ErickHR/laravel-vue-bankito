<template>

    <div class="container">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="document_type">Tipo de Documento</label>
                        <v-select class="bg-white " :disabled="disabled_input" :options="[ 'dni', 'Pasaporte', 'Carnet de Extranjeria' ]" v-model="data.document_type" label='document_type' placeholder="Tipo de Documento"></v-select>
                </div>
                <div class="col">
                    <label for="dni">Número de Documento</label>
                    <input type="number" :disabled="disabled_input" name="dni" class="form-control" placeholder="Documento" v-model="data.document_number">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name">Nombre</label>
                    <input type="text" :disabled="disabled_input" name="name" id="name" class="form-control" placeholder="Nombre" v-model="data.name">
                </div>
                <div class="col">
                    <label for="mother_last_name">Apellido Paterno</label>
                    <input type="text" :disabled="disabled_input" name="mother_last_name" id="mother_last_name" class="form-control" placeholder="Apellido Paterno" v-model="data.father_last_name">
                </div>
                <div class="col">
                    <label for="father_last_name">Apellido Materno</label>
                    <input type="text" :disabled="disabled_input" name="father_last_name" id="father_last_name" class="form-control" placeholder="Apellido Materno" v-model="data.mother_last_name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular</label>
                    <input type="number" :disabled="disabled_input" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular" v-model="data.cell.movil_phone_one">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="number" :disabled="disabled_input" name="movil_phone_two" id="movil_phone_two" class="form-control" placeholder="celular(opcional)" v-model="data.cell.movil_phone_two">
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="number" :disabled="disabled_input" name="phone" id="phone" class="form-control" placeholder="Teléfono" v-model="data.cell.phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="gender">email</label>
                    <input type="email" :disabled="disabled_input" name="email" id="email" class="form-control" placeholder="Email" v-model="data.email">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="gender">Género</label>
                    <v-select class="bg-white " :disabled="disabled_input" :options="[ 'Masculino', 'Femenino' ]" v-model="data.gender" label='gender' placeholder="Género"></v-select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-9">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" @click="register" v-if="!show_btn_pop_up">Registrar</button>
                    <button class="btn" :class="{'btn-success': save_btn_pop_up, 'btn-warning':!save_btn_pop_up}" v-if="show_btn_pop_up" @click="modified_data">{{title_btn_pop_up}}</button>
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
        props:[
            'data_props',
            'is_pop_up'
        ],
        data: function() {
            return {
                disabled_input : false,
                show_btn_pop_up : false,
                save_btn_pop_up: false,
                title_btn_pop_up : "",
                data : {
                    document_type       : "",
                    address             : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    type                : "debit",
                    genero              : "",
                    cell : {
                        movil_phone_one : "",
                        movil_phone_two : "",
                        phone : ""
                    },
                    email               :"",
                    id_role : 3

                },
                show_wainting : false
            }
        },
        methods:{
            modified_data(){
                let _this = this
                if( this.disabled_input ){
                    this.disabled_input = false
                    this.title_btn_pop_up = "Guardar",
                    this.save_btn_pop_up = true
                }else{
                    let _this = this
                    let body = {...this.data}
                    body.cell = JSON.stringify( this.data.cell )
                    this.show_wainting = true
                    axios.put( `people/${_this.data.id}`, body )
                        .then( res => {
                            res.data.response? _this.showSwal( { tittle:"Guardado!", type:"success" } ) : _this.showSwal( { tittle: `No sé Guardado! ${res.data.e}` , type:"error" } )
                            _this.$emit('close_request_debit_card')
                        } )
                        .catch( e =>{
                            _this.showSwal( { tittle:`${e}`, type:"warning" } )
                        } )  
                }
            },
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
            if( this.data_props ){
                this.data = this.data_props.person
            }

            if ( this.is_pop_up ){
                this.show_btn_pop_up = true
                this.title_btn_pop_up = "Modificar",
                this.disabled_input = true
            }
            
        }
    }
</script>
