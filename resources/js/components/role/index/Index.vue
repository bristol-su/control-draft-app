<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Roles</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createRole"><i class="fa fa-plus"/> New Role</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="roles">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editRole(data.item)">Edit</b-button>
                            <a :href="'/role/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteRole(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-role">
            <edit :role="editingRole" @input="updatedRole"></edit>
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
                roles: [],
                editingRole: null,
                fields: [
                    {key: 'id', label: 'Role ID'},
                    {key: 'data.role_name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.role().all()
                .then(response => this.roles = response.data)
                .catch(error => this.$notify.alert('Could not load roles'));
        },

        methods: {
            deleteRole(role) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this role?', {
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
                        this.$control.role().delete(role.id)
                            .then(response => {
                                this.$notify.success('Role deleted!');
                                this.roles.splice(this.roles.indexOf(role), 1);
                            })
                            .catch(error => this.$notify.alert('Role could not be deleted.'))
                    }
                });
            },
            editRole(role) {
                this.editingRole = role;
                this.$bvModal.show('edit-role');
            },
            createRole() {
                this.editingRole = null;
                this.$bvModal.show('edit-role');
            },

            updatedRole(role) {
                this.roles.splice(this.roles.indexOf(this.editingRole), 1, role);
                this.$bvModal.hide('edit-role');
                this.editingRole = null;
            }
        }
    }
</script>

<style scoped>

</style>
