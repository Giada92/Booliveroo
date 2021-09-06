<template>
    <div class="container">
      <div class="wrapper">
          <h2>Ristorante menu</h2>
      </div>
    </div>
</template>

<script>
export default {
    name: 'Restaurant',
    data(){
      return{
        restaurant: []
      }
    },
    methods: {
      getRestaurant: function(slug){
        axios.
        get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
        .then((res)=>{
          console.log(res.data);
          //this.restaurants = res.data.data;
        })
        .catch((err)=>{
           console.log(err);
        });
      }
    },
    created: function(){
      this.getRestaurant(this.$route.params.slug);
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
  margin-top: 100px;
}

</style>