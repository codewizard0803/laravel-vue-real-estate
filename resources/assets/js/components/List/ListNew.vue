<template>
    <Panel>
        <template slot="header">
            <h3>Add item</h3>
        </template>
        <template slot="body">
            <form @submit.prevent="onSubmit">
                <div class="form-group">
                    <label for="country">Country</label>
                    <select
                            class="form-control"
                            id="country"
                            required
                            v-model="cityId"
                    >
                        <option value="" disabled selected> </option>
                        <option
                                v-for="countryOption in countryOptions"
                                :value="countryOption.id"
                        >
                            {{ countryOption.country }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="developer">Developer</label>
                    <select
                            class="form-control"
                            id="developer"
                            required
                            v-model="developerId"
                    >
                        <option value="" disabled selected> </option>
                        <option
                                v-for="developerOption in developerOptions"
                                :value="developerOption.id"
                        >
                            {{ developerOption.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="Property name"
                            required
                            v-model="name"
                    >
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input
                            type="number"
                            class="form-control"
                            id="price"
                            placeholder="Property price"
                            required
                            v-model="price"
                    >
                </div>
                <div class="form-group">
                    <label for="isOnSale">Is on sale</label>
                    <select
                            class="form-control"
                            id="isOnSale"
                            required
                            v-model="isOnSale"
                    >
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
            developerOptions: {
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
                cityId: '',
                developerId: '',
                name: '',
                price: '',
                isOnSale: '',
            };
        },
        computed: {
              allData() {
                  return {
                      cityId: this.cityId,
                      developerId: this.developerId,
                      name: this.name,
                      price: this.price,
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