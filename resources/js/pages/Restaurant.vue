<template>
    <div class="">
      <div class="wrapper container">
        <div class="cart w-400">
          <h3>Il tuo carello</h3>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Piatto</th>
                <th>Prezzo</th>
                <th>Azione</th>
              </tr>
            </thead>
            <tbody>
              <tr
              v-for="(x, n) in cart" 
              :key="n"
              >
                <td>{{ x.name }}</td>
                <td>{{ x.price }}0€</td>
                <td>
                  <button @click="RemoveFromCart(n)">Remove</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
        <div class="my-4 text-center">
          <h2>Menu</h2>
          <div class="d-flex flex-wrap justify-content-center">
            <div 
            v-for="plate in plates" 
            :key="plate.id"
            class="card"
            >
              <h5>{{ plate.name }}</h5>
              <img :src="plate.img" :alt="plate.name">
              <button @click="AddToCart(plate)">Add</button>
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

  .card {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: calc(20% - 30px);
    height: 200px;
    margin: 30px;
  }


  .cart {
    position: absolute;
    right: 0;
    top: 20%;
    transform: translateY(-20%);
    width: 500px;
    padding: 0 50px;
  }
</style>