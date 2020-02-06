<template>
    <div>
        <b-container>
            <b-button size="md" variant="info" @click="createRoleTagCategory"><i class="fa fa-plus"/> New Category</b-button>
            <b-row>
                <b-col cols="12">
                    <b-table :fields="fields" :items="roleTagCategories">
                        <template v-slot:cell(actions)="data">
                            <b-button size="sm" variant="outline-info" @click="editRoleTagCategory(data.item)">Edit</b-button>
                            <a :href="'/tag-category/role/' + data.item.id"><b-button size="sm" variant="outline-secondary">View</b-button></a>
                            <b-button size="sm" variant="outline-danger" @click="deleteRoleTagCategory(data.item)">Delete</b-button>
                        </template>
                    </b-table>
                </b-col>
            </b-row>
        </b-container>

        <b-modal id="edit-role-tag-category">
            <edit :roleTagCategory="editingRoleTagCategory" @input="updatedRoleTagCategory"></edit>
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
                roleTagCategories: [],
                editingRoleTagCategory: null,
                fields: [
                    {key: 'id', label: 'Category ID'},
                    {key: 'name', label: 'Name'},
                    {key: 'reference', label: 'Reference'},
                    {key: 'actions', label: 'Actions'}
                ]
            }
        },

        created() {
            this.$control.roleTagCategory().all()
                .then(response => this.roleTagCategories = response.data)
                .catch(error => this.$notify.alert('Could not load role tag categories'));
        },

        methods: {
            deleteRoleTagCategory(roleTagCategory) {
                this.$bvModal.msgBoxConfirm('Are you sure you want to delete this role tag category?', {
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
                        this.$control.roleTagCategory().delete(roleTagCategory.id)
                            .then(response => {
                                this.$notify.success('Role tag category deleted!');
                                this.roleTagCategories.splice(this.roleTagCategories.indexOf(roleTagCategory), 1);
                            })
                            .catch(error => this.$notify.alert('Role tag category could not be deleted.'))
                    }
                });
            },
            editRoleTagCategory(roleTagCategory) {
                this.editingRoleTagCategory = roleTagCategory;
                this.$bvModal.show('edit-role-tag-category');
            },
            createRoleTagCategory() {
                this.editingRoleTagCategory = null;
                this.$bvModal.show('edit-role-tag-category');
            },

            updatedRoleTagCategory(roleTagCategory) {
                this.roleTagCategories.splice(this.roleTagCategories.indexOf(this.editingRoleTagCategory), 1, roleTagCategory);
                this.$bvModal.hide('edit-role-tag-category');
                this.editingRoleTagCategory = null;
            }
        }
    }
</script>

<style scoped>

</style>
