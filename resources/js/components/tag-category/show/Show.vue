<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Details" active>
                    <tag-category-details :tagCategory="tagCategory"></tag-category-details>
                </b-tab>
                <b-tab title="Tags">
                    <tag-category-tags :tagCategory="tagCategory"></tag-category-tags>
                </b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    /*import RoleDetails from './RoleDetails';
    import Tags from './Tags';
    import Roles from './Roles';*/

    export default {
        name: "Show",
        //components: {RoleDetails, Tags},
        props: {
            tagCategory: {
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
