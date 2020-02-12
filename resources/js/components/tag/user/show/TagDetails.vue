<template>
    <div>
        <data-item title="Id">{{tag.id}}</data-item>
        <data-item title="Name">{{tag.name}}</data-item>
        <data-item title="Description">{{tag.description}}</data-item>
        <data-item title="Reference">{{tag.reference}}</data-item>
        <data-item title="Last Updated">{{tag.updated_at | dateTime}}</data-item>
    </div>
</template>

<script>
    import DataItem from '../../../utilities/DataItem';
    import moment from 'moment';

    export default {
        name: "TagDetails",
        components: {DataItem},
        props: {
            tag: {
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
