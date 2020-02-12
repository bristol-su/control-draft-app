<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Tag Details" active>
                    <tag-details :tag="tag"></tag-details>
                </b-tab>
                <b-tab title="Roles"><roles :tag="tag"></roles></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    import TagDetails from './TagDetails';
    import Roles from './role/Roles';

    export default {
        name: "Show",
        components: {TagDetails, Roles},
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
