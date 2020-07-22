<template>
    <div class="waiting-result">
        <div class="waiting-result-container">
            <div class="pop-up">
                <request-credit-card :data_props="data" :update_props="true"></request-credit-card>
            </div>
        </div>
    </div>
</template>

<script>
import requestCreditCard from './RequestCreditCard.vue'
export default {
    
    components:{
        requestCreditCard
    },
    props:[
        'data'
    ],
    data : function(){
        return {

        }
    },
    mounted(){
        
    }

}
</script>