<template>
    <div class="row">
        <list-new />
        <list-filter />
        <list-table
            :is-loading="isLoading"
            :lists="lists"
        >
            <list-item
                slot-scope="{ item }"
                :id="item.id"
                :name="item.name"
                :country="item.city.country"
                :price="item.price"
                :is-on-sale="Boolean(item.isOnSale)"
            />
        </list-table>
        <!--<p>-->
        <!--<router-link :to="{ name: 'home' }">Home</router-link> |-->
        <!--<router-link :to="{ name: 'hello' }">Hello World</router-link>-->
        <!--</p>-->
    </div>
</template>

<script>
    import ListNew from  '../components/List/ListNew.vue';
    import ListFilter from '../components/List/ListFilter.vue';
    import ListTable from '../components/List/ListTable.vue';
    import ListItem from '../components/List/ListItem.vue';
    import { fetchLists } from '../api';

    export default {
        data() {
            return {
                isLoading: true,
                country: '',
                isOnSale: '',
                priceLessThan: '',
                lists: [],
            }
        },
        mounted() {
            this.loadLists();
        },
        methods: {
            async loadLists() {
                this.isLoading = true;
                try {
                    this.lists = await fetchLists({
                        country: this.country,
                        isOnSale: this.isOnSale,
                        priceLessThan: this.priceLessThan,
                    });
                    console.log(this.lists);
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },
        },
        components: {
            ListItem,
            ListNew,
            ListFilter,
            ListTable
        }
    }
</script>