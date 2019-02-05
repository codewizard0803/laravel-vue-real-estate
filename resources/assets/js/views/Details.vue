<template>
    <div class="row">
        <template v-if="isLoading">
            loading...
        </template>
        <template v-else>
            <list-details
                :name="item.name"
                :address="item.city.name"
                :country="item.city.country"
                :price="item.price"
                :is-on-sale="Boolean(item.isOnSale)"
            />
        </template>
    </div>
</template>

<script>
    import { fetchListItem } from '../api';
    import ListDetails from "../components/List/ListDetails";

    export default {
        props: {
            id: {
                type: [Number, String],
                required: true,
            },
        },
        data() {
            return {
                isLoading: true,
                item: {},
            }
        },
        mounted() {
            this.load(this.id);
        },
        methods: {
            async load(id) {
                this.isLoading = true;
                try {
                    this.item = await fetchListItem(id);
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },
        },
        components: {
            ListDetails,
        }
    }
</script>