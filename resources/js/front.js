window.Vue = require('vue');

//importo axios globalmente
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './App.vue';
import router from './router';
import vuebraintree from 'vue-braintree';

Vue.use(vuebraintree);

Vue.config.productionTip = false;

const app = new Vue(
    {
        el: '#root',
        render: h => h(App),
        router,
        vuebraintree
    }
);
