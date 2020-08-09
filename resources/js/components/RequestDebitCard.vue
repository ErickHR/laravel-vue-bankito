<template>

    <div class="container" style="margin-top: 2rem;">
        <div v-show="is_pop_up" ><button class="btn" :class="{'close':is_pop_up}" @click="$emit('close_request_debit_card')"><i class="far fa-times-circle"></i></button></div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="document_type">Tipo de Documento*</label>
                    <v-select class="bg-white" :class="{'error-input':error_data.document_type}" :disabled="disabled_input" @click="validate" :options="[ 'dni', 'Pasaporte', 'Carnet de Extranjeria' ]" v-model="data.document_type" label='document_type' placeholder="Tipo de Documento"></v-select>
                    <div><label class="error-msg" v-show="error_data.document_type">{{msg_data.document_type}}</label></div>
                </div>
                <div class="col">
                    <label for="dni">Número de Documento*</label>
                    <input type="number" :disabled="disabled_input" name="dni" @keyup="validate" :class="{'error-input':error_data.document_number}" class="form-control" placeholder="Documento" v-model="data.document_number">
                    <div><label class="error-msg" v-show="error_data.document_number">{{msg_data.document_number}}</label></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="name">Nombre*</label>
                    <input type="text" :disabled="disabled_input" name="name" id="name" @keyup="validate" class="form-control" :class="{'error-input':error_data.name}"  placeholder="Nombre" v-model="data.name">
                    <div><label class="error-msg" v-show="error_data.name">{{msg_data.name}}</label></div>
                </div>
                <div class="col">
                    <label for="mother_last_name">Apellido Paterno*</label>
                    <input type="text" :disabled="disabled_input" name="mother_last_name" @keyup="validate" id="mother_last_name" :class="{'error-input':error_data.father_last_name}" class="form-control" placeholder="Apellido Paterno" v-model="data.father_last_name">
                    <div><label class="error-msg" v-show="error_data.father_last_name">{{msg_data.father_last_name}}</label></div>
                </div>
                <div class="col">
                    <label for="father_last_name">Apellido Materno*</label>
                    <input type="text" :disabled="disabled_input" name="father_last_name" @keyup="validate" id="father_last_name" :class="{'error-input':error_data.mother_last_name}" class="form-control" placeholder="Apellido Materno" v-model="data.mother_last_name">
                    <div><label class="error-msg" v-show="error_data.mother_last_name">{{msg_data.mother_last_name}}</label></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular*</label>
                    <input type="number" :disabled="disabled_input" name="movil_phone_one" @keyup="validate" id="movil_phone_one" class="form-control" :class="{'error-input':error_data.cell.movil_phone_one}" placeholder="Celular" v-model="data.cell.movil_phone_one">
                    <div><label class="error-msg" v-show="error_data.cell.movil_phone_one">{{msg_data.cell.movil_phone_one}}</label></div>
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="number" :disabled="disabled_input" name="movil_phone_two" @keyup="validate" id="movil_phone_two" class="form-control" placeholder="celular(opcional)" v-model="data.cell.movil_phone_two">
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="number" :disabled="disabled_input" name="phone" id="phone" @keyup="validate" class="form-control" placeholder="Teléfono" v-model="data.cell.phone">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="gender">Género*</label>
                    <v-select class="bg-white " :disabled="disabled_input" :options="[ 'Masculino', 'Femenino' ]" :class="{'error-input':error_data.gender}" v-model="data.gender" label='gender' placeholder="Género"></v-select>
                    <div><label class="error-msg" v-show="error_data.gender">{{msg_data.gender}}</label></div>
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
                msg_data : {
                    document_type       : "",
                    address             : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    type                : "",
                    gender              : "",
                    cell : {
                        movil_phone_one : "",
                        movil_phone_two : "",
                        phone : ""
                    },
                },
                error_data : {
                    document_type       : false,
                    address             : false,
                    document_number     : false,
                    name                : false,
                    mother_last_name    : false,
                    father_last_name    : false,
                    type                : false,
                    gender              : false,
                    cell : {
                        movil_phone_one : false,
                        movil_phone_two : false,
                        phone : false
                    },

                },
                data : {
                    document_type       : "",
                    address             : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    type                : "debit",
                    gender              : "",
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
            validate_opcional(){
                // for( let cell in this.data.cell ){
                //     if( this.data.cell[cell] != "" && !regex.aloneCell( this.data.cell[cell])){
                //          this.error_data.cell[cell] = true
                //         this.msg_data.cell[cell] = 'Solo 9 digitos'
                //     }
                // }
            },
            is_correct(){
                // let _this = this
                // let all_false = false
                // for( let element in _this.data ){

                //     if( element == 'cell' ){
                //         for( let element_cell in _this.data.cell){
                //             if( _this.error_data.cell[element_cell] && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone' )
                //                 return true
                //         }
                       
                //     }else{
                //        if( _this.error_data[element] )
                //                 return true
                //     }
                // }
                // return false
                
            },
            validate(){
                // let _this = this
                // for( let element in _this.data ){

                //     if( element == 'cell' ){
                //         for( let element_cell in _this.data.cell){
                //             if( _this.data.cell[element_cell] == "" && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone' ){
                //                 _this.error_data.cell[element_cell] = true
                //                 _this.msg_data.cell[element_cell] = 'Campo obligatorio'
                //             }else{
                //                 if( !regex.aloneCell( _this.data.cell[element_cell]) && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone'  ){
                //                     _this.error_data.cell[element_cell] = true
                //                     _this.msg_data.cell[element_cell] = 'Solo 9 digitos'
                //                 }else{
                //                     _this.error_data.cell[element_cell] = false
                //                 }
                //             }
                //         }
                //     }else{
                //         if( _this.data[element] == "" ){

                //             _this.error_data[element] = true
                //             _this.msg_data[element] = 'Campo obligatorio'

                //         }else {
                //             if( element == 'name' || element == 'mother_last_name' || element == 'father_last_name' ){
                //                 if( !regex.aloneLetters( _this.data[element] ) ){
                //                     _this.error_data[element] = true
                //                     _this.msg_data[element] = 'Solo letras'
                //                 }else{
                //                     _this.error_data[element] = false
                //                 }

                //             }else {
                //                 _this.error_data[element] = false
                //             }
                //         }

                //     }
                // }
            },
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
                this.data_props.person.cell = JSON.parse( this.data_props.person.cell )
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
