<template>
<div class="my_plates">
  <div class="row mt-2 mb-2">
    <div class="col md-10">
      <div class="col md-2 text-right">
        <button class="btn btn-primary">
          {{ badge }}
        </button>
        <div>
          <h5>Cart</h5>
          <button>&times;</button>
        </div>

        <table>
          <tbody>
              <tr v-for="(cart, n) in carts" :key="cart.id">
                  <td>{{ cart.name }}</td>
                  <td>{{ cart.price }}</td>
                  <td></td>
                  <td>
                    <button @click="removeCart(n)"> X </button>
                  </td>
              </tr>
          </tbody>
        </table>

        <div>
          Totale Prezzo: {{ totalPrice }}
          <button>Checkout</button>
        </div>
      </div>
    </div>

  </div>
  <div class="sfondo">
      <div class="wrapper container">
        <!-- <div class="cart w-400">
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
        </div> -->
        
        <div class="text-center main_page">
          <h2>Menu</h2>
          <div class="d-flex flex-wrap justify-content-center">
              <div v-for="plate in plates" :key="plate.id" class="card">
                  <h5>{{ plate.name }}</h5>
                  <img :src="plate.img" :alt="plate.name">
                  <button @click="addCart(plate)">Aggiungi al carrello</button>
              </div>
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
        plate: {
          id: '',
          name: '',
          description: '',
          price: '',
          quantity: ''
        },
        add: true,
        edit: false,
        carts: [],
        cartAdd: {
          id: '',
          name: '',
          description: '',
          price: '',
          quantity: ''
        },
        badge: '0',
        quantity: 1,
        totalPrice: 0
      }
    },
    methods: {
      viewCart(){
          if(localStorage.getItem('carts')){
            this.carts = JSON.parse(localStorage.getItem('carts'));
            this.badge = this.carts.length;
            this.totalPrice = this.carts.reduce((total, item)=>{
                return total + this.quantity * item.price;
            }, 0)
          }
      },
      addCart(plate){
          this.cartAdd.id = plate.id;
          this.cartAdd.name = plate.name;
          this.cartAdd.price = plate.price;
          this.cartAdd.quantity = plate.quantity;
          this.carts.push(this.cartAdd);
          this.storeCart();
      },
      removeCart(plate){
        this.carts.splice(plate, 1);
        this.storeCart();
      },
      storeCart(){
          let parsed = JSON.stringify(this.carts);
          localStorage.setItem('carts', parsed);
          this.viewCart();
      },
      getRestaurant: function(slug){
        axios.
        get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
        .then((res)=>{
          console.log(res.data[0].plates);
          this.plates = res.data[0].plates;
          this.plates.forEach(element => {
              element['quantity'] = 0;
          });
          //console.log(this.plates);
        })
        .catch((err)=>{
           console.log(err);
        });
      }
    },
    created: function(){
      this.getRestaurant(this.$route.params.slug);
      this.viewCart();
      //console.log(this.cart)
    }
}
</script>

<style lang="scss" scoped>

  .sfondo {
    height: auto;
    background-color: white;
  }
  
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

  .main_page {
    padding-bottom: 50px;
  }
</style>