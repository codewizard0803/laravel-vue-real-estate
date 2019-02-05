<template>
    <div class="row">
        <list-new />
        <list-filter
                :country-options="countryOptions"
                @changeCountry="changeCountry"
                @changePrice="changePrice"
                :is-on-sale-options="isOnSaleOptions"
                @changeIsOnSale="changeIsOnSale"
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
    import { fetchLists, fetchCountries } from '../api';

    export default {
        data() {
            return {
                isLoading: true,
                country: '',
                countryOptions: [],
                price: '',
                isOnSale: '',
                isOnSaleOptions: [
                    { value: '', text: 'All' },
                    { value: 1, text: 'Yes' },
                    { value: 0, text: 'No' },
                ],
                lists: [],
            }
        },
        mounted() {
            this.loadLists();
            this.loadCountries();
        },
        methods: {
            async loadLists() {
                this.isLoading = true;
                try {
                    this.lists = await fetchLists({
                        country: this.country,
                        isOnSale: this.isOnSale,
                        priceLessThan: this.price,
                    });
                    console.log(this.lists);
                    this.isLoading = false;
                } catch (error) {
                    this.isLoading = false;
                    console.log(error);
                }
            },
            async loadCountries() {
                try {
                    this.countryOptions = await fetchCountries();
                } catch (error) {
                }
            },
            changeCountry(country) {
                this.country = country;
            },
            changePrice(price) {
                this.price = price;
            },
            changeIsOnSale(isOnSale) {
                this.isOnSale = isOnSale;
            },
            filter() {
                this.loadLists();
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