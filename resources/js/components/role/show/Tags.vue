<template>
    <div>
        
    </div>
</template>


<script>
    import moment from 'moment';

    export default {
        name: "Tags",
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

