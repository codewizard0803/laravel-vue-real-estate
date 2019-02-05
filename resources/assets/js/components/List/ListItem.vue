<template>
    <tr>
        <th scope="row">{{ id }}</th>
        <td>{{ name }}</td>
        <td>{{ country }}</td>
        <td>{{ price }}</td>
        <td>{{ onSale }}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            id: {
                type: Number,
                required: true,
            },
            name: {
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
    };
</script>