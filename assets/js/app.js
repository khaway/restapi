import Vue from 'vue'
import App from './views/App'
import { createRouter } from './router'
import { createStore } from './store'

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our back-end.
 */

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Create store and router instances
 */

const store = createStore();
const router = createRouter();

/**
 * Create the app instance.
 * here we inject the router,
 * making them available everywhere as `this.$router` and `this.$store`.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    mounted() {
        axios.interceptors.response.use(response => {
            this.$store.state.response = response.data;
            return response;
        }, error => {
            this.$store.state.response = error;
            return Promise.reject(error);
        });
    },
    router,
    store
});
