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
            Click the button below to add {{tag.name}} to the group {{group.data.name}}.
            <b-button variant="secondary" @click="addToGroup(tag)">Add to group!</b-button>
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
            group: {
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
            addToGroup(tag) {
                this.$control.group().tag(this.group.id, tag.id)
                    .then(response => this.$emit('input', tag))
                    .catch(error => this.$notify.alert('Could not add the tag to the group ' + error.message));
            }
        }
    }
</script>

<style scoped>

</style>
