<template>
    <div>
        <b-tabs content-class="mt-3" v-if="user === null">
            <b-tab title="Find a User" active>
                <find-user @input="user = $event"></find-user>
            </b-tab>
            <b-tab title="Create a User">
                <create-user @input="user = $event"></create-user>
            </b-tab>

        </b-tabs>
        <div v-else>
            Click the button below to add {{user.data.first_name}} {{user.data.last_name}} to the role {{role.data.name}}.
            <b-button variant="secondary" @click="addToRole(user)">Add to role!</b-button>
        </div>

    </div>
</template>

<script>
    import FindUser from './FindUser';
    import CreateUser from './CreateUser';
    export default {
        name: "UserAdder",
        components: {CreateUser, FindUser},
        props: {
            role: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                user: null,
            }
        },

        methods: {
            addToRole(user) {
                this.$control.role().addUser(this.role.id, user.id)
                    .then(response => this.$emit('input', user))
                    .catch(error => this.$notify.alert('Could not add the user to the role ' + error.message));
            }
        }
    }
</script>

<style scoped>

</style>
