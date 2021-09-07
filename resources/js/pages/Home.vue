<template>
  <div>
    <div class="jumbotron">
      <div id="scroll">
        <h4>SCROLL DOWN</h4>
        <i class="fas fa-chevron-down"></i>
      </div>
      <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search...">
		    <a href=""><i class="fas fa-search"></i></a>
      </div>
    </div>
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
    beforeMount() {
    window.addEventListener('scroll', function(){
        var scroll = this.document.getElementById('scroll');
        scroll.classList.toggle('sticky', this.window.scrollY > 0)})
    },
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

.jumbotron {
  padding: 0;
  position: relative;
  width: 100%;
  height: 100vh;
  background: url('~/img/jumbotron-gradientred.jpg') no-repeat;
  display: flex;
  flex-direction: column-reverse;
  align-items: center;
}

#scroll {
  // position: absolute;
  // bottom: 0%;
  // left: 50%;
  // transform: translateX(-50%);
  margin-top: 380px;
  opacity: 1;
  transition: 0.8s;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: white;
  i {
    font-size: 60px;
  }
}

#scroll.sticky {
  opacity: 0;
}

.search-bar {
  position: relative;
  background:white;
	padding: 1rem;
	box-shadow: 0 0 30px 2px linear-gradient(90deg, #ee3c4a, #fc8237); 
	border-radius: 50px;
	width: 35%;
  i {
    position: absolute;
    top: 50%;
    right: 3%;
    transform: translateY(-50%);
    color : #fc8237;
    font-size: 25px;
  }
}
.search-input {
  width: 90%;
  border: none;
  font-size: 18px;
}
.search-input:focus {
  border: none;
  outline: none;
}

</style>