<template>
  <div>
      <Header />
      <div>
          <router-view></router-view>
      </div>

  </div>
</template>

<script>
import Header from './components/Header.vue';



export default {
    name: 'App',
    components:{
        Header,
    }
}
</script>

<style>

    body {
        background: url('~/img/jumbotron-gradientred.jpg') fixed no-repeat;
        background-size: cover;
    }
    html {   
        scroll-behavior: smooth;
    }
    .btn-gradient {
        background: linear-gradient(90deg, #ee3c4a, #fc8237);
        color: white;
    }
</style>