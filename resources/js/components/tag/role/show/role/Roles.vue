<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"><b-button size="md" variant="info" @click="addRole"><i class="fa fa-plus"/> Add Role</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="roles">
                        <template v-slot:cell(actions)="data">
                            <a :href="'/role/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="untagRole(data.item)">Untag</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="add-role">
            <add-role :tag="tag" @input="addedRole"></add-role>
        </b-modal>
    </div>
</template>

<script>
    import AddRole from './AddRole';

    export default {
        name: "Index",

        components: {
            AddRole
        },

        props: {
            tag: {
                required: true,
                type: Object
            }
        },

        data() {
            return {
                roles: [],
                fields: [
                    {key: 'id', label: 'Role ID'},
                    {key: 'data.role_name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.roleTag().roles(this.tag.id)
                .then(response => this.roles = response.data)
                .catch(error => this.$notify.alert('Could not load roles'))
        },

        methods: {
            untagRole(role) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to untag this role?', {
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
                        this.$control.roleTag().untagRole(this.tag.id, role.id)
                            .then(response => {
                                this.$notify.success('Tag removed!');
                                this.roles.splice(this.roles.indexOf(role), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be removed.'))
                    }
                });
            },
            addRole() {
                this.$bvModal.show('add-role');
            },
            addedRole(role) {
                this.$notify.success('Role added!');
                this.$bvModal.hide('add-role');
                this.roles.push(role);
            }
        }
    }
</script>

<style scoped>

</style>
