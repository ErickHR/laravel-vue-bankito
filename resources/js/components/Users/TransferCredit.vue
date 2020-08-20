<template>
    
    <div class="container">
        <div class="mt-4 mb-4">
            <div class="row bg-01 pt-2 pb-3">
                <div class="col">
                    <label for="date_of_birth"> Cantidad </label>
                    <input class="form-control" v-model="data.amountAccount" type="number">
                </div>
                <div class="col">
                    <label for="date_of_birth"> Transferencia </label>
                    <input class="form-control" v-model="data.amount" type="number">
                </div>
                <div class="col">
                    <label for="date_of_birth"> Cuenta </label>
                    <input class="form-control" v-model="data.account_id" type="text">
                </div>
                <div class="col">
                    <div class="mt-4"><button class="btn btn-success" @click="sentAmount">Enviar</button></div>
                </div>
            </div>
        </div>
        <table id="table_id" class="tableBP">
            <thead>
                <tr>
                    <th>#</th>
                    <th>CUENTA</th>
                    <th>MONTO</th>
                    <th>TIPO</th>
                    <th>FECHA</th>
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
                amount : 0,
                account_id : 0,
                amountAccount: 0,
                type:'Envio'

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
        showOperation(){
            axios.get('operation-show')
            .then( res => {
                console.log(res.data)
            } )
        },
        amountMine(){
            let _this = this
            axios.get('operation')
            .then( res => {
                _this.data.amountAccount = res.data.amount
            } )
        },
        sentAmount(){
            let _this = this
            let body = {..._this.data}
            axios.post('operation', body).
                then(res => {
                    _this.amountMine()
                     _this.table.ajax.reload();
                })
        },
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
        _this.showOperation()
        _this.amountMine()
         $(document).ready( function () {
             
            _this.table = $('#table_id').DataTable( {
                ajax:{
                    url:'/operation-show',
                },
                columns:[
                    { data : 'id' },
                    { data:"account_id" },
                    { data:"amount" },
                    { data:"type" },
                    { data:"created_at" },
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