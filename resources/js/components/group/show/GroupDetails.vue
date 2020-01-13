<template>
    <div>
        <data-item title="Id">{{group.id}}</data-item>
        <data-item title="Name">{{group.data.name}}</data-item>
        <data-item title="Email">{{group.data.email}}</data-item>
        <data-item title="Last Updated">{{group.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "Details",
        components: {DataItem},
        props: {
            group: {
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
