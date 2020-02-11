<template>
    <div>
        <data-item title="Id">{{user.id}}</data-item>
        <data-item title="Preferred Name">{{user.data.preferred_name}}</data-item>
        <data-item title="Name">{{user.data.first_name}} {{user.data.last_name}}</data-item>
        <data-item title="Email">{{user.data.email}}</data-item>
        <data-item title="Date of Birth">{{user.data.dob}}</data-item>
        <data-item title="Date Created">{{user.created_at | dateTime}}</data-item>
        <data-item title="Last Updated">{{user.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "Details",
        components: {DataItem},
        props: {
            user: {
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
