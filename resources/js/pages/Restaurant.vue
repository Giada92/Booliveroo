<template>
  <div class="">
      <div class="wrapper container-fluid">
        <div class="row">
          <div class="my-4 text-center col-lg-6 offset-lg-3">
            <h2>{{ restaurant.name }}</h2>
            <div class="d-flex flex-wrap justify-content-center">
              <div 
              v-for="plate in restaurant.plates" 
              :key="plate.id"
              class="card"
              >
                <h5>{{ plate.name }}</h5>
                <img :src="plate.img" :alt="plate.name">
                <button @click="addCart(plate)">Aggiungi al carrello</button>
              </div>
            </div>
          </div>

          <div class="cart col-lg-3">
            <h3>Il tuo carello</h3>
            <button class="btn btn-primary">
                    {{ badge }}
            </button>
            <div>
                <h5>Cart</h5>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Piatto</th>
                  <th>Prezzo</th>
                  <th>Quantità</th>
                  <th>Azione</th>
                </tr>
              </thead>
              <tbody>
                    <tr v-for="(cart, n) in carts" :key="cart.id">
                        <td>{{ cart.name }}</td>
                        <td>{{ cart.price }}</td>
                        <td><button @click="upQuantity(index, cart.products)">+</button></td>
                        <td>{{ cart.quantity }}</td>
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
    </div>

</template>

<script>
import Button from '../components/Button-Counter';
export default {
    name: 'Restaurant',
    components:{
        Button,
    },
    data(){
      return{
        restaurant: [],
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
      upQuantity(index , prodotto){
            console.log(index);
            console.log(prodotto);
            // se la quantità del prodotto è minore di 20
            if(prodotto[index].quantita < 20){
                // aumenta la quantità del prodotto 
                prodotto[index].quantita++;
            }
            this.prezzo_prodotti = this.calcoloTotale();
            this.sincronizza_carrello();
            
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
          // console.log(res.data[0].plates);
          //this.plates = res.data[0].plates;
          this.restaurant = res.data[0];
          this.restaurant.plates.forEach(element => {
              element['quantity'] = 0;
          });
          //console.log(this.plates);
        })
        .catch((err)=>{
           console.log(err);
        });

      },
      AddToCart: function(plate) {
        if (!plate.quantity) {
          plate.quantity = this.CounterListener();
        };
        if (this.cart.length == 0) {
          this.cart.push(plate);

          // console.log(this.cart);
          // console.log(plate);
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
              console.log(plate)
        }
      },
      SavePlate: function() {
        const parsed = JSON.stringify(this.cart);
        localStorage.setItem('cart', parsed);
      },
      RemoveFromCart(n) {
        this.cart.splice(n, 1);
        this.SavePlate();
      },
      CounterListener: function(count) {
        console.log(count);

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
    padding: 0 50px;
  }

  .main_page {
    padding-bottom: 50px;
  }
</style>