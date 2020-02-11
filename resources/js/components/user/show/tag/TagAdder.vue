<template>
    <div>
        <b-tabs content-class="mt-3" v-if="tag === null">
            <b-tab title="Find a Tag" active>
                <find-tag @input="tag = $event"></find-tag>
            </b-tab>
            <b-tab title="Create a Tag">
                <create-tag @input="tag = $event"></create-tag>
            </b-tab>

        </b-tabs>
        <div v-else>
            Click the button below to add {{tag.name}} to the user {{user.data.preferred_name}}.
            <b-button variant="secondary" @click="addToUser(tag)">Add to user!</b-button>
        </div>

    </div>
</template>

<script>
    import FindTag from './FindTag';
    import CreateTag from './CreateTag';
    export default {
        name: "TagAdder",
        components: {CreateTag, FindTag},
        props: {
            user: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                tag: null,
            }
        },

        methods: {
            addToUser(tag) {
                this.$control.user().tag(this.user.id, tag.id)
                    .then(response => this.$emit('input', tag))
                    .catch(error => this.$notify.alert('Could not add the tag to the user ' + error.message));
            }
        }
    }
</script>

<style scoped>

</style>
