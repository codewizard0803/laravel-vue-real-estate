<template>
    <div class="row">
        <list-new
                :country-options="countryOptions"
                :developer-options="developerOptions"
                :is-on-sale-options="isOnSaleOptions"
                @onSubmit="create"
        />
        <list-filter
                :country-options="countryOptions"
                :is-on-sale-options="isOnSaleOptions"
                @onSubmit="filter"
        />
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
    </div>
</template>

<script>
    import ListNew from  '../components/List/ListNew.vue';
    import ListFilter from '../components/List/ListFilter.vue';
    import ListTable from '../components/List/ListTable.vue';
    import ListItem from '../components/List/ListItem.vue';
    import { fetchLists, fetchCountries, fetchDevelopers, createItem } from '../api';

    export default {
        data() {
            return {
                isLoading: true,
                countryOptions: [],
                isOnSaleOptions: [
                    { value: 1, text: 'Yes' },
                    { value: 0, text: 'No' },
                ],
                developerOptions: [],
                lists: [],
            }
        },
        mounted() {
            this.loadLists({});
            this.loadCountries();
            this.loadDevelopers();
        },
        methods: {
            async loadLists(data) {
                this.isLoading = true;
                try {
                    console.log(data);
                    this.lists = await fetchLists(data);
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                }
            },
            async loadCountries() {
                try {
                    this.countryOptions = await fetchCountries();
                } catch (error) {
                }
            },
            async loadDevelopers() {
                try {
                    this.developerOptions = await fetchDevelopers();
                } catch (error) {
                }
            },
            filter(data) {
                this.loadLists(data);
            },
            async create(data) {
                try {
                    await createItem(data);
                    await this.loadLists({});
                } catch (error) {
                }
            }
        },
        components: {
            ListItem,
            ListNew,
            ListFilter,
            ListTable
        }
    }
</script>