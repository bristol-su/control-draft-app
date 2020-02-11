<template>
    <b-container>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Category Details" active>
                    <category-details :category="category"></category-details>
                </b-tab>
                <b-tab title="Tags"><tags :category="category"></tags></b-tab>
            </b-tabs>
        </b-card>
    </b-container>
</template>

<script> 
    import CategoryDetails from './CategoryDetails';
    import Tags from './tag/Tags';

    export default {
        name: "Show",
        components: {CategoryDetails, Tags},
        props: {
            category: {
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
