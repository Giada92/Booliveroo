<template>
  <div>
    <div class="sfondo"></div>
    <div class="container my-4">
      <h1>I Nostri Preferiti</h1>
      <div class="row">
          <Card 
        :item="restaurant"
        v-for="restaurant in restaurants" :key="restaurant.id"/>
      </div>
    </div>
  </div>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    name: 'Home',
    components:{
      Card
    },
    data(){
      return{
        restaurants: []
      }
    },
    methods: {
      getRestaurants: function(){
        axios.
        get('http://127.0.0.1:8000/api/restaurants')
        .then((res)=>{
          //console.log(res.data.data);
          this.restaurants = res.data.data;
        })
        .catch((err)=>{
           console.log(err);
        });
      }
    },
    created: function(){
      this.getRestaurants();
    }
}
</script>

<style lang="scss" scoped>

.sfondo {
    position: relative;
    width: 100%;
    height: 100vh;
    background-color: bisque;
}

</style>