<template>
    <div class="container">
        Checkout

        <Payment :authorization="tokenApi" />

        <button v-if="!disableBuyButton" 
        @click.prevent="beforeBuy">
            Procedi con l'acquisto
        </button>
        <button v-else>
                {{ loadingPayment ? 'Loading...' : 'Procedi con l\'acquisto' }}
        </button>
    </div>
</template>

<script>
import Payment from '../components/Payment.vue';

export default {
    name: 'Checkout',
    components:{
        Payment
    },
    data(){
        return{
            tokenApi: "",
            disableBuyButton: true,
            loadingPayment: true
        }
    },
    mounted(){
        axios.get("http://127.0.0.1:8000/api/orders/generate")
        .then((res)=>{
            this.tokenApi = res.data.token;
            this.loadingPayment = false;
            this.disableBuyButton = false;
        }).catch((err)=>{
            console.log(err);
        })
    }
}
</script>

<style>

</style>