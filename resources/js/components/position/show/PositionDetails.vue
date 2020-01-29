<template>
    <div>
        <data-item title="Id">{{position.id}}</data-item>
        <data-item title="Name">{{position.data.name}}</data-item>
        <data-item title="Description">{{position.data.description}}</data-item>
        <data-item title="Last Updated">{{position.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "Details",
        components: {DataItem},
        props: {
            position: {
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
