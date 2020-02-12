<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Tag Details" active>
                    <tag-details :tag="tag"></tag-details>
                </b-tab>
                <b-tab title="Users"><users :tag="tag"></users></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    import TagDetails from './TagDetails';
    import Users from './user/Users';

    export default {
        name: "Show",
        components: {TagDetails, Users},
        props: {
            tag: {
                required: true,
                type: Object
            }
        },

        data() {
            return {}
        },

        methods: {},

        computed: {}
    }
</script>

<style scoped>

</style>
