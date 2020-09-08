<template>
    <div class="col-md-12">
        <span>Products</span>
<!--        <a href="#"  v-on:click="getProducts">Get</a>-->
        <div class="card-body" id="products-card">
            <div class="panel-body d-flex flex-wrap bd-highlight ">
                <div v-for="product, index in products" class="p-2 bd-highlight border">
                    <div>{{ product.name }}</div>
                    <div>{{ product.description }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['filterProp'],

        data: function () {
            return {
                products: [],
                filters: [],

            }
        },

        // computed: {
        //     filter() {
        //         return this.filterProp;
        //     }
        // },

        watch: {
            filterProp(val) {
                this.getProducts('/api/products', val)
            }
        },

        methods: {
            // getProducts(route) {
            //     axios.get(route)
            //         .then( (resp) => {
            //             this.products = resp.data;
            //         })
            //         .catch(function (resp) {
            //             alert('Error')
            //         });
            // }

            async getProducts(route, param = null) {
                try {
                    const params = {
                        filter: param
                    };

                    const { data } = await axios.get(route, { params });
                    this.products = data
                } catch (e) {
                    console.log(e)
                }

            }
        },

        mounted() {
            this.getProducts('/api/products')
        },
    }
</script>
