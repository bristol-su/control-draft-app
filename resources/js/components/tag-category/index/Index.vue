<template>
    <b-container>
        <b-row>
            <b-col cols="2"></b-col>
            <b-col cols="8"><h2 style="text-align: center">Tag Categories</h2></b-col>
            <b-col cols="2"><b-button size="md" variant="info" @click="createCategory"><i class="fa fa-plus"/> New Category</b-button></b-col>
        </b-row>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Group" active>
                    <group-categories></group-categories>
                </b-tab>
                <b-tab title="User">
                    <user-categories></user-categories>
                </b-tab>
                <b-tab title="Position">
                    <position-categories></position-categories>
                </b-tab>
                <b-tab title="Role">
                    <role-categories></role-categories>
                </b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script>
    import GroupCategories from './GroupCategories';
    /*import Users from './user/Users';
    import Tags from './tag/Tags';
    import Roles from './Roles';*/

    export default {
        name: "Show",
        components: {GroupCategories},

        data() {
            return {}
        },

        methods: {},

        computed: {}
    }
</script>

<style scoped>

</style>
