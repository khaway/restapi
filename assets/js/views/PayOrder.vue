<template>
    <div>
        <div class="flex">
            <div class="w-1/2 pr-4">
                <label class="block" for="order_id">Order id:</label>
                <select class="block mt-4" id="order_id" v-model="order_id" name="order_id">
                    <option v-for="order in orders" :value="order.id">{{ order.name }} ({{ order.amount }}$ / {{ order.status }})</option>
                </select>
                <label class="block pt-4" for="amount">Amount:</label>
                <input id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 mt-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" v-model="amount" placeholder="Amount">
            </div>
            <div class="w-1/2 pl-4">
                <button class="bg-gray-500 hover:bg-gray-700 text-black font-bold py-2 px-4 rounded"
                        href="#" v-on:click="payOrder">Pay order</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getOrders()
        },
        data() {
            return {
                amount: 0,
                orders: null,
                order_id: null
            }
        },
        methods: {
            /**
             * Initialize orders.
             */
            getOrders() {
                axios.get('/api/orders')
                    .then(response => (this.orders = response.data.data))
            },

            /**
             * Pay for the order using givend order id and amount.
             */
            payOrder() {
                axios.post('/api/orders/payment', {
                    order_id: this.order_id,
                    amount: this.amount
                })
            }
        }
    }
</script>
