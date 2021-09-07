<template>
  <div>
      <Header />
      <div>
          <router-view></router-view>
      </div>

      <Footer />
  </div>
</template>

<script>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';



export default {
    name: 'App',
    components:{
        Header,
        Footer
    }
}
</script>

<style>

    /* body {
        background: url('~/img/jumbotron-gradientred.jpg') fixed no-repeat;
    } */
</style>