<template>

    <div class="container">
        <div>
            <div class="f-20 f-weight">Datos Personales</div>
            <div class="p-3 bg-01 border-top">
                <div class="row">
                    <div class="col">
                        <label for="document_type">Tipo de Documento</label>
                        <v-select class="bg-white " :options="[ 'dni', 'pasaporte', 'immigration_card' ]" v-model="data.document_type" label='document_type' placeholder="Tipo de Documento"></v-select>
                    </div>
                    <div class="col">
                        <label for="dni">Número de Documento</label>
                        <input type="number" name="dni" class="form-control" placeholder="Documento" v-model="data.dni">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" v-model="data.name">
                    </div>
                    <div class="col">
                        <label for="father_last_name">Apellido Materno</label>
                        <input type="text" name="mother_last_name" id="father_last_name" class="form-control" v-model="data.mother_last_name" placeholder="Apellido Paterno">
                    </div>
                    <div class="col">
                        <label for="mother_last_name">Apellido Paterno</label>
                        <input type="text" name="father_last_name" id="mother_last_name" class="form-control" v-model="data.dather_last_name" placeholder="Apellido Materno">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="date_of_birth"> Fecha de Nacimiento </label>
                        <!-- <input type="date" name="date_of_birth" id="dateOf" class="form-control" > -->
                        <datepicker :language="es" :disabled-dates="disabledDates" name="date_of_birth" v-model="data.date_of_birth" ></datepicker>
                    </div>
                    <div class="col">
                        <label for="gender">Género</label>
                        <v-select class="bg-white " :options="[ 'Masculino', 'Femenino' ]" v-model="data.gender" label='gender' placeholder="Género"></v-select>
                    </div>
                    <div class="col">
                        <label for="country_birth">País de Nacimiento</label>
                        <input type="text" v-model="data.country_birth" name="country_birth" id="country_birth" class="form-control" placeholder="Pais de Nacimiento">
                    </div>
                    <div class="col">
                        <label for="nationality">País de Nacionalidad</label>
                        <input type="text" v-model="data.nationality" name="nationality" id="nationality" class="form-control" placeholder="Nacionalidad">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="civil_status">Estado Civil</label>
                        <v-select class="bg-white" v-model="data.civil_status" :options="[ 'soltero', 'casado', 'divorciado' ]" label='civil_status' placeholder="Estado Civil" @input="getSelected" ></v-select>
                    </div>
                    <div class="col">
                        <label for="degree_of_study">Grado de Estudios</label>
                        <v-select class="bg-white" v-model="data.degree_of_study" :options="degree_study" label='degree_of_study' placeholder="Grado de Estudios"></v-select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular</label>
                    <input type="text" v-model="data.cell.movil_phone_one" name="movil_phone_one" id="movil_phone_one" class="form-control" placeholder="Celular">
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="text" v-model="data.cell.movil_phone_two" name="movil_phone_two" id="movil_phone_two" class="form-control" placeholder="celular(opcional)">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email</label>
                    <input type="text" v-model="data.cell.email" name="email" id="email" class="form-control" placeholder="email">
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="text" v-model="data.cell.phone" name="phone" id="phone" class="form-control" placeholder="teléfono">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="mz">Mz</label>
                    <input type="text" v-model="data.address.mz" name="Mz" id="Mz" class="form-control" placeholder="Mz">
                </div>
                <div class="col">
                    <label for="lt">Lt</label>
                    <input type="number" v-model="data.address.lt" name="lt" id="lt" class="form-control" placeholder="Lt">
                </div>
                <div class="col">
                    <label for="street">Calle</label>
                    <input type="text" v-model="data.address.street" name="street" id="street" class="form-control" placeholder="Calle">
                </div>
                <div class="col">
                    <label for="jr">Jirón</label>
                    <input type="text" v-model="data.address.district" name="jr" id="jr" class="form-control" placeholder="Jiron">
                </div>
                <div class="col">
                    <label for="district">Distrito</label>
                    <input type="text" v-model="data.address.district" name="district" id="district" class="form-control" placeholder="Distrito">
                </div>
                <div class="col">
                    <label for="flat">Departamento</label>
                    <input type="text" v-model="data.address.flat" name="flat" id="flat" class="form-control" placeholder="Departemento">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="employment">Ocupación</label>
                    <input type="text"  v-model="data.employment" name="employment" id="employment" class="form-control" placeholder="Ocupación">
                </div>
                <div class="col">
                    <label for="salary">Salario Promedio (Mensual)</label>
                    <input type="number"  v-model="data.salary" name="salary" id="salary" class="form-control" placeholder="Salario Promedio">
                </div>
            </div>
        </div>
        <!-- <div class="form-group">
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="yes" value="yes">
                        <label class="form-check-label" for="gridCheck">
                            Si
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" v-model="data.estoupronado" type="checkbox" id="no" value="no">
                        <label class="form-check-label" for="gridCheck">
                            No
                        </label>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="degree_credit">Grado de línea de crédito</label>
                    <v-select class="bg-white color-inpu" v-model="data.degreet_credit" :options="[ '1 ( 0 - 1500 )', '2 ( 1500 - 5000 )', '3 ( 5000 - 15000 )', '4 ( 15000 - 45000 )' ]" label='degree_credit' placeholder="Linea de crédito" ></v-select>
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
        <Appwaiting v-if="show_waiting"></Appwaiting>
    </div>
    
</template>

<script>
    import Appwaiting from './utils/waiting.vue'
    export default {
        components:{
            Appwaiting
        },
        data: function(){
            return{
                show_waiting             : false,
                data : {
                    document_type       : "",
                    dni                 : "",
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
                    degreet_credit      : ""
                },
                disabledDates:{
                    from : this.authorizedDate()
                },
                es: language,
                prueba:"",
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
            register(){
                let _this = this
                this.show_waiting = true
                axios.post( 'people', _this.data )
                    .then( res => {
                        res.data.response? _this.showSwal( { tittle:"Guardado!", type:"success" } ) : _this.showSwal( { tittle:"No sé Guardado!", type:"error" } )
                    } )
                    .catch( e =>{
                        _this.showSwal( { tittle:`${e}`, type:"warning" } )
                    } ) 
            }
        },
        mounted(){
            $(".vdp-datepicker input").css({'border': '1px solid #ced4da', 'border-radius' : '4px', 'color':'#495057', 'height':'38px'})
        }
    }
</script>
