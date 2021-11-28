window.Vue = require('vue');
window.axios = require('axios');

import App from './components/App.vue';

const app = new Vue({
    el: '#root',
    render: h=>h(App)
});