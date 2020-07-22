<template>
    
    <div class="container">
        <table id="table_id" class="tableBP">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>DNI</th>
                    <th>FECHA</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
        </table>
        <Appwaiting v-if="show_waiting"></Appwaiting>
        <request-credit-card-pop-up :data="show_request_credit_data" v-if="show_request_credit"></request-credit-card-pop-up>
    </div>

</template>

<script>
import Appwaiting from './utils/waiting.vue'
import RequestCreditCardPopUp from './RequestCreditCard_Pop_Up.vue'
export default {
    components:{
        Appwaiting,
        RequestCreditCardPopUp
    },
    data: function(){
        return {
            show_waiting : false,
            show_request_credit_data : "",
            show_request_credit : false
        }
    },
    methods:{
        show( table ){
            let _this = this
            $( "button.show" ).on('click', function(){
                let data = table.row( $(this).parents( 'tr' ) ).data()
    
                axios.get( `request-cards/${data.id}` )
                    .then( res => {

                        _this.show_request_credit_data = res.data.person
                        _this.show_request_credit_data.cell = JSON.parse(res.data.person.cell)
                        _this.show_request_credit_data.address = JSON.parse(res.data.person.address)
                        _this.show_request_credit = true
                        
                    } )
                
            })
        },
        showSwal( msg ){
            this.show_waiting = false
            Swal.fire(
                    msg.tittle,
                    '',
                    msg.type
                )
        },
        btn_approve_disapprove( btn ){

            if ( btn == "aprobado" ) {
                return `
                        <div style = " width : fit-content; margin : 0 auto ">
                            <button class="btn btn-primary">Aprobado</button>
                        </div>
                    `
            }

            if ( btn == "desaprobado" ) {
                return  `
                    <div style = " width : fit-content; margin : 0 auto ">
                        <button class="btn btn-danger show">Desaprobado</button>
                    </div>
                `
            }
                                        
            
        },
        approve_disapprove(table){
            let _this = this
            $('button.approveDisapprove').on('click', function ( btn ) { 
                _this.show_waiting = true

                let data = table.row( $(this).parents( 'tr' ) ).data()
                
                let div_father = btn.target.parentElement
                $( div_father ).html( _this.btn_approve_disapprove(btn.target.dataset.request) )
                
                data.request = btn.target.dataset.request
                axios.put(`request-cards/${data.id}`, data).
                    then( res => {
                        res.data.response? _this.showSwal( { tittle:"Guardado!", type:"success" } ) : _this.showSwal( { tittle: `No sé Guardado! ${res.data.e}` , type:"error" } )
                    } )
                    .catch( e =>{
                        _this.showSwal( { tittle:`${e}`, type:"warning" } )
                    } )  
             })
        }
    },
    mounted(){
        let _this = this
        let table
        this.show_waiting = false
         $(document).ready( function () {
                table = $('#table_id').DataTable( {
                    ajax:{
                        url:'/request-credit-cards-show'
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
                        { data:"created_at" },
                        {
                            data:null,
                            render : function ( data ) {
                                
                                if ( data.request == 'ver' )
                                    return `
                                            <div style = " width : fit-content; margin : 0 auto ">
                                                <button class="btn btn-success show">Mostrar</button>
                                                <button class="btn btn-info approveDisapprove" data-request="aprobado">Aprobar</button>
                                                <button class="btn btn-warning approveDisapprove" data-request="desaprobado">Desaprobar</button>
                                            </div>
                                        `
                                if ( data.request == 'aprobado' )
                                    return _this.btn_approve_disapprove( 'aprobado' )

                                if ( data.request == 'desaprobado' )
                                    return _this.btn_approve_disapprove( 'desaprobado' )

                                
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

                table.on( 'draw', function () {
                    _this.show( table )
                    _this.approve_disapprove(table)
                    
                } );
            } )
        
    }
}
</script>