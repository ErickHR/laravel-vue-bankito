<template>
    
    <div class="container">
        <div class="mt-4 mb-4">
            <div class="row bg-01 pt-2 pb-3">
                <div class="col">
                    <label for="date_of_birth"> Desde </label>
                    <datepicker :language="es" :disabled-dates="disabledDates" name="" v-model="data.from"></datepicker>
                </div>
                <div class="col">
                    <label for="date_of_birth"> Hasta </label>
                    <datepicker :language="es" :disabled-dates="disabledDates" name="" v-model="data.to"></datepicker>
                </div>
                <div class="col">
                    <div class="mt-4"><button class="btn btn-success" @click="searchByDate">BUSCAR</button></div>
                </div>
            </div>
        </div>
        <table id="table_id" class="tableBP">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>DNI</th>
                    <th>CUENTA</th>
                    <th>Nro TARJETA</th>
                    <th>FECHA</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
        </table>
        <requestDebitCardPopUp v-if="request_debit_card_show" :data="request_debit_card_data" @close_request_debit_card="close_request_debit_cards"></requestDebitCardPopUp>
    </div>

</template>

<script>
import requestDebitCardPopUp from './../RequestDebitCardShow_Pop_Up.vue'
export default {
    components:{
        requestDebitCardPopUp
    },
    data: function(){
        return {
            data:{
                from : this.authorizedDate(),
                to   : this.authorizedDate(),

            },
            request_debit_card_data : "",
            request_debit_card_show : false,
            table : "",
            es: language,
            disabledDates:{
                    from : this.authorizedDate()
                },
        }
    },
    methods:{
        
        searchByDate(){
            this.table.ajax().reload()
        },
        authorizedDate(){
            let current = new Date()
            return new Date( current.getFullYear(), current.getMonth(), current.getDay() )
        },
        close_request_debit_cards(){
            this.request_debit_card_show=false
            this.table.ajax.reload();
        },
        show( table ){
            let _this = this
            $( "button.show" ).on('click', "", function(){
                let data = table.row( $(this).parents( 'tr' ) ).data()
                axios.get(`account/${data.id}`)
                    .then( res => {
                        _this.request_debit_card_data = {...res.data}
                        _this.request_debit_card_show = true
                    } )
                    .catch( e => {
                        console.log(e)
                    } )
            })
        }
    },
    mounted(){
        let _this = this
         $(document).ready( function () {
             
            _this.table = $('#table_id').DataTable( {
                ajax:{
                    url:'/account-debit',
                },
                columns:[
                    { data : 'id' },
                    { data:"person.name" },
                    {
                        data : null,
                        render : function ( data, type, full, meta ){
                            return data.person.father_last_name + " " + data.person.mother_last_name
                        }
                    },
                    { data:"person.document_number" },
                    { data:"account_number" },
                    { data:"card.card_number" },
                    { data:"created_at" },
                    {
                        data:null,
                        render : function ( data ) {
                            if ( data.request == 'Aprobado' )
                                return `
                                        <div style = " width : fit-content; margin : 0 auto ">
                                            <button class="btn btn-success show"><i class="far fa-eye"></i></button>
                                        </div>
                                    `
                             
                             return `
                                        <div style = " width : fit-content; margin : 0 auto ">
                                            <button class="btn btn-link red">Vacío</button>
                                        </div>
                                    `
                                
                        }
                    }
                ],
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ <br> Total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
                }  )
                 
            _this.table.on('click', function(){
                _this.show( _this.table )
            })

        } )
        
    }
}
</script>