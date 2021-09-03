<template>
    <div class="col-4 my-4 d-flex">
        <router-link :to="{ name: 'restaurant', params: { slug: item.slug } }">
            <div class="card w-100">
                <img :src="item.cover" alt="item.name" class="img">
                <div class="container_name">
                    <h4 class="card-title">{{ item.name }}</h4>
                </div>
                    <div class="card-body">
                        <!-- <h4 class="card-title">{{ item.name }}</h4> -->
                        <!-- <p>{{ item.description }}</p> -->
                        <!-- <a href="" class="card-link">Leggi</a> -->

                        <!-- <router-link :to="{ name: 'single-post', params: { slug: item.slug } }">Leggi</router-link> -->
                    </div>
            </div>
        </router-link>
        </div>
</template>

<script>
export default {
    name: 'Card',
    props: {'item' : Object}
}
</script>

<style lang="scss" scoped>

.card{
    .img {
        height: 200px;
        transition: all 0.8s ease-in-out;
    }
}

.card {
    position: relative;
    height: 80%;
    border-radius: 5%;
    overflow: hidden;
    &:hover{
        cursor: pointer;
        .img {
            transform: scale(1.1);
        }
    }

    .container_name {
        background-color: rgba(0, 0, 0, 0.3);
        /* width: 100%;
        height: 100%; */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        h4 {
            /* opacity: 15%; */
            color: white;
            font-weight: 900;
            font-size: 22px;
            line-height: 22px;
            margin: 0;
            padding: 5px;
        }
    }
}




</style>