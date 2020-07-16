<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <!-- <app-hamburger/> -->
                    <!-- <app-menu/> -->
                </div>
            </div>
        </div>
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
            console.log('Component mounted.')
        }
    }
</script>
