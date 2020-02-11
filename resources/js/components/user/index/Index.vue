<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Users</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createUser"><i class="fa fa-plus"/> New User</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="users">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editUser(data.item)">Edit</b-button>
                            <a :href="'/user/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteUser(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-user">
            <edit :user="editingUser" @input="updatedUser"></edit>
        </b-modal>
    </div>
</template>

<script>
    import Edit from './Edit';

    export default {
        name: "Index",

        components: {
            Edit
        },

        data() {
            return {
                users: [],
                editingUser: null,
                fields: [
                    {key: 'id', label: 'User ID'},
                    {key: 'data.preferred_name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.user().all()
                .then(response => this.users = response.data)
                .catch(error => this.$notify.alert('Could not load users'))
        },

        methods: {
            deleteUser(user) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this user?', {
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
                        this.$control.user().delete(user.id)
                            .then(response => {
                                this.$notify.success('User deleted!');
                                this.users.splice(this.users.indexOf(user), 1);
                            })
                            .catch(error => this.$notify.alert('User could not be deleted.'))
                    }
                });
            },
            editUser(user) {
                this.editingUser = user;
                this.$bvModal.show('edit-user');
            },
            createUser() {
                this.editingUser = null;
                this.$bvModal.show('edit-user');
            },

            updatedUser(user) {
                this.users.splice(this.users.indexOf(this.editingUser), 1, user);
                this.$bvModal.hide('edit-user');
                this.editingUser = null;
            }
        }
    }
</script>

<style scoped>

</style>
