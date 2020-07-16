<template>

    <div id="menu">
        <div id="app-menu">
            <nav class="navbar navbar-expand-md border-bottom navbar-light bg-white">
                <div class="container">
                    <span>BankPerú</span>
                    <img src="/img/bankPeru.jpeg" style="width:35px">
                    <div class="ml-auto" >
                        <app-hamburger id='hamburger' hideClass='app-menu'/>
                    </div>
                </div>
            </nav>

            <div class="container-item">
                <div v-for="(item, index) in items" :key="index">
                    <app-item :route="item.route" :tittle="item.tittle" :icon="item.icon"/>
                </div>
            </div>
        </div>
    </div>

</template>


<script>
    import AppHamburger from './effects/Hamburger'
    import AppItem from './item/Item'

    export default {

        components:{
            AppHamburger,
            AppItem
        },
        props:[
            'items'
        ],
        data(){
            return {
            }
        },

        mounted(){
            
        }
    }
</script>
