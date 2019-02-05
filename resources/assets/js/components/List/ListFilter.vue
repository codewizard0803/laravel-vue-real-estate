<template>
    <Panel>
        <template slot="header">
            <h3>Filter component</h3>
        </template>
        <template slot="body">
            <form @submit.prevent="$emit('onSubmit')">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country"  @change="$emit('changeCountry', $event.target.value)">
                        <option value="" disabled selected> </option>
                        <option
                            v-for="countryOption in countryOptions"
                            v-bind:value="countryOption"
                        >
                            {{ countryOption }}
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
                            @change="$emit('changePrice', $event.target.value)"
                    >
                </div>
                <div class="form-group">
                    <label for="isOnSale">Is on sale</label>
                    <select
                            class="form-control"
                            id="isOnSale"
                            @change="$emit('changeIsOnSale', $event.target.value)"
                    >
                        <option
                                v-for="option in isOnSaleOptions"
                                v-bind:value="option.value"
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
        components: {
            Panel,
        }
    }
</script>