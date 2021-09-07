<template>
    <div class="container">
      <div class="wrapper">
        <div v-for="(x, n) in cart" :key="n">
        <h3 >{{ x.name }}</h3>
        <button @click="RemoveFromCart(n)">Remove</button>
        </div>
          <h2>Ristorante menu</h2>
          <div>
            <div v-for="plate in plates" :key="plate.id">
              <p>{{ plate.description }}</p>
              <img :src="plate.img" :alt="plate.name">
              <button @click="AddToCart(plate)">Add</button>
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
        cart: [],
        added: false
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
      },
      AddToCart: function(plate) {
        if (this.cart.length == 0) {
          // this.cart=[];
          this.cart.push(plate);
          // console.log(this.cart);
          console.log(plate);
          this.SavePlate();
        } else {
          // console.log(this.cart);
            this.cart.forEach(element => {
              if (element.id == plate.id) {
                this.added = true;
                // console.log(element.id)
              };
              
            });
            if (this.added == false) {
                this.cart.push(plate);
                this.SavePlate();
              } else {
                this.added = false;
              }
        }
      },
      SavePlate: function() {
        const parsed = JSON.stringify(this.cart);
        localStorage.setItem('cart', parsed);
      },
      RemoveFromCart(n) {
        this.cart.splice(n, 1);
        this.SavePlate();
      }
    },

    created: function(){
      this.getRestaurant(this.$route.params.slug);
      console.log(this.cart)
    },

    mounted: function() {
        if (localStorage.getItem('cart')) {
        try {
          this.cart = JSON.parse(localStorage.getItem('cart'));
        } catch(e) {
          localStorage.removeItem('cart');
        }
      }
    },

    updated() {
        console.log(this.cart)
    }
}
</script>

<style lang="scss" scoped>

.wrapper {
  margin-top: 100px;
}

</style>