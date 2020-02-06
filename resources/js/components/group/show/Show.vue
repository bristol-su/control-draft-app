<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Group Details" active>
                    <group-details :group="group"></group-details>
                </b-tab>
                <b-tab title="Members">
                    <users :group="group"></users>
                </b-tab>
                <b-tab title="Tags"><tags :group="group"></tags></b-tab>
                <b-tab title="Roles"><roles :group="group"></roles></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script>
    import GroupDetails from './GroupDetails';
    import Users from './user/Users';
    import Tags from './tag/Tags';
    import Roles from './Roles';

    export default {
        name: "Show",
        components: {Roles, Tags, Users, GroupDetails},
        props: {
            group: {
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
