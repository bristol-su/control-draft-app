<template>
    <div>
        <b-tabs content-class="mt-3" v-if="group === null">
            <b-tab title="Find a Group" active>
                <find-group @input="group = $event"></find-group>
            </b-tab>
            <b-tab title="Create a Group">
                <create-group @input="group = $event"></create-group>
            </b-tab>

        </b-tabs>
        <div v-else>
            Click the button below to add {{group.data.name}} to the user {{user.data.preferred_name}}.
            <b-button variant="secondary" @click="addToUser(group)">Add to user!</b-button>
        </div>

    </div>
</template>

<script>
    import FindGroup from './FindGroup';
    import CreateGroup from './CreateGroup';
    export default {
        name: "GroupAdder",
        components: {CreateGroup, FindGroup},
        props: {
            user: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                group: null,
            }
        },

        methods: {
            addToUser(group) {
                this.$control.user().addGroup(this.user.id, group.id)
                    .then(response => this.$emit('input', group))
                    .catch(error => this.$notify.alert('Could not add the group to the user ' + error.message));
            }
        }
    }
</script>

<style scoped>

</style>
