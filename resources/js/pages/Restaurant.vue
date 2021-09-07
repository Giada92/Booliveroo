<template>
    <div class="back-white">
      <div class="container">
        <div class="wrapper">
            <h2>Ristorante menu</h2>
            <div>
              <div v-for="plate in plates" :key="plate.id">
                <p>{{ plate.description }}</p>
                <img :src="plate.img" :alt="plate.name">
              </div>
            </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    name: 'Restaurant',
    data(){
      return{
        plates: [],
      }
    },
    methods: {
      getRestaurant: function(slug){
        axios.
        get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
        .then((res)=>{
          console.log(res.data[0].plates);
          this.plates = res.data[0].plates;
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

.back-white {
  background-color: white;
}

.wrapper {
  height: 100vh;
  margin-top: 100px;
}

</style>