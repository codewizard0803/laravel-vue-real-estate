<template>
    <div class="row">
        <list-new />
        <list-filter />
        <list-table />
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

    export default {
        data() {
            return {

            }
        },
        components: {
            ListNew,
            ListFilter,
            ListTable
        }
    }
</script>