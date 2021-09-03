<template>
  <div>
      <Header />
      <div class="my-5">
          <router-view></router-view>
      </div>
  </div>
</template>

<script>
import Header from './components/Header.vue'

export default {
    name: 'App',
    components:{
        Header
    }
}
</script>

<style>

</style>