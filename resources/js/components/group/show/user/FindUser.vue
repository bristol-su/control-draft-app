<template>
    <div>
        <b-form-select :options="userOptions" @input="userSelected"></b-form-select>
    </div>
</template>

<script>
    export default {
        name: "FindUser",

        props: {},

        data() {
            return {
                users: []
            }
        },

        created() {
            this.$control.user().all()
                .then(response => this.users = response.data)
                .catch(error => this.$notify.alert('Could not load users'))
        },

        methods: {
            userSelected(userId) {
                let users = this.users.filter(user => user.id === userId)
                if(users.length === 1) {
                    this.$emit('input', users[0]);
                } else {
                    this.$notify.alert('Could not select user');
                }
            }
        },

        computed: {
            userOptions() {
                return this.users.map(user => {
                    return {
                        value: user.id,
                        text: user.data.first_name + ' ' + user.data.last_name
                    };
                })
            }
        }
    }
</script>

<style scoped>

</style>
