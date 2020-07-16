<template>

    <div class="item d-flex">
         <router-link :to="route">
             <i :class="icon"></i>
            <span class="item-tittle">
                {{this.tittle}}
            </span>
         </router-link>
    </div>
</template>

<script>
    export default {
        props:[
            'route',
            'icon',
            'tittle'
        ],
        mounted(){
        }
    }
</script>
