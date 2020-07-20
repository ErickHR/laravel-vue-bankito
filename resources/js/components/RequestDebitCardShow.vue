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
    </div>

</template>

<script>
export default {
    data: function(){
        return {
        }
    },
    methods:{
        show( table ){
            $( "button.show" ).on('click', "", function(){
                let data = table.row( $(this).parents( 'tr' ) ).data()
            })
        }
    },
    mounted(){
        let _this = this
        let table
         $(document).ready( function () {
            table = $('#table_id').DataTable( {
                ajax:{
                    url:'/people'
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
                    { data:"dni" },
                    { data:"created_at" },
                    {
                        data:null,
                        render : function ( data ) {

                            if ( data.request_credit_card ){
                                if ( data.request_credit_card.request == 'ver' )
                                    return `
                                            <div style = " width : fit-content; margin : 0 auto ">
                                                <button class="btn btn-success show">Mostrar</button>
                                                <button class="btn btn-info show">Aprobar</button>
                                                <button class="btn btn-warning show">Desaprobar</button>
                                            </div>
                                        `
                                if ( data.request_credit_card.request == 'aprobado' )
                                    return `
                                            <div style = " width : fit-content; margin : 0 auto ">
                                                <button class="btn btn-primary show">Aprobado</button>
                                            </div>
                                        `
                                if ( data.request_credit_card.request == 'desaprobado' )
                                    return `
                                            <div style = " width : fit-content; margin : 0 auto ">
                                                <button class="btn btn-danger show">Desaprobado</button>
                                            </div>
                                        `
                            }
                             
                             return `
                                        <div style = " width : fit-content; margin : 0 auto ">
                                            <button class="btn btn-link red show">Vacío</button>
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
                 
            _this.show( table )

            } )
        
    }
}
</script>