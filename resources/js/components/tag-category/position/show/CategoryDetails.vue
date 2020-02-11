<template>
    <div>
        <data-item title="Id">{{category.id}}</data-item>
        <data-item title="Name">{{category.name}}</data-item>
        <data-item title="Description">{{category.description}}</data-item>
        <data-item title="Reference">{{category.reference}}</data-item>
        <data-item title="Last Updated">{{category.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "CategoryDetails",
        components: {DataItem},
        props: {
            category: {
                required: true,
                type: Object
            }
        },

        data() {
            return {}
        },

        filters: {
            dateTime(val) {
                return moment(val).format('D-MM-Y H:mm');
            }
        },

        methods: {},

        computed: {}
    }
</script>

<style scoped>

</style>
