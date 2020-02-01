<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Role Details" active>
                    <role-details :role="role"></role-details>
                </b-tab>
                <b-tab title="Tags"><tags :role="role"></tags></b-tab>
                <b-tab title="Users"><users :role="role"></users></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    import RoleDetails from './RoleDetails';
    import Tags from './Tags';
    /*import Roles from './Roles';*/

    export default {
        name: "Show",
        components: {RoleDetails, Tags},
        props: {
            role: {
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
