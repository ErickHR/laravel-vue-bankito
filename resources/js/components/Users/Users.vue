<template>
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de Usuarios</div>

                    <div class="card-body">
                        <table class="tableBP">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Rol</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                </tr>
                                <tr>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                    <td>asd</td>
                                </tr>
                            </tbody> 
                        </table>
                    </div> -->
                    <!-- <app-hamburger/> -->
                    <!-- <app-menu/> -->
                <!--</div>
            </div>
        </div>-->
        <table id="table_id" class="tableBP">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</template>

<script>

    // import AppHamburger from './effects/hamburger'
    // import AppMenu from './appMenu'

    export default {

        components:{
            // AppHamburger,
            // AppMenu
        },

        mounted() {
            let data = [
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ],
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ],
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ],
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ],
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ],
    [
        "Tiger Nixon",
        "System Architect",
    ],
    [
        "Garrett Winters",
        "Edinburgh",
    ]
]
                $(document).ready( function () {
    $('#table_id').DataTable({data});
} );
        }
    }
</script>
