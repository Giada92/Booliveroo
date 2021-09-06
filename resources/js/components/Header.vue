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
        <!-- <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <span class="navbar-brand" id="boot-logo"></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            </div>
        </nav>   -->
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
    </div>
</template>

<script>
export default {
    name: 'Header',
    beforeMount() {
    window.addEventListener('scroll', function(){
        var nav = this.document.querySelector('nav');
        var logo = this.document.getElementById('logo');
        nav.classList.toggle('sticky', this.window.scrollY > 0)
        logo.classList.toggle('sticky', this.window.scrollY > 0)})
    },
}
</script>

<style lang="scss" scoped>
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
    transition: 0.6s;
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
    background-color: rgba(#f13d49 , 1);
}

#logo.sticky {
    position: fixed;
    top: -0.5%;
    left: 7.5%;
}

</style>