<template>
    <div>
        <data-item title="Id">{{role.id}}</data-item>
        <data-item title="Name">{{role.data.position_name}}</data-item>
        <data-item title="Group Email">{{role.data.email}}</data-item>
        <data-item title="Last Updated">{{role.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "Details",
        components: {DataItem},
        props: {
            role: {
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
