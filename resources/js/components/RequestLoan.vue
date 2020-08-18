<template>

    <div class="container">
        <div class="form-group">
            <div class="row">
                <div class="col">
                        <label for="document_type">Tipo de Documento*</label>
                        <v-select class="bg-white "  :class="{'error-input':error_data.document_type}" :disabled="disabled_input"  @click="validate" :options="[ 'DNI', 'Pasaporte', 'Carnet de Extranjeria' ]" v-model="data.document_type" label='document_type' placeholder="Tipo de Documento"></v-select>
                        <div><label class="error-msg" v-show="error_data.document_type">{{msg_data.document_type}}</label></div>
                    </div>
                    <div class="col">
                        <label for="dni">Número de Documento*</label>
                        <input type="number" :disabled="disabled_input" name="dni" @keyup="validate" class="form-control" :class="{'error-input':error_data.document_number}" placeholder="Documento" v-model="data.document_number">
                        <div><label class="error-msg" v-show="error_data.document_number">{{msg_data.document_number}}</label></div>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                        <label for="name">Nombre*</label>
                        <input type="text" name="name"  @keyup="validate" id="name" class="form-control"  :class="{'error-input':error_data.name}" placeholder="Nombre" v-model="data.name" :disabled="disabled_input">
                        <div><label class="error-msg" v-show="error_data.name">{{msg_data.name}}</label></div>
                    </div>
                <div class="col">
                        <label for="father_last_name">Apellido Paterno*</label>
                        <input type="text" name="father_last_name"  @keyup="validate" id="father_last_name" class="form-control" :class="{'error-input':error_data.father_last_name}"  :disabled="disabled_input" v-model="data.father_last_name" placeholder="Apellido Paterno">
                        <div><label class="error-msg" v-show="error_data.father_last_name">{{msg_data.father_last_name}}</label></div>
                    </div>
                    <div class="col">
                        <label for="mother_last_name">Apellido Materno*</label>
                        <input type="text" name="mother_last_name"  @keyup="validate" id="mother_last_name" class="form-control" :class="{'error-input':error_data.mother_last_name}" :disabled="disabled_input" v-model="data.mother_last_name" placeholder="Apellido Materno">
                        <div><label class="error-msg" v-show="error_data.mother_last_name">{{msg_data.mother_last_name}}</label></div>
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                        <label for="date_of_birth"> Fecha de Nacimiento*</label>
                        <datepicker :language="es" :disabled-dates="disabledDates" name="date_of_birth" :class="{'error-input':error_data.date_of_birth}" v-model="data.date_of_birth" :disabled="disabled_input" ></datepicker>
                        <div><label class="error-msg" v-show="error_data.date_of_birth">{{msg_data.date_of_birth}}</label></div>
                    </div>
                    <div class="col">
                        <label for="gender">Género*</label>
                        <v-select class="bg-white "  :options="[ 'Masculino', 'Femenino' ]" :class="{'error-input':error_data.gender}" :disabled="disabled_input" v-model="data.gender" label='gender' placeholder="Género"></v-select>
                        <div><label class="error-msg" v-show="error_data.gender">{{msg_data.gender}}</label></div>
                    </div>
                    <div class="col">
                        <label for="country_birth">País de Nacimiento*</label>
                        <input type="text" v-model="data.country_birth" name="country_birth"  :class="{'error-input':error_data.country_birth}" @keyup="validate" :disabled="disabled_input" id="country_birth" class="form-control" placeholder="Pais de Nacimiento">
                        <div><label class="error-msg" v-show="error_data.country_birth">{{msg_data.country_birth}}</label></div>
                    </div>
                    <div class="col">
                        <label for="nationality">País de Nacionalidad*</label>
                        <input type="text" v-model="data.nationality" name="nationality" :class="{'error-input':error_data.nationality}" @keyup="validate" :disabled="disabled_input" id="nationality" class="form-control" placeholder="Nacionalidad">
                        <div><label class="error-msg" v-show="error_data.nationality">{{msg_data.nationality}}</label></div>
                    </div>
            </div>
            <div class="row">
                <div class="col">
                        <label for="civil_status">Estado Civil*</label>
                        <v-select class="bg-white"   v-model="data.civil_status" :class="{'error-input':error_data.civil_status}" :disabled="disabled_input" @click="validate" :options="[ 'soltero', 'casado', 'divorciado' ]" label='civil_status' placeholder="Estado Civil" @input="getSelected" ></v-select>
                         <div><label class="error-msg" v-show="error_data.civil_status">{{msg_data.civil_status}}</label></div>
                    </div>
                <div class="col">
                        <label for="degree_of_study">Grado de Estudios*</label>
                        <v-select class="bg-white" v-model="data.degree_of_study"  :class="{'error-input':error_data.degree_of_study}" :disabled="disabled_input"  @click="validate" :options="degree_study" label='degree_of_study' placeholder="Grado de Estudios"></v-select>
                        <div><label class="error-msg" v-show="error_data.degree_of_study">{{msg_data.degree_of_study}}</label></div>
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="movil_phone_one">Celular*</label>
                    <input type="number" v-model="data.cell.movil_phone_one" :class="{'error-input':error_data.cell.movil_phone_one}" @keyup="validate" name="movil_phone_one" :disabled="disabled_input" id="movil_phone_one" class="form-control" placeholder="Celular">
                    <div><label class="error-msg" v-show="error_data.cell.movil_phone_one">{{msg_data.cell.movil_phone_one}}</label></div>
                </div>
                <div class="col">
                    <label for="movil_phone_two">Celular 2</label>
                    <input type="number" v-model="data.cell.movil_phone_two" @keyup="validate" name="movil_phone_two" :disabled="disabled_input" id="movil_phone_two" class="form-control" placeholder="celular(opcional)">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email">Email*</label>
                    <input type="text" v-model="data.email" :class="{'error-input':error_data.email}" name="email" @keyup="validate" id="email" class="form-control" placeholder="email" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.email">{{msg_data.email}}</label></div>
                </div>
                <div class="col">
                    <label for="phone">Telefono</label>
                    <input type="number" v-model="data.cell.phone" name="phone" @keyup="validate" id="phone" class="form-control" placeholder="teléfono" :disabled="disabled_input">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="mz">Mz</label>
                    <input type="text" v-model="data.address.mz" name="Mz"  @keyup="validate" id="Mz" class="form-control" placeholder="Mz" :disabled="disabled_input">
                    
                </div>
                <div class="col">
                    <label for="lt">Lt</label>
                    <input type="number" v-model="data.address.lt" name="lt" @keyup="validate"  id="lt" class="form-control" placeholder="Lt" :disabled="disabled_input">
                </div>
                <div class="col">
                    <label for="street">Calle*</label>
                    <input type="text" v-model="data.address.street" :class="{'error-input':error_data.address.street}" name="street" @keyup="validate" id="street" class="form-control" placeholder="Calle" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.address.street">{{msg_data.address.street}}</label></div>
                </div>
                <div class="col">
                    <label for="jr">Jirón</label>
                    <input type="text" v-model="data.address.jr" name="jr" id="jr" @keyup="validate" class="form-control" placeholder="Jiron" :disabled="disabled_input">
                </div>
                <div class="col">
                    <label for="district">Distrito*</label>
                    <input type="text" v-model="data.address.district" name="district" :class="{'error-input':error_data.address.district}" @keyup="validate" id="district" class="form-control" placeholder="Distrito" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.address.district">{{msg_data.address.district}}</label></div>
                </div>
                <div class="col">
                    <label for="flat">Departamento*</label>
                    <input type="text" v-model="data.address.flat" name="flat" id="flat" :class="{'error-input':error_data.address.flat}" @keyup="validate" class="form-control" placeholder="Departemento" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.address.flat">{{msg_data.address.flat}}</label></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="employment">Ocupación*</label>
                    <input type="text"  v-model="data.employment" :class="{'error-input':error_data.employment}" @keyup="validate" name="employment" id="employment" class="form-control" placeholder="Ocupación" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.monthly_amount">{{msg_data.monthly_amount}}</label></div>
                </div>
                <div class="col">
                    <label for="salary">Salario(Mensual)</label>
                    <input type="number"  v-model="data.salary" :class="{'error-input':error_data.monthly_amount}" @keyup="validate" name="salary" id="salary" class="form-control" placeholder="Salario (Mensual)" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.salary">{{msg_data.salary}}</label></div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="amount">Monto de prestamo</label>
                    <input type="number"  v-model="data.amount" :class="{'error-input':error_data.amount}" @keyup="validate" name="amount" id="amount" class="form-control" placeholder="Monto de prestamo" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.amount">{{msg_data.amount}}</label></div>
                </div>
                <div class="col">
                    <label for="month">Meses</label>
                    <v-select class="bg-white " v-model="data.month" :class="{'error-input':error_data.month}" @keyup="validate" :options="[ '1 mes', '2 mes', '3 mes', '4 mes', '5 mes', '6 mes', '7 mes', '8 mes', '9 mes', '10 mes', '11 mes', '12 mes']" label='gender' placeholder="Monto"></v-select>
                </div>
                <div class="col">
                    <label for="monthly_amount">Monto Mensual</label>
                    <input type="number"  v-model="data.monthly_amount" :class="{'error-input':error_data.monthly_amount}" @keyup="validate" name="monthly_amount" id="monthly_amount" class="form-control" placeholder="Salario (Mensual)" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.monthly_amount">{{msg_data.monthly_amount}}</label></div>
                </div>
                <div class="col">
                    <label for="total">Total a pagar</label>
                    <input type="number"  v-model="data.total" :class="{'error-input':error_data.total}" @keyup="validate" name="total" id="total" class="form-control" placeholder="Total a Pagar" :disabled="disabled_input">
                    <div><label class="error-msg" v-show="error_data.total">{{msg_data.total}}</label></div>
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
            'update_props',
            'is_pop_up'
        ],
        data:function(){
            return{
                update_btn              : false,
                change_btn              : false,
                tittle_btn              : "",
                update                  : false,
                show_waiting            : false,
                disabled_input          : false,
                show_btn_pop_up         : false,
                save_btn_pop_up         : false,
                title_btn_pop_up        : "",
                es:language,
                disabledDates:{
                    from: this.authorizedDate()
                },
                msg_data : {
                    document_type       : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    date_of_birth       : "",
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
                    employment         : "",
                    salary              : "",
                    amount              : "",
                    month               : "",
                    monthly_amount      : "",
                    total               : ""

                },
                error_data : {
                    document_type       : false,
                    document_number     : false,
                    name                : false,
                    mother_last_name    : false,
                    father_last_name    : false,
                    date_of_birth       : false,
                    gender              : false,
                    country_birth       : false,
                    nationality         : false,
                    civil_status        : false,
                    degree_of_study     : false,
                    cell : {
                        movil_phone_one : false,
                        movil_phone_two : false,
                        phone : ""
                    },
                    email               : false,
                    address:{
                        mz              : false,
                        lt              : false,
                        street          : false,
                        jr              : false,
                        district        : false,
                        flat            : false,
                    },
                    employment          : false,
                    salary              : false,
                    amount              : false,
                    month               : false,
                    monthly_amount      : false,
                    total               : false
                },
                data : {
                    document_type       : "",
                    document_number     : "",
                    name                : "",
                    mother_last_name    : "",
                    father_last_name    : "",
                    date_of_birth : this.authorizedDate(),
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
                    amount              : "",
                    month               : "",
                    monthly_amount      : "",
                    total               : ""
                },
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
            validate_opcional(){
                 for( let cell in this.data.cell ){
                    if( this.data.cell[cell] != "" && !regex.aloneCell( this.data.cell[cell])){
                          this.error_data.cell[cell] = true
                         this.msg_data.cell[cell] = 'Solo 9 digitos'
                     }
                 }
            },
            is_correct(){
                 let _this = this
                 let all_false = false
                 for( let element in _this.data ){

                     if( element == 'cell' ){
                        for( let element_cell in _this.data.cell){
                            if( _this.error_data.cell[element_cell] && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone' )
                                return true
                        }
                       
                     }else{
           
           
           if( _this.error_data[element] )
                                 return true
                    }
                 }
                 return false
                
            },
            validate(){
                 let _this = this
                for( let element in _this.data ){

                    if( element == 'cell' ){
                         for( let element_cell in _this.data.cell){
                             if( _this.data.cell[element_cell] == "" && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone' ){
                                 _this.error_data.cell[element_cell] = true
                                 _this.msg_data.cell[element_cell] = 'Campo obligatorio'
                             }else{
                                 if( !regex.aloneCell( _this.data.cell[element_cell]) && _this.data.cell[element_cell] != 'movil_phone_two' && _this.data.cell[element_cell] != 'phone'  ){
                                     _this.error_data.cell[element_cell] = true
                                    _this.msg_data.cell[element_cell] = 'Solo 9 digitos'
                           }else{
                                     _this.error_data.cell[element_cell] = false
                                 }
                             }
                         }
                     }
                     else if(element=='address'){
                         for( let element_address in _this.data.address){
                             if( _this.data.address[element_address] == "" ){
                                 _this.error_data.address[element_address] = true
                                 _this.msg_data.address[element_address] = 'Campo obligatorio'
                             }
                             else{
                                 _this.error_data.address[element_address] = false
                             }

                     }}
                     else{
                         if( _this.data[element] == "" ){

                             _this.error_data[element] = true
                             _this.msg_data[element] = 'Campo obligatorio'

                         }else {
                             if( element == 'name' || element == 'mother_last_name' || element == 'father_last_name' || element == 'country_birth' || element == 'nacionality' || element=='employment' ){
                                 if( !regex.aloneLetters( _this.data[element] ) ){
                                    _this.error_data[element] = true
                                     _this.msg_data[element] = 'Solo se permite  letras'
                                 }else{
                               _this.error_data[element] = false
                                 }

                             }else {
                                 _this.error_data[element] = false
                             }
                         }

                     }
                 }
            },
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
                            _this.$emit( 'close_request_loan' )
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
            $(".vdp-datepicker input").css({'border': '1px solid #ced4da', 'border-radius' : '4px', 'color':'#495057', 'height':'38px'})

        }
        
    }
</script>