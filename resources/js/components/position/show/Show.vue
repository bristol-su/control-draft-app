<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Position Details" active>
                    <position-details :position="position"></position-details>
                </b-tab>
                <b-tab title="Tags"><tags :position="position"></tags></b-tab>
                <b-tab title="Roles"><roles :position="position"></roles></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script>
    import PositionDetails from './PositionDetails';
    import Tags from './Tags';
    import Roles from './Roles';

    export default {
        name: "Show",
        components: {Roles, Tags, PositionDetails},
        props: {
            position: {
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
