<template>
    <div class="waiting-result">
        <div class="waiting-result-container">
            <div class="pop-up p-4">
                <request-debit-card :is_pop_up="true" :data_props="data" :update_props="true" @close_request_debit_card="close_request_card"></request-debit-card>
            </div>
        </div>
    </div>
</template>

<script>
import requestDebitCard from './RequestDebitCard.vue'
export default {
    
    components:{
        requestDebitCard
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
            this.$emit( 'close_request_debit_card' )
        }
    },
    mounted(){
        let _this = this
        $('.waiting-result').on('click', ( e ) => {
            if( e.target.className == 'waiting-result-container' || e.target.className == 'waiting-result' ){
                _this.close_request_card()
            }
        } )

    }

}
</script>