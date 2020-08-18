<template>
    
    <div class="container">
        <button class="btn btn-primary" @click="addWorker">AGREGAR</button>
        <table id="table_id" class="tableBP">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>DNI</th>
                    <th>EMAIL</th>
                    <th>FECHA</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
        </table>
        <worker v-if="addWorkers" :data="{}" :is_pop_up="false"  @closeWorker="closeRegisterWorker"></worker>
        
    </div>

</template>

<script>
import worker from './workerRegister.vue'
export default {
    components:{
        worker
    },
    data: function(){
        return {
            addWorkers : false,
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
        closeRegisterWorker(){
            this.addWorkers=false
            this.table.ajax.reload()
        },
        addWorker(){
            this.addWorkers = true
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
         $(document).ready( function () {
             
            _this.table = $('#table_id').DataTable( {
                ajax:{
                    url:'/worker',
                },
                columns:[
                    { data : 'id' },
                    { data:"name" },
                    {
                        data : null,
                        render : function ( data, type, full, meta ){
                            return data.father_last_name + " " + data.mother_last_name
                        }
                    },
                    { data:"document_number" },
                    { data:"email" },
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