<template>
    <Panel>
        <template slot="header">
            <h3>Filter component</h3>
        </template>
        <template slot="body">
            <form @submit.prevent="onSubmit">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" v-model="country">
                        <option value="" selected> </option>
                        <option
                            v-for="countryOption in countryOptions"
                            :value="countryOption.country"
                        >
                            {{ countryOption.country }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price"
                            placeholder="Price less than"
                            v-model="price"
                    >
                </div>
                <div class="form-group">
                    <label for="isOnSale">Is on sale</label>
                    <select
                            class="form-control"
                            id="isOnSale"
                            v-model="isOnSale"
                    >
                        <option value="">All</option>
                        <option
                                v-for="option in isOnSaleOptions"
                                :value="option.value"
                        >
                            {{ option.text }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </template>
    </Panel>
</template>

<script>
    import Panel from  '../Panel.vue';

    export default {
        props: {
            countryOptions: {
                type: Array,
                required: true,
            },
            isOnSaleOptions: {
                type: Array,
                required: true,
            },
        },
        data() {
            return {
                country: '',
                price: '',
                isOnSale: '',
            };
        },
        computed: {
            allData() {
                return {
                    country: this.country,
                    priceLessThan: this.price,
                    isOnSale: this.isOnSale,
                }
            }
        },
        methods: {
            onSubmit() {
                this.$emit('onSubmit', this.allData);
            },
        },
        components: {
            Panel,
        }
    }
</script>