<template>
    <Panel>
        <template slot="header">
            <router-link :to="{ name: 'home' }">Back</router-link>
            <h3>Item</h3>
        </template>
        <template slot="body">
            <div>
                <label>Name:</label> {{ name }}
            </div>
            <div>
                <label>Address:</label> {{ address }}
            </div>
            <div>
                <label>Country:</label> {{ country }}
            </div>
            <div>
                <label>Price:</label> {{ price }}
            </div>
            <div>
                <label>On sale:</label> {{ onSale}}
            </div>
        </template>
    </Panel>
</template>

<script>
    import Panel from '../Panel.vue';

    export default {
        props: {
            name: {
                type: String,
                required: true,
            },
            address: {
                type: String,
                required: true,
            },
            country: {
                type: String,
                required: true,
            },
            price: {
                type: Number,
                required: true,
            },
            isOnSale: {
                type: Boolean,
                required: true,
            },
        },
        computed: {
            onSale() {
                return this.isOnSale ? 'Yes' : 'No';
            },
        },
        components: {
            Panel
        }
    };
</script>