<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Tag Details" active>
                    <tag-details :tag="tag"></tag-details>
                </b-tab>
                <b-tab title="Groups"><groups :tag="tag"></groups></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    import TagDetails from './TagDetails';
    import Groups from './group/Groups';

    export default {
        name: "Show",
        components: {TagDetails, Groups},
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
