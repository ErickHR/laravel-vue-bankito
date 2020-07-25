<template>

    <div class="container">
        <div>
            <div class="f-20 f-weight">Datos Personales</div>
            <div class="p-3 bg-01 border-top">
                <div class="row">
                    <div class="col">
                        <label for="document_type">Tipo de Documento</label>
                        <v-select class="bg-white " :disabled="update" :options="[ 'dni', 'Pasaporte', 'Carnet de Extranjeria' ]" v-model="data.document_type" label='document_type' placeholder="Tipo de Documento"></v-select>
                    </div>
                    <div class="col">
                        <label for="dni">Número de Documento</label>
                        <input type="number" :disabled="update" name="dni" class="form-control" placeholder="Documento" v-model="data.document_number">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" v-model="data.name" :disabled="update">
                    </div>
                    <div class="col">
                        <label for="father_last_name">Apellido Paterno</label>
                        <input type="text" name="father_last_name" id="father_last_name" class="form-control" :disabled="update" v-model="data.father_last_name" placeholder="Apellido Paterno">
                    </div>
                    <div class="col">
                        <label for="mother_last_name">Apellido Materno</label>
                        <input type="text" name="mother_last_name" id="mother_last_name" class="form-control" :disabled="update" v-model="data.mother_last_name" placeholder="Apellido Materno">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="date_of_birth"> Fecha de Nacimiento </label>
                        <datepicker :language="es" :disabled-dates="disabledDates" name="date_of_birth" v-model="data.date_of_birth" :disabled="update" ></datepicker>
                    </div>
                    <div class="col">
                        <label for="gender">Género</label>
                        <v-select class="bg-white " :options="[ 'Masculino', 'Femenino' ]" :disabled="update" v-model="data.gender" label='gender' placeholder="Género"></v-select>
                    </div>
                    <div class="col">
                        <label for="country_birth">País de Nacimiento</label>
                        <input type="text" v-model="data.country_birth" name="country_birth" :disabled="update" id="country_birth" class="form-control" placeholder="Pais de Nacimiento">
                    </div>
                    <div class="col">
                        <label for="nationality">País de Nacionalidad</label>
                        <input type="text" v-model="data.nationality" name="nationality" :disabled="update" id="nationality" class="form-control" placeholder="Nacionalidad">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="civil_status">Estado Civil</label>
                        <v-select class="bg-white" v-model="data.civil_status" :disabled="update" :options="[ 'soltero', 'casado', 'divorciado' ]" label='civil_status' placeholder="Estado Civil" @input="getSelected" ></v-select>
                    </div>
                    <div class="col">
                        <label for="degree_of_study">Grado de Estudios</label>
                        <v-select class="bg-white" v-model="data.degree_of_study" :disabled="update" :options="degree_study" label='degree_of_study' placeholder="Grado de Estudios"></v-select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular</label>
                    <input type="text" v-model="data.cell.movil_phone_one" name="movil_phone_one" :disabled="update" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="text" v-model="data.cell.movil_phone_two" name="movil_phone_two" :disabled="update" id="movil_phone_two" class="form-control" placeholder="celular(opcional)">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="text" v-model="data.cell.email" name="email" id="email" class="form-control" placeholder="email" :disabled="update">
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="text" v-model="data.cell.phone" name="phone" id="phone" class="form-control" placeholder="teléfono" :disabled="update">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="mz">Mz</label>
                    <input type="text" v-model="data.address.mz" name="Mz" id="Mz" class="form-control" placeholder="Mz" :disabled="update">
                </div>
                <div class="col">
                    <label for="lt">Lt</label>
                    <input type="number" v-model="data.address.lt" name="lt" id="lt" class="form-control" placeholder="Lt" :disabled="update">
                </div>
                <div class="col">
                    <label for="street">Calle</label>
                    <input type="text" v-model="data.address.street" name="street" id="street" class="form-control" placeholder="Calle" :disabled="update">
                </div>
                <div class="col">
                    <label for="jr">Jirón</label>
                    <input type="text" v-model="data.address.jr" name="jr" id="jr" class="form-control" placeholder="Jiron" :disabled="update">
                </div>
                <div class="col">
                    <label for="district">Distrito</label>
                    <input type="text" v-model="data.address.district" name="district" id="district" class="form-control" placeholder="Distrito" :disabled="update">
                </div>
                <div class="col">
                    <label for="flat">Departamento</label>
                    <input type="text" v-model="data.address.flat" name="flat" id="flat" class="form-control" placeholder="Departemento" :disabled="update">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="employment">Ocupación</label>
                    <input type="text"  v-model="data.employment" name="employment" id="employment" class="form-control" placeholder="Ocupación" :disabled="update">
                </div>
                <div class="col">
                    <label for="salary">Salario Promedio (Mensual)</label>
                    <input type="number"  v-model="data.salary" name="salary" id="salary" class="form-control" placeholder="Salario Promedio" :disabled="update">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="degree_credit">Grado de línea de crédito</label>
                    <v-select class="bg-white color-inpu" v-model="data.degreet_credit" :disabled="update" :options="[ '1 ( 0 - 1500 )', '2 ( 1500 - 5000 )', '3 ( 5000 - 15000 )', '4 ( 15000 - 45000 )' ]" label='degree_credit' placeholder="Linea de crédito" ></v-select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-10">
                </div>
                <div class="col-1">
                    <button class="btn btn-primary" @click="register" v-if="!update_btn">Registrar</button>
                    <button class="btn" :class="{'btn-warning':!change_btn, 'btn-success':change_btn}"  @click="modified_data" v-if="update_btn">{{tittle_btn}}</button>
                </div>
                <div class="col-1">
                </div>
            </div>
        </div>
        <Appwaiting v-if="show_waiting"></Appwaiting>
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
            'update_props'
        ],
        data: function(){
            return{
                update_btn              : false,
                change_btn              : false,
                tittle_btn              : "",
                update                  : false,
                show_waiting            : false,
                data : {
                    document_type       : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    date_of_birth       : this.authorizedDate(),
                    gender              : "",
                    country_birth       : "",
                    nationality         : "",
                    civil_status        : "",
                    degree_of_study     : "",
                    cell : {
                        movil_phone_one : "",
                        movil_phone_two : "",
                        phone : ""
                    },
                    email               : "",
                    address:{
                        mz              : "",
                        lt              : "",
                        street          : "",
                        jr              : "",
                        district        : "",
                        flat            : "",
                    },
                    employment          : "",
                    salary              : "",
                    degreet_credit      : "",
                    type                : "credit"
                },
                disabledDates:{
                    from : this.authorizedDate()
                },
                es: language,
                degree_study:[
                    '1° primaria',
                    '2° primaria',
                    '3° primaria',
                    '4° primaria',
                    '5° primaria',
                    '6° primaria',
                    '1° secundaria',
                    '2° secundaria',
                    '3° secundaria',
                    '4° secundaria',
                    '5° secundaria',
                    'técnico',
                    'universitario',
                    'no tuvo estudios'
                ]
            }
        },
        methods:{
            getSelected(datos){
                console.log(datos)
            },
            authorizedDate(){
                let current = new Date()
                return new Date( current.getFullYear() - 20 , current.getMonth(), current.getDay() )
            },
            showSwal( msg ){
                this.show_waiting = false
                Swal.fire(
                        msg.tittle,
                        '',
                        msg.type
                    )
            },
            modified_data(){
                let _this = this
                let body = { ...this.data }
                if ( !this.change_btn ){
                    this.change_btn = true
                    this.update = false
                    this.tittle_btn = "Guardar"
                } else {
                    
                    body.address = JSON.stringify( this.data.address )
                    body.cell = JSON.stringify( this.data.cell )
                    this.show_waiting = true
                    axios.put( `people/${_this.data.id}`, body )
                        .then( res => {
                            res.data.response ? _this.showSwal( { tittle : "Modificado !", type : "success" } ) : _this.showSwal( { tittle : `Error.. ${res.response.e}`, type:'error' } )
                            _this.$emit( 'close_request_credit_card' )
                        } )
                        .catch( e => {
                            _this.showSwal( { tittle:`${e}`, type:"warning" } )
                        } )
                }
                
            },
            register(){
                let _this = this
                let body = { ...this.data }
                body.address = JSON.stringify( this.data.address )
                body.cell = JSON.stringify( this.data.cell )
                this.show_waiting = true
                axios.post( 'people', body )
                    .then( res => {
                        res.data.response? _this.showSwal( { tittle:"Guardado!", type:"success" } ) : _this.showSwal( { tittle: `No sé Guardado! ${res.data.e}`, type:"error" } )
                    } )
                    .catch( e =>{
                        _this.showSwal( { tittle:`${e}`, type:"warning" } )
                    } ) 
            }
        },
        mounted(){
            this.tittle_btn = "Modificar"
            $(".vdp-datepicker input").css({'border': '1px solid #ced4da', 'border-radius' : '4px', 'color':'#495057', 'height':'38px'})

            if ( this.data_props ){
                this.data   = this.data_props
                this.update = this.update_props
                this.update_btn = this.update_props
            }
            
        }
    }
</script>
