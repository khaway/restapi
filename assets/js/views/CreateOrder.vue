<template>
    <div>
        <div class="flex">
            <div class="w-1/2">
                <div v-for="product in products">
                    <input :id="product.id" type="checkbox" v-model="product_ids" :value="product.id"/>
                    <label :for="product.id">{{ product.name }} / {{ product.price }}$</label>
                </div>
            </div>
            <div class="w-1/2">
                <button class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                        href="#" v-on:click="createOrder">Create order</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getProducts()
        },
        data() {
            return {
                product_ids: [],
                products: null
            }
        },
        methods: {
            /**
             * Initialize products.
             */
            getProducts() {
                axios.get('/api/products')
                    .then(response => (this.products = response.data.data))
            },

            /**
             * Create a new order using product ids.
             */
            createOrder() {
                axios.post('/api/orders', {
                    product_ids: this.product_ids
                })
            }
        }
    }
</script>
