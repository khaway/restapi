<template>
    <div>
        <div class="flex">
            <div class="w-1/4 bg-gray-100 p-4">
                <p class="font-bold">Support:</p>
                <ul class="pl-4">
                    <li><a href="#" v-on:click="runMigrations">Run Migrations</a></li>
                </ul>
                <p class="font-bold">Orders:</p>
                <ul class="pl-4">
                    <li><router-link :to="{ name: 'create_order' }">Create Order</router-link></li>
                    <li><router-link :to="{ name: 'pay_order' }">Pay Order</router-link></li>
                </ul>
                <p class="font-bold">Products:</p>
                <ul class="pl-4">
                    <li><a href="#" v-on:click="generateProducts">Generate Products</a></li>
                </ul>
            </div>
            <div class="w-3/4 p-4">
                <router-view></router-view>
            </div>
        </div>

        <div class="flex mb-4">
            <div class="w-full p-4">
                <p class="font-bold">Response: </p>
                <pre>{{ response }}</pre>
            </div>
        </div>
    </div>
</template>
<script>
    import { mapFields } from 'vuex-map-fields';

    export default {
        computed: {
            ...mapFields([
                'response',
            ]),
        },
        methods: {
            /**
             * Run migrations request.
             */
            runMigrations() {
                axios.get('/web/run_migrations')
            },

            /**
             *  Generate products request.
             */
            generateProducts() {
                axios.get('/api/generate_products')
            }
        }
    }
</script>
