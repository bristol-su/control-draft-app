<template>
    <div>
        <b-container>
            <b-row>
                <b-col cols="2"></b-col>
                <b-col cols="8"><h2 style="text-align: center">Role Tags</h2></b-col>
                <b-col cols="2"><b-button size="md" variant="info" @click="createRoleTag"><i class="fa fa-plus"/> New Tag</b-button></b-col>
            </b-row>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="roleTags">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editRoleTag(data.item)">Edit</b-button>
                            <a :href="'/role-tag/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteRoleTag(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-role-tag">
            <edit :roleTag="editingRoleTag" @input="updatedRoleTag"></edit>
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
                roleTags: [],
                editingRoleTag: null,
                fields: [
                    {key: 'id', label: 'Tag ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.roleTag().all()
                .then(response => this.roleTags = response.data)
                .catch(error => this.$notify.alert('Could not load tags'))
        },

        methods: {
            deleteRoleTag(roleTag) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this tag?', {
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
                        this.$control.roleTag().delete(roleTag.id)
                            .then(response => {
                                this.$notify.success('Tag deleted!');
                                this.roleTags.splice(this.roleTags.indexOf(roleTag), 1);
                            })
                            .catch(error => this.$notify.alert('Tag could not be deleted.'))
                    }
                });
            },
            editRoleTag(roleTag) {
                this.editingRoleTag = roleTag;
                this.$bvModal.show('edit-role-tag');
            },
            createRoleTag() {
                this.editingRoleTag = null;
                this.$bvModal.show('edit-role-tag');
            },

            updatedRoleTag(roleTag) {
                this.roleTags.splice(this.roleTags.indexOf(this.editingRoleTag), 1, roleTag);
                this.$bvModal.hide('edit-role-tag');
                this.editingRoleTag = null;
            }
        }
    }
</script>

<style scoped>

</style>
