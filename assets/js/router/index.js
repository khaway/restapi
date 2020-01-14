import Vue from 'vue'
import Router from 'vue-router'
import Home from '../views/Home'
import CreateOrder from '../views/CreateOrder'
import PayOrder from '../views/PayOrder'

Vue.use(Router)

/**
 * Export create router function.
 *
 * @returns {VueRouter}
 */
export function createRouter () {
    return new Router({
        mode: 'history',
        routes: [
            {
                path: '/',
                name: 'home',
                component: Home
            },
            {
                path: '/create_order',
                name: 'create_order',
                component: CreateOrder
            },
            {
                path: '/pay_order',
                name: 'pay_order',
                component: PayOrder
            }
        ],
    });
}
