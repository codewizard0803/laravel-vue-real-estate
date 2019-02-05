<template>
    <Panel>
        <template slot="header">
            <h3>Estate list</h3>
        </template>
        <template slot="body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Country</th>
                    <th scope="col">Price</th>
                    <th scope="col">OnSale</th>
                </tr>
                </thead>
                <tbody>
                <template v-if="isLoading">
                    <tr>
                        <th scope="row" rowspan="5">Loading...</th>
                    </tr>
                </template>
                <template v-else>
                    <slot
                        :item="item"
                        v-for="item in lists"
                   />
                        <!--<router-link :to="{ name: 'episode', params: { id: episode.id } }">-->
                        <!--</router-link>-->
                </template>
                </tbody>
            </table>
        </template>
    </Panel>
</template>

<script>
    import Panel from  '../Panel.vue';

    export default {
        props: {
            lists: {
                type: Array,
                default: [],
            },
            isLoading: {
                type: Boolean,
            },
        },
        components: {
            Panel,
        }
    }
</script>