<template>
    <div>
        <b-container>
            <b-row>
                <b-col style="text-align: right;">
                    <b-button size="md" variant="info" @click="showAddUser"><i class="fa fa-plus"/> Add User</b-button>
                </b-col>
            </b-row>
        </b-container>

        <b-table :fields="fields" :items="users">

            <template v-slot:cell(full_name)="data">
                {{data.item.data.first_name}} {{data.item.data.last_name}}
            </template>

            <template v-slot:cell(actions)="data">
                <a :href="'/user/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                <b-button size="sm" variant="outline-danger" @click="removeUser(data.item)">Delete</b-button>
            </template>
        </b-table>

        <b-modal id="add-user">
            <user-adder :role="role" @input="addUser"></user-adder>
        </b-modal>
    </div>
</template>

<script>
    import UserAdder from './UserAdder';
    export default {
        name: "Users",
        components: {UserAdder},
        props: {
            role: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                users: [],
                fields: [
                    {key: 'id', label: 'User ID'},
                    {key: 'full_name', label: 'Name'},
                    {key: 'data.preferred_name', label: 'Preferred Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ],
            }
        },

        created() {
            this.$control.role().users(this.role.id)
                .then(response => this.users = response.data)
                .catch(error => this.$notify.alert('Could not load users'));
        },

        methods: {
            removeUser(user) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to remove the user from the role?', {
                    title: 'Please Confirm',
                    size: 'sm',
                    buttonSize: 'sm',
                    okVariant: 'danger',
                    okTitle: 'YES',
                    cancelTitle: 'NO',
                    footerClass: 'p-2',
                    hideHeaderClose: false,
                    centered: true
                })
                    .then(confirmed => {
                        if(confirmed) {
                            this.$control.role().removeUser(this.role.id, user.id)
                                .then(response => {
                                    this.$notify.success('User removed!');
                                    this.users.splice(this.users.indexOf(user), 1);
                                })
                                .catch(error => this.$notify.alert('User could not be removed.'))
                        }
                    });
            },

            showAddUser() {
                this.$bvModal.show('add-user');
            },

            addUser(user) {
                this.$bvModal.hide('add-user');
                this.users.push(user);
            }
        },
    }
</script>

<style scoped>

</style>
