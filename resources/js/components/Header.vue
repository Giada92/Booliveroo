<template>
    <div>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top pl-5">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000/login">Ristoratori</a>
                    </li>
                </ul>
            </div>
        </nav> -->
        <!-- <header>
            <a href="#" class="logo">LOGO</a>
            <ul>
                <li>
                    <router-link :to="{ name: 'home'}">Home</router-link>
                </li>
                <li>
                    <a href="http://127.0.0.1:8000/login">Ristoratori</a>
                </li>
                <li>
                    <a href="#">Contatti</a>
                </li>
                <li>
                    <a href="#">Chi siano</a>
                </li>
                <li>
                    <a href="#">Contattaci</a>
                </li>
            </ul>
        </header> -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <span class="navbar-brand" id="boot-logo" ></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li>
                        <router-link :to="{ name: 'home'}">Home</router-link>
                    </li>
                    <li>
                        <a href="http://127.0.0.1:8000/login">Ristoratori</a>
                    </li>
                    <li>
                        <a href="#">Contatti</a>
                    </li>
                    <li>
                        <a href="#">Chi siano</a>
                    </li>
                    <li>
                        <a href="#">Contattaci</a>
                    </li>
                </ul>
            </div>
        </nav>
        <section id="logo" class="pt-3">
            LOGO
        </section>
        <section id='research'>
            <input type="text" class="search-input" placeholder="Search...">
		    <a href=""><i class="fas fa-search"></i></a>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Header',
    beforeMount() {
    window.addEventListener('scroll', function(){
        var nav = this.document.querySelector('nav');
        var logo = this.document.getElementById('logo');
        var research = this.document.getElementById('research');
        nav.classList.toggle('sticky', this.window.scrollY > 0)
        research.classList.toggle('sticky', this.window.scrollY > 430)
        logo.classList.toggle('sticky', this.window.scrollY > 0)})
    },
    methods: {
        getYPosition: function(){
        var top  = window.pageYOffset || document.documentElement.scrollTop
        console.log(top);
        return top;
        }
    }
}
</script>

<style lang="scss" scoped>

#research {
  position: fixed;
  background:white;
  opacity: 0;
  transition: 0.2s;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
	padding: 0.5rem;
	box-shadow: 0 0 30px 2px linear-gradient(90deg, #ee3c4a, #fc8237); 
	border-radius: 50px;
	width: 35%;
    z-index: 11;
  i {
    position: absolute;
    top: 50%;
    right: 3%;
    transform: translateY(-50%);
    color : #fc8237;
    font-size: 25px;
  }
}
#research.sticky {
    opacity: 1;
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

#boot-logo {
    opacity: 0;
}
#logo {
    color: white;
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 11;
    font-weight: 700;
    color: white;
    text-decoration: none;
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
    transition: 2s;
}
nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 65px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.8s;
    padding: 40px 100px;
    opacity: 0;
    z-index: 10;

    .logo {
        position: relative;
        font-weight: 700;
        color: white;
        text-decoration: none;
        font-size: 2em;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.6s;
        opacity: 0;
    }
}

nav ul {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;

    li {
        position: relative;
        list-style: none;

        a{
            position: relative;
            margin: 0 15px;
            text-decoration: none;
            color: white;
            letter-spacing: 2px;
            font-weight: 500px;
            transition: 0.6s;
        }
    }
}

nav.sticky {
    opacity: 1;
    padding: 10px 100px;
    background-image: linear-gradient(90deg, #ee3c4a, #fc8237);
}

#logo.sticky {
    position: fixed;
    top: -0.5%;
    left: 7.5%;
}

</style>