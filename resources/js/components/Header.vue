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
        <header>
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
        </header>
    </div>
</template>

<script>
export default {
    name: 'Header',
    beforeMount() {
    window.addEventListener('scroll', function(){
        var header = this.document.querySelector('header');
        header.classList.toggle('sticky', this.window.scrollY > 0)})
    },
}
</script>

<style lang="scss" scoped>

header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.6s;
    padding: 40px 100px;
    z-index: 10000;

    .logo {
        position: relative;
        font-weight: 700;
        color: green;
        text-decoration: none;
        font-size: 2em;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.6s;
    }
}

header ul {
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
            color: green;
            letter-spacing: 2px;
            font-weight: 500px;
            transition: 0.6s;
        }
    }
}

header.sticky {
    padding: 10px 100px;
    background-color: white;
}

</style>