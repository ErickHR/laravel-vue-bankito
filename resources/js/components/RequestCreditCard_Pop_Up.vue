<template>
    <div class="waiting-result">
        <div class="waiting-result-container">
            <div class="pop-up">
                <request-credit-card :data_props="data" :update_props="true" @close_request_credit_card="close_request_card"></request-credit-card>
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
    methods:{
        close_request_card(){
            this.$emit( 'close_request_card' )
        }
    },
    mounted(){
        
    }

}
</script>