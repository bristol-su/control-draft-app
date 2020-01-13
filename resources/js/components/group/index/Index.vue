<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Groups</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createGroup"><i class="fa fa-plus"/> New Group</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="groups">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editGroup(data.item)">Edit</b-button>
                            <a :href="'/group/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteGroup(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-group">
            <edit :group="editingGroup" @input="updatedGroup"></edit>
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
                groups: [],
                editingGroup: null,
                fields: [
                    {key: 'id', label: 'Group ID'},
                    {key: 'data.name', label: 'Name'},
                    {key: 'data.email', label: 'Email'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.group().all()
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'))
        },

        methods: {
            deleteGroup(group) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this group?', {
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
                        this.$control.group().delete(group.id)
                            .then(response => {
                                this.$notify.success('Group deleted!');
                                this.groups.splice(this.groups.indexOf(group), 1);
                            })
                            .catch(error => this.$notify.alert('Group could not be deleted.'))
                    }
                });
            },
            editGroup(group) {
                this.editingGroup = group;
                this.$bvModal.show('edit-group');
            },
            createGroup() {
                this.editingGroup = null;
                this.$bvModal.show('edit-group');
            },

            updatedGroup(group) {
                this.groups.splice(this.groups.indexOf(this.editingGroup), 1, group);
                this.$bvModal.hide('edit-group');
                this.editingGroup = null;
            }
        }
    }
</script>

<style scoped>

</style>
